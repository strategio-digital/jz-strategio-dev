<?php
/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */
declare(strict_types=1);

namespace App\Http\Controller;

use App\Model\About;
use App\Model\Clients;
use App\Model\CodeExamples;
use App\Model\Contacts;
use App\Model\References;
use App\Model\Skills;
use App\Model\Tools;
use App\Model\WorkingTime;
use Saas\Helper\Path;
use Saas\Http\Controller\Base\Controller;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        return $this->render(Path::viewDir() . '/controller/home.latte', [
            'about' => new About(),
            'skills' => new Skills(),
            'codeExamples' => new CodeExamples(),
            'references' => new References(),
            'clients' => new Clients(),
            'tools' => new Tools(),
            'contact' => new Contacts(),
            'workingTime' => new WorkingTime(),
        ]);
    }
}