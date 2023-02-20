<?php
/**
 * Copyright (c) 2022 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.digital, jz@strategio.digital)
 */
declare(strict_types=1);

namespace App\Http\Controller;

use App\Model\AboutModel;
use App\Model\ContactModel;
use Saas\Helper\Path;
use Saas\Http\Controller\Controller;

class AboutController extends Controller
{
    public function index(): void
    {
        $this->getResponse()->render(Path::viewDir() . '/controller/about.latte', [
            'about' => new AboutModel(),
            'contact' => new ContactModel()
        ]);
    }
}