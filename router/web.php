<?php

use App\Http\Controller\HomeController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return static function (RoutingConfigurator $routes): void {
    $routes->add('home', '/')
        ->methods(['GET'])
        ->controller([HomeController::class, 'index'])
        ->options(['auth' => false]);
    
    $routes->add('about', '/about-me')
        ->methods(['GET'])
        ->controller([\App\Http\Controller\AboutController::class, 'index'])
        ->options(['auth' => false]);
    
    $routes->add('blog', '/blog/{page}')
        ->methods(['GET'])
        ->controller([\App\Http\Controller\BlogController::class, 'index'])
        ->requirements(['page' => '\d+'])
        ->defaults(['page' => 1])
        ->options(['auth' => false]);
    
    $routes->add('blog-detail', '/blog/{slug}')
        ->methods(['GET'])
        ->controller([\App\Http\Controller\BlogController::class, 'detail'])
        ->requirements(['slug' => '.+'])
        ->options(['auth' => false]);
    
    $routes->add('openai-translator', '/api/utils/open-ai/translator')
        ->methods(['POST'])
        ->controller(\App\Http\Request\OpenAi\TranslatorRequest::class)
        ->options(['auth' => false]);
    
    $routes->add('openai-chat-bot', '/api/utils/open-ai/chat-bot')
        ->methods(['POST'])
        ->controller(\App\Http\Request\OpenAi\ChatBotRequest::class)
        ->options(['auth' => false]);
};