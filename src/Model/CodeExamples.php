<?php
/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */
declare(strict_types=1);

namespace App\Model;

use Saas\Helper\Path;

class CodeExamples
{
    /**
     * @return array<int, array<string,mixed>>
     */
    public function getAll(): array
    {
        return [
            [
                'type' => 'ts',
                'title' => 'useDatagrid.ts',
                'shortcut' => 'Vue',
                'code' => file_get_contents(Path::srcDir() . '/../assets/code-example/vue.txt'),
                'active' => false,
                'link' => 'https://github.com/strategio-digital/saas/blob/master/vue/composables/datagrid/useDatagrid.ts'
            ],
            [
                'type' => 'ts',
                'title' => 'PersonalInfo.tsx',
                'shortcut' => 'React',
                'code' => file_get_contents(Path::srcDir() . '/../assets/code-example/react.txt'),
                'active' => false,
                'link' => 'https://github.com/jzaplet/saas-checkout/blob/feature-graph-ql/src/views/PersonalInfo.tsx'
            ],
            [
                'type' => 'php',
                'title' => 'User\\CreateRequest.php',
                'shortcut' => 'PHP',
                'code' => file_get_contents(Path::srcDir() . '/../assets/code-example/php.txt'),
                'active' => true,
                'link' => 'https://github.com/strategio-digital/saas/blob/master/src/Http/Request/User/CreateRequest.php'
            ],
            [
                'type' => 'ts',
                'title' => 'firebase/scraper.ts',
                'shortcut' => 'Node',
                'code' => file_get_contents(Path::srcDir() . '/../assets/code-example/node.txt'),
                'active' => false,
                'link' => 'https://github.com/strategio-digital/pricingo/blob/master/functions/src/index.ts'
            ],
            [
                'type' => 'docker',
                'title' => 'Dockerfile',
                'shortcut' => 'Docker',
                'code' => file_get_contents(Path::srcDir() . '/../assets/code-example/docker.txt'),
                'active' => false,
                'link' => 'https://github.com/strategio-digital/saas/blob/master/template/Dockerfile'
            ],
            [
                'type' => 'scss',
                'title' => 'side-modal.scss',
                'shortcut' => 'SCSS',
                'code' => file_get_contents(Path::srcDir() . '/../assets/code-example/scss.txt'),
                'active' => false,
                'link' => 'https://github.com/strategio-digital/saas/blob/master/vue/assets/scss/side-modal.scss'
            ]
        ];
    }
}