<?php
/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */
declare(strict_types=1);

namespace App\Model;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class OpenAi
{
    protected Client $client;
    
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.openai.com/v1/',
            'headers' => [
                'Authorization' => 'Bearer ' . $_ENV['OPENAI_API_KEY'],
                'OpenAI-Organization' => $_ENV['OPENAI_ORGANIZATION_ID'],
                'Content-Type' => 'application/json',
            ],
        ]);
    }
    
    /**
     * @param string $method
     * @param string $endpoint
     * @param array<string, mixed> $data
     * @return array<string, mixed>
     * @throws GuzzleException
     */
    public function call(string $method, string $endpoint, array $data = []): array
    {
        $response = $this->client->request($method, $endpoint, [
            'json' => $data,
        ]);
        
        return json_decode($response->getBody()->getContents(), true);
    }
}