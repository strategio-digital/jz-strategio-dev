<?php

use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return static function (RoutingConfigurator $routes): void {
    $routes->add('api.openai.translator', '/api/utils/open-ai/translator')
        ->methods(['POST'])
        ->controller(\App\Http\Request\OpenAi\TranslatorRequest::class)
        ->options(['auth' => false]);
    
    $routes->add('api.openai.chat-bot', '/api/utils/open-ai/chat-bot')
        ->methods(['POST'])
        ->controller(\App\Http\Request\OpenAi\ChatBotRequest::class)
        ->options(['auth' => false]);
};