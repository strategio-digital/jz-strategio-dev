<?php
/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.digital, jz@strategio.digital)
 */
declare(strict_types=1);

namespace App\Model;

class ClientsModel
{
    /**
     * @param int|null $limit
     * @return string[]
     */
    public function get(int $limit = null) : array
    {
        $data = [
            'GoPay',
            'JČU',
            'Shoptet',
            'Střechy Bohemia',
            'Roman Kučera',
            'Osam Trade',
            'Smart TOP',
            'Grow ITC',
            'PC Robot',
            'ABC Trepka',
            'G-Project',
            'Silluro',
            'Rešl & Muzika',
            'Orel ČB',
            'VS Montáže',
            'Adrenalinsport',
            'VetPel',
            'Václav Flíček',
            'Široko Daleko',
            'Fonditore',
            'KV Architekt',
            'Penzionek JH',
            'PK Sport',
            'A další...'
        ];
        
        if ($limit !== null) {
            return array_slice($data, 0, $limit);
        }
        
        return $data;
    }
    
    public function count() : int
    {
        return count($this->get());
    }
}