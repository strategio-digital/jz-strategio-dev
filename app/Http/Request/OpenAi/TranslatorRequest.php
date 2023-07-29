<?php
/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */
declare(strict_types=1);

namespace App\Http\Request\OpenAi;

use App\Model\OpenAi;
use GuzzleHttp\Exception\GuzzleException;
use Nette\Schema\Elements\Type;
use Nette\Schema\Expect;
use Saas\Http\Request\Request;
use Symfony\Component\HttpFoundation\Response;

class TranslatorRequest extends Request
{
    /**
     * @return array<string, Type>
     */
    public function schema(): array
    {
        return [
            'apiKey' => Expect::string()->required(),
            'debug' => Expect::bool(false),
            'message' => Expect::string()->required(),
            'languages' => Expect::arrayOf(Expect::string())->required()->min(1)->max(8),
        ];
    }
    
    /**
     * @param array{apiKey: string, debug: bool, message: string, languages: array<int,string>} $data
     * @throws GuzzleException
     */
    public function process(array $data): Response
    {
        if ($data['apiKey'] !== $_ENV['JZ_API_KEY']) {
            return $this->error(['Invalid apiKey for jz.strategio.dev'], 403);
        }
        
        $openAi = new OpenAi();
        
        $source = implode(',', $data['languages']);
        $prompt = "Translate this into {$source} and if there will be square brackets in the text, don't change the content between them:\n\n{$data['message']}?\n\n";
        
        $response = $openAi->call('POST', 'completions', [
            'model' => 'text-davinci-003',
            'prompt' => $prompt,
            'temperature' => 0.3,
            'max_tokens' => 1000,
            'top_p' => 1.0,
            'frequency_penalty' => 0.0,
            'presence_penalty' => 0.0
        ]);
        
        $text = trim($response['choices'][0]['text'], "\n");
        $filtered = array_filter(explode("\n", $text), fn($text) => $text !== '');
        $translations = array_values($filtered);
        
        $output = [];
        foreach ($data['languages'] as $key => $language) {
            if (array_key_exists($key, $translations)) {
                $output[] = [
                    'name' => mb_strtolower($language),
                    'message' => str_replace($language . ': ', '', $translations[$key]),
                ];
            }
        }
        
        return $this->json([
            'message' => $data['message'],
            'translations' => $output,
            'choices' => count($response['choices']),
            '@debug' => !$data['debug'] ? null : [
                'text_original' => $response['choices'][0]['text'],
                'text_trim' => $text,
                'text_filter' => $filtered,
                'translations' => $translations,
                'full_response' => $response,
            ]
        ]);
    }
}