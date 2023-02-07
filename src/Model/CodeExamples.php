<?php
/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.digital, jz@strategio.digital)
 */
declare(strict_types=1);

namespace App\Model;

class CodeExamples
{
    /**
     * @param int|null $limit
     * @return array<int, array{title:string, code:string}>
     */
    public function get(int $limit = null): array
    {
        $data = [
            ['title' => 'PHP / Rest API', 'shortcut' => 'PHP v1', 'code' => '// code with syntax highlighter here', 'active' => false],
            ['title' => 'PHP / Doctrine ORM', 'shortcut' => 'PHP v2', 'code' => '// code with syntax highlighter here', 'active' => true],
            ['title' => 'Vue JS / Datagrid', 'shortcut' => 'Vue', 'code' => '// code with syntax highlighter here', 'active' => false],
            ['title' => 'Node JS / Scraper', 'shortcut' => 'NodeJS', 'code' => '// code with syntax highlighter here', 'active' => false],
            ['title' => 'Dockerfile', 'shortcut' => 'Docker', 'code' => '// code with syntax highlighter here', 'active' => false],
            ['title' => 'CSS / SCSS', 'shortcut' => 'SCSS', 'code' => '// code with syntax highlighter here', 'active' => false]
        ];
        
        if ($limit !== null) {
            return array_slice($data, 0, $limit);
        }
        
        return $data;
    }
    
    public function count(): int
    {
        return count($this->get());
    }
}