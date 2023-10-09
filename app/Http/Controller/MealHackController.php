<?php
/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */
declare(strict_types=1);

namespace App\Http\Controller;

use App\Model\Contacts;
use App\Model\MealHack;
use Megio\Helper\Path;
use Megio\Http\Controller\Base\Controller;
use Symfony\Component\HttpFoundation\Response;

class MealHackController extends Controller
{
    public function index(): Response
    {
        return $this->render(Path::viewDir() . '/controller/meal-hack.latte', [
            'timeline' => new MealHack(),
            'contact' => new Contacts()
        ]);
    }
}