<?php
/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */
declare(strict_types=1);

namespace App\Model;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;

class ApiModel
{
    protected Client $client;
    
    public function __construct(protected \Saas\Http\Response\Response $response)
    {
        $this->client = new Client([
            'base_uri' => 'https://strategio.contentio.app/api/',
            'timeout' => 5.0,
        ]);
    }
    
    /**
     * @param string $method
     * @param string $uri
     * @param array<string, mixed> $params
     * @return array<string, mixed>
     * @throws GuzzleException
     */
    public function call(string $method, string $uri, array $params): array
    {
        $data = [];
        
        try {
            $response = $this->client->request($method, $uri, ['json' => $params]);
            $data = json_decode($response->getBody()->getContents(), true);
        } catch (ClientException $e) {
            if ($e->getResponse()->getStatusCode() === 404) {
                $this->response->sendError(['404 Data not found'], 404);
            }
        }
        
        return $data;
    }
}