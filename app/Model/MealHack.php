<?php
/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */
declare(strict_types=1);

namespace App\Model;

class MealHack
{
    /**
     * @return array<string, mixed>
     */
    public function get(): array
    {
        return [
            'paragraphs' => [
                [
                    'year' => '26. Září 2023',
                    'title' => 'Prázdná lednice jako impulz',
                    'text' => 'Už 14 dní nejsem schopen sepsat, co nakoupit a lednice zeje prázdnotou. Během týdne několikrát scrolluju Uber Eats, vybírám jidlo a doufám, že mi bude chutnat. Celkově to není vůbec levné. Kéž bych měl něco, co by vytvořilo nákupní seznam podle mých oblíbených jídel - co třeba nějaká aplikace.',
                    'images' => [],
                    'solved' => true,
                ],
                [
                    'year' => '27. Září 2023',
                    'title' => 'Hledám řešení a vymýšlím plán',
                    'text' => 'Hledám různé aplikace, testuji, ale nic můj problém neřeší opravdu jednoduše. Nakonec promýšlím vlastní aplikaci a připravuji se na výzkum. Potřebuji totiž zjistit, zda tento problém trápí i někoho dalšího a zda to dokážu vyřešit tak, že za to někdo rád zaplatí.',
                    'solved' => true,
                    'images' => [
                        ['path' => 'assets/img/mealhack/planning.jpg', 'title' => 'Příprava plánu', 'width' => 1440, 'height' => 1080]
                    ],
                ],
                [
                    'year' => 'od 28. Září až dodnes',
                    'title' => '1. krok - Uživatelský výzkum',
                    'text' => 'Jdu na kafe se známým, ptám se na problémy, testuji hypotézy, píšu poznámky a zaznamenávám výsledky. Dozvídám se, že by aplikaci klidně koupil. Následně vše ladím, vylepšuji a známému posílám číslo účtu, abych měl jistotu, že to myslel vážně. Následující den oslovuji další (náhodné) respondenty, opět ověřuji hypotézy, testuji, sepisuji, vylepšuji a získávám další předplatitele. Takto nyní musím postupovat stále dokola, dokud nevyzpovídám alespoň 100 lidí - abych měl důkazy, zda aplikaci opravdu vyvinout.',
                    'images' => [],
                    'solved' => false,
                ],
                [
                    'year' => 'Až vyzpovídám 100 respondentů',
                    'title' => '2. krok - Vytvoření beta verze',
                    'text' => '',
                    'images' => [],
                    'solved' => null,
                ],
                [
                    'year' => 'Až vytvořím beta verzi',
                    'title' => '3. krok - Testování aplikace',
                    'text' => '',
                    'images' => [],
                    'solved' => null,
                ],
                [
                    'year' => 'Až dokončím testování',
                    'title' => '4. krok - Sbírání zpětné vazby od uživatelů',
                    'text' => '',
                    'images' => [],
                    'solved' => null,
                ],
                [
                    'year' => 'Až od vás posbírám zpětnou vazbu',
                    'title' => '5. krok - Finální doladění',
                    'text' => '',
                    'images' => [],
                    'solved' => null,
                ],
                [
                    'year' => 'Až vše kompletně doladím',
                    'title' => '6. krok - Spuštění a vydání aplikace',
                    'text' => '',
                    'images' => [],
                    'solved' => null,
                ],
                [
                    'year' => 'Po vydání aplikace',
                    'title' => '7. krok - Rozšiřování o další funkce',
                    'text' => '',
                    'images' => [],
                    'solved' => null,
                ]
            ]
        ];
    }
}