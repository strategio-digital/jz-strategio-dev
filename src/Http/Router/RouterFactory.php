<?php
/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */
declare(strict_types=1);

namespace App\Http\Router;

use App\Http\Controller\AboutController;
use App\Http\Controller\BlogController;
use App\Http\Controller\HomeController;
use App\Http\Controller\OpenAIController;
use Symfony\Component\Routing\Matcher\UrlMatcher;

class RouterFactory extends \Saas\Http\Router\RouterFactory
{
    public function create(): UrlMatcher
    {
        // Homepage
        $this->add('GET', '/', [HomeController::class, 'index'], [], 'home');
        $this->add('GET', '/about-me', [AboutController::class, 'index'], [], 'about');
        $this->add('GET', '/blog/{page}', [BlogController::class, 'index'], ['page' => 1], 'blog', ['page' => '\d+']);
        $this->add('GET', '/blog/{slug}', [BlogController::class, 'detail'], [], 'blog-detail');
        
        $this->add('POST', '/api/utils/translate', [OpenAIController::class, 'translate'], [], 'openai-translate');
        
        return parent::create();
    }
}
