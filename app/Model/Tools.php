<?php
/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */
declare(strict_types=1);

namespace App\Model;

class Tools
{
    /**
     * @return array<int, array{title:string, description:string, link:string|null}>
     */
    public function get(): array
    {
        return [
            [
                'title' => 'Megio panel',
                'description' => 'Nástroj, díky kterému vám ušetřím více než 70 % za vývoj aplikace, REST API nebo webu na míru.',
                'link' => '/blog/megio'
            ],
            [
                'title' => 'Contentio web',
                'description' => 'Nástroj, ve kterém vám na jedno kliknutí založím celou administraci a REST API pro klasický web.',
                'link' => 'https://contentio.app'
            ],
            [
                'title' => 'Contactio mail',
                'description' => 'Nástroj pro automatické rozesílání transakčních a marketingových e-mailů (REST API se plánuje).',
                'link' => 'https://contactio.app'
            ],
            [
                'title' => 'Invoice GUN',
                'description' => 'Nástroj pro evidenci faktur s platebním QR kódem a možností ovládání přes REST API.',
                'link' => '/blog/nastroj-na-faktury-zdarma'
            ],
            [
                'title' => 'Cookie Log',
                'description' => 'Nástroj pro ukládání souhlasů s cookies, včetně změn, v souladu se zákonem o GDPR.',
                'link' => 'https://documenter.getpostman.com/view/14885541/2s935poNYQ'
            ],
            [
                'title' => 'Webis editor',
                'description' => 'Nástroj ve kterém si budete sami schopni vytvořit web bez znalosti programování.',
                'link' => null
            ],
        ];
    }
}