<?php
/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.digital, jz@strategio.digital)
 */
declare(strict_types=1);

namespace App\Model;

class AboutModel
{
    /**
     * @return array<string, mixed>
     */
    public function get(): array
    {
        return [
            'photos' => [
                ['src' => 'assets/img/about/jiri-zapletal-slide-1.jpg', 'alt' => 'Jiří Zapletal - PHP Developer'],
                ['src' => 'assets/img/about/jiri-zapletal-slide-2.jpg', 'alt' => 'Jiří Zapletal - PHP Developer'],
                ['src' => 'assets/img/about/jiri-zapletal-slide-3.jpg', 'alt' => 'Jiří Zapletal - PHP Developer'],
            ],
        ];
    }
}