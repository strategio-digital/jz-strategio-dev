<?php
/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */
declare(strict_types=1);

namespace App\Http\Controller;

use App\Model\AboutModel;
use App\Model\ClientsModel;
use App\Model\CodeExamples;
use App\Model\ContactModel;
use App\Model\ReferencesModel;
use App\Model\SkillsModel;
use App\Model\ToolsModel;
use App\Model\WorkingTimeModel;
use Saas\Helper\Path;
use Saas\Http\Controller\Base\Controller;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        return $this->render(Path::viewDir() . '/controller/home.latte', [
            'about' => new AboutModel(),
            'skills' => new SkillsModel(),
            'codeExamples' => new CodeExamples(),
            'references' => new ReferencesModel(),
            'clients' => new ClientsModel(),
            'tools' => new ToolsModel(),
            'contact' => new ContactModel(),
            'workingTime' => new WorkingTimeModel(),
        ]);
    }
}