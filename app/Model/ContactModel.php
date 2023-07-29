<?php
/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */
declare(strict_types=1);

namespace App\Model;

class ContactModel
{
    public function get(string $key): string
    {
        $data = [
            'phone' => '+420 606 091 125',
            'email' => 'jz@strategio.dev',
            'linkedIn' => 'https://linkedin.com/in/jz-dev',
            'github' => 'https://github.com/jzaplet'
        ];
        
        return $data[$key];
    }
}