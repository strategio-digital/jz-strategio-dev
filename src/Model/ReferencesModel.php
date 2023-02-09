<?php
/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.digital, jz@strategio.digital)
 */
declare(strict_types=1);

namespace App\Model;

class ReferencesModel
{
    /**
     * @param int|null $limit
     * @return array<int, array{name:string, job: string, logo:string, photoSm:string, photoLg:string, text:string}>
     */
    public function get(int $limit = null): array
    {
        $data = [
            [
                'name' => 'doc. PaeDr. Jiří Vaníček, Ph.D.',
                'job' => 'Vedoucí katedry Informatiky, PF, JČU',
                'logo' => 'assets/img/logo/jcu-colored.svg',
                'photoSm' => 'assets/img/references/jiri-vanicek.jpg',
                'photoLg' => 'assets/img/jiri-zapletal-php.jpg',
                'text'=> 'Jiří Zapletal je velmi kreativní a výkonný programátor, který dokáže tvořit kvalitní a funkční aplikace. Jeho práce je vždy včas a výsledky jsou vždy v souladu s očekáváním. Jiří je velmi přátelský a vždy ochoten pomoci. Doporučuji.'
            ]
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