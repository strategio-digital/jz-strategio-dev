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
                'type' => 'php',
                'title' => 'Gameplay\\RateAnswerFacade.php',
                'shortcut' => 'PHP',
                'code' => $this->load('php'),
                'active' => true,
            ],
            [
                'type' => 'go',
                'title' => 'profile/change_password.go',
                'shortcut' => 'Go',
                'code' => $this->load('go'),
                'active' => false,
            ],
            [
                'type' => 'ts',
                'title' => 'UserEditModal.vue',
                'shortcut' => 'Vue',
                'code' => $this->load('vue'),
                'active' => false,
            ],
            [
                'type' => 'ts',
                'title' => 'PersonalInfo.tsx',
                'shortcut' => 'React',
                'code' => $this->load('react'),
                'active' => false,
            ],
            [
                'type' => 'ts',
                'title' => 'firebase/scraper.ts',
                'shortcut' => 'Node',
                'code' => $this->load('node'),
                'active' => false,
            ],
            [
                'type' => 'docker',
                'title' => 'Dockerfile',
                'shortcut' => 'Docker',
                'code' => $this->load('docker'),
                'active' => false,
            ],
            [
                'type' => 'scss',
                'title' => 'side-modal.scss',
                'shortcut' => 'SCSS',
                'code' => $this->load('scss'),
                'active' => false,
            ],
        ];
    }
    
    private function load(string $name): string
    {
        $path = Path::appDir() . '/../assets/code-example/' . $name . '.txt';
        $code = file_get_contents($path);
        
        if ($code === false) {
            throw new \RuntimeException("Code example '{$name}' not found at {$path}");
        }
        
        return $code;
    }
}
