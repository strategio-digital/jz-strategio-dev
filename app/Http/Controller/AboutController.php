<?php
/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */
declare(strict_types=1);

namespace App\Http\Controller;

use App\Model\About;
use App\Model\Contacts;
use Megio\Helper\Path;
use Megio\Http\Controller\Base\Controller;
use Symfony\Component\HttpFoundation\Response;

class AboutController extends Controller
{
    public function index(): Response
    {
        return $this->render(Path::viewDir() . '/controller/about.latte', [
            'timeline' => new About(),
            'contact' => new Contacts()
        ]);
    }
}