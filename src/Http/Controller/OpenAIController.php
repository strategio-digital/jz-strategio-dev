<?php
/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */
declare(strict_types=1);

namespace App\Http\Controller;

use App\Http\Request\OpenAi\TranslateRequest;
use Saas\Http\Controller\Controller;

class OpenAIController extends Controller
{
    public function translate(TranslateRequest $request): void
    {
    }
}