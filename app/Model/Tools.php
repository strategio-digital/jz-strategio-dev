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
     * @return array<int, array{title:string, description:string, link:string|null, button:string}>
     */
    public function get(): array
    {
        return [
            [
                'title' => 'Megio panel',
                'description' => 'Nástroj, díky kterému ušetříte více než 70 % za vývoj aplikace, administrace, REST API či systému na míru.',
                'link' => '/blog/megio',
                'button' => 'Přečíst článek (proč a jak)'
            ],
            [
                'title' => 'Webis editor',
                'description' => 'Webový editor s umělou inteligencí, ve kterém si vytvoří web i běžní uživatelé - bez znalosti kódu a programování.',
                'link' => 'https://webis.app',
                'button' => 'Vytvořit web ZDARMA'
            ],
            [
                'title' => 'Contactio mail',
                'description' => 'Nástroj pro automatické rozesílání transakčních a marketingových e-mailů (REST API se plánuje).',
                'link' => 'https://contactio.app',
                'button' => 'Založit e-mailovou kampaň'
            ],
            [
                'title' => 'Contentio web',
                'description' => 'Nástroj, ve kterém vám na jedno kliknutí založím celou administraci a REST API pro klasický web.',
                'link' => 'https://contentio.app',
                'button' => 'Přejít na web projektu'
            ],
            [
                'title' => 'Invoice GUN',
                'description' => 'Nástroj pro evidenci faktur s platebním QR kódem a možností ovládání přes REST API.',
                'link' => '/blog/nastroj-na-faktury-zdarma',
                'button' => 'Přečíst článek (co to umí)'
            ],
            [
                'title' => 'Cookie Log',
                'description' => 'Nástroj pro ukládání souhlasů s cookies, včetně změn, v souladu se zákonem o GDPR.',
                'link' => 'https://documenter.getpostman.com/view/14885541/2s935poNYQ',
                'button' => 'REST API Dokumentace'
            ],
        ];
    }
}