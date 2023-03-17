<?php
/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */
declare(strict_types=1);

namespace App\Http\Controller;

use App\Http\Request\OpenAi\ChatBotRequest;
use App\Http\Request\OpenAi\TranslatorRequest;
use Saas\Http\Controller\Controller;

class OpenAIController extends Controller
{
    public function translator(TranslatorRequest $request): void
    {
    }
    
    public function chatBot(ChatBotRequest $request): void
    {
    }
}