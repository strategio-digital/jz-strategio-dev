<?php
/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */
declare(strict_types=1);

namespace App\Http\Controller;

use App\Model\AboutModel;
use App\Model\ContactModel;
use Saas\Helper\Path;
use Saas\Http\Controller\Base\Controller;
use Symfony\Component\HttpFoundation\Response;

class AboutController extends Controller
{
    public function index(): Response
    {
        return $this->render(Path::viewDir() . '/controller/about.latte', [
            'about' => new AboutModel(),
            'contact' => new ContactModel()
        ]);
    }
}