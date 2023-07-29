<?php
/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */
declare(strict_types=1);

namespace App\Model;

class ClientsModel
{
    /**
     * @param int|null $limit
     * @return array<string, string|null>
     */
    public function get(int $limit = null): array
    {
        $data = [
            'GoPay' => 'assets/img/logo/gopay.svg',
            'JČU' => 'assets/img/logo/jcu.svg',
            'Shoptet' => 'assets/img/logo/shoptet.svg',
            'Střechy Bohemia' => 'assets/img/logo/strechybohemia.svg',
            'Roman Kučera' => 'assets/img/logo/rokuc.svg',
            'Osam Trade' => 'assets/img/logo/osamtrade.svg',
            'Smart TOP' => 'assets/img/logo/smarttop.svg',
            'Grow ITC' => 'assets/img/logo/growitc.svg',
            'Čistící stroje' => 'assets/img/logo/cisticistroje.svg',
            'G-Project' => 'assets/img/logo/gproject.svg',
            'Orel ČB' => 'assets/img/logo/orelcb.svg',
            'Rešl & Muzika' => 'assets/img/logo/reslmuzika.svg',
            'ABC Trepka' => 'assets/img/logo/abctrepka.svg',
            'VS Montáže' => 'assets/img/logo/vsmontaze.svg',
            'Václav Flíček' => 'assets/img/logo/vaclavflicek.svg',
            'Široko Daleko' => 'assets/img/logo/sirokodaleko.svg',
            'Silluro s.r.o.' => 'assets/img/logo/silluro.svg',
            'PC Robot' => 'assets/img/logo/pcrobot.svg',
            'VetPel' => 'assets/img/logo/vetpel.svg',
            'Adrenalinsport' => 'assets/img/logo/adrenalinsport.png',
            'Fonditore' => 'assets/img/logo/fonditore.png',
            'Penzionek JH' => 'assets/img/logo/penzionekjh.svg',
            'PK Sport' => 'assets/img/logo/pksport.svg',
            'A další...' => null,
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