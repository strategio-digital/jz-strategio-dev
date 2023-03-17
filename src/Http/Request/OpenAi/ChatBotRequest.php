<?php
/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */
declare(strict_types=1);

namespace App\Http\Request\OpenAi;

use App\Model\OpenAi;
use GuzzleHttp\Exception\GuzzleException;
use Nette\Schema\Expect;
use Saas\Http\Request\IRequest;
use Saas\Http\Response\Response;

class ChatBotRequest implements IRequest
{
    
    public function __construct(protected Response $response)
    {
    }
    
    /**
     * @return array<string, mixed>
     */
    public function schema(): array
    {
        return [
            'apiKey' => Expect::string()->required(),
            'debug' => Expect::bool(false),
            'messages' => Expect::arrayOf(Expect::structure([
                'role' => Expect::string()->required(),
                'content' => Expect::string()->required(),
            ]))->required()->min(1),
        ];
    }
    
    /**
     * @param array{apiKey: string, debug: bool, messages: array{role: string, content: string}} $data
     * @throws GuzzleException
     */
    public function process(array $data): void
    {
        \Tracy\Debugger::log($data);
        
        if ($data['apiKey'] !== $_ENV['JZ_API_KEY']) {
            $this->response->sendError(['message' => 'Invalid apiKey for jz.strategio.dev'], 403);
        }
        
        $openAi = new OpenAi();
        
        $response = $openAi->call('POST', 'chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => $data['messages'],
        ]);
        
        $message = $response['choices'][0]['message'];
        
        $this->response->send([
            'role' => $message['role'],
            'content' => $message['content'],
            'choices' => count($response['choices']),
            '@debug' => !$data['debug'] ? null : [
                'full_response' => $response
            ]
        ]);
    }
}