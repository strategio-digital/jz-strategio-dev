<?php
/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */
declare(strict_types=1);

namespace App\Model;

use Megio\Helper\Path;

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
                'title' => 'SelectBox.svelte',
                'shortcut' => 'Svelte',
                'code' => file_get_contents(Path::appDir() . '/../assets/code-example/svelte.txt'),
                'active' => false,
                'link' => null
            ],
            [
                'type' => 'ts',
                'title' => 'CollectionDatagrid.vue',
                'shortcut' => 'Vue',
                'code' => file_get_contents(Path::appDir() . '/../assets/code-example/vue.txt'),
                'active' => false,
                'link' => 'https://github.com/strategio-digital/megio-panel/blob/master/src/components/collection/CollectionDatagrid.vue'
            ],
            [
                'type' => 'ts',
                'title' => 'PersonalInfo.tsx',
                'shortcut' => 'React',
                'code' => file_get_contents(Path::appDir() . '/../assets/code-example/react.txt'),
                'active' => false,
                'link' => 'https://github.com/jzaplet/saas-checkout/blob/feature-graph-ql/src/views/PersonalInfo.tsx'
            ],
            [
                'type' => 'php',
                'title' => 'Resource\\UpdateRoleRequest.php',
                'shortcut' => 'PHP',
                'code' => file_get_contents(Path::appDir() . '/../assets/code-example/php.txt'),
                'active' => true,
                'link' => 'https://github.com/strategio-digital/megio-core/blob/master/src/Http/Request/Resource/UpdateRoleRequest.php'
            ],
            [
                'type' => 'ts',
                'title' => 'firebase/scraper.ts',
                'shortcut' => 'Node',
                'code' => file_get_contents(Path::appDir() . '/../assets/code-example/node.txt'),
                'active' => false,
                'link' => 'https://github.com/strategio-digital/pricingo/blob/master/functions/src/index.ts'
            ],
            [
                'type' => 'docker',
                'title' => 'Dockerfile',
                'shortcut' => 'Docker',
                'code' => file_get_contents(Path::appDir() . '/../assets/code-example/docker.txt'),
                'active' => false,
                'link' => 'https://github.com/strategio-digital/megio-starter/blob/master/Dockerfile'
            ],
            [
                'type' => 'scss',
                'title' => 'side-modal.scss',
                'shortcut' => 'SCSS',
                'code' => file_get_contents(Path::appDir() . '/../assets/code-example/scss.txt'),
                'active' => false,
                'link' => 'https://github.com/strategio-digital/megio-panel/blob/master/src/assets/scss/side-modal.scss'
            ]
        ];
    }
}