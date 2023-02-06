<?php
/**
 * Copyright (c) 2022 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.digital, jz@strategio.digital)
 */
declare(strict_types=1);

namespace App\Http\Controller;

use App\Model\ClientsModel;
use App\Model\SkillsModel;
use Saas\Helper\Path;
use Saas\Http\Controller\Controller;

class HomeController extends Controller
{
    public function index(): void
    {
        $this->getResponse()->render(Path::viewDir() . '/controller/home.latte', [
            'skills' => new SkillsModel(),
            'clients' => new ClientsModel()
        ]);
    }
}