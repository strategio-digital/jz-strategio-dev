<?php
/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */
declare(strict_types=1);

namespace App\Model;

class ToolsModel
{
    /**
     * @return array<int, array{title:string, description:string, link:string|null}>
     */
    public function get(): array
    {
        return [
            [
                'title' => 'Strategio SaaS',
                'description' => 'Nástroj, ve kterém Vám doslova naklikám profesionální administraci webu či aplikace.',
                'link' => 'https://github.com/strategio-digital/saas'
            ],
            [
                'title' => 'Contentio web',
                'description' => 'Nástroj, díky kterému Vám vytvořím kompletní webové stránky v řádu hodin.',
                'link' => 'https://contentio.app'
            ],
            [
                'title' => 'Contactio mail',
                'description' => 'Nástroj pro hromadné posílání e-mailů, pomocí kterého o Vás dám světu vědět.',
                'link' => 'https://contactio.app'
            ],
            [
                'title' => 'Invoice GUN',
                'description' => 'Nástroj pro Vaší kompletní fakturaci - hezké faktury s QR kódem a napojením na banku.',
                'link' => null
            ],
            [
                'title' => 'Webis editor',
                'description' => 'Nástroj pro rychlou tvorbu Vašeho webu napojeného na administraci Strategio SaaS.',
                'link' => null
            ],
            [
                'title' => 'Cookie Log',
                'description' => 'Nástroj pro ukládání souhlasů s cookies (vč. změn) v souladu se zákonem o GDPR.',
                'link' => 'https://documenter.getpostman.com/view/14885541/2s935poNYQ'
            ],
        ];
    }
}