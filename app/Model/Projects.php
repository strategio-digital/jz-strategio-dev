<?php
/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */
declare(strict_types=1);

namespace App\Model;

class Projects
{
    /**
     * @return array<int, array{title:string, claim:string, challenge:array<int,string>, tech:array<int,string>, image:string, logos:array<int,array{src:string, scale:float|int}>, link:string|null, pdf:string|null, status:string|null}>
     */
    public function get(): array
    {
        return [
            [
                'title' => 'GoPay+ integrace',
                'claim' => 'Platební integrace, kterou používá přes 4 000 e-shopů.',
                'challenge' => [
                    'Doplněk GoPay+ integruje platební bránu GoPay přímo do administrace Shoptetu. Obchodník si doplněk nainstaluje několika kliknutími a od té chvíle obsluhuje platby z prostředí, které zná: přijímá je, sleduje jejich stav a vrací peníze zákazníkům. V nastavení doplňku si obchodník zvolí platební metody, jazyk brány a stav, do kterého má objednávka přejít po úspěšné i neúspěšné platbě.',
                    'Klíčovým požadavkem integrace je bezpečnost. Přístupové údaje k bráně ukládá doplněk v databázi zašifrované a každou příchozí notifikaci ověřuje proti jejímu zdroji. Celá integrace je postavená podle přísných bezpečnostních pravidel. Časově náročné operace zpracovává doplněk asynchronně na pozadí, takže administrace obchodníka nikdy nečeká na odpověď brány.',
                    'Doplněk je lokalizovaný do sedmi jazyků. Každou změnu kódu prověří před nasazením automatické testy a statická analýza v CI pipeline v Jenkinsu.',
                ],
                'tech' => ['PHP', 'Nette', 'Doctrine ORM', 'Postgres', 'TypeScript', 'Jenkins'],
                'image' => 'assets/img/projects/gopay.webp',
                'logos' => [['src' => 'assets/img/projects/logo-gopay.svg', 'scale' => 1], ['src' => 'assets/img/projects/logo-shoptet.svg', 'scale' => 1]],
                'link' => 'https://doplnky.shoptet.cz/gopay-plus',
                'pdf' => null,
                'status' => null,
            ],
            [
                'title' => 'Platforma aibobr.cz',
                'claim' => 'Adaptivní výuka informatiky pro základní a střední školy.',
                'challenge' => [
                    'Soutěží Bobřík informatiky projde každý rok přes 400 000 žáků. Soutěž běží na platformě vyvinuté pro Pedagogickou fakultu Jihočeské univerzity včetně interaktivních úloh. Adaptivní Bobřík na ni navazuje jako zbrusu nová platforma pro výuku.',
                    'Platforma dostala novou administraci úloh a uživatelů a AI Debugger pro testování microservice, která žákům doporučuje úlohy. Učitel v ní spravuje třídy a sleduje progress žáků, žák má dashboard s vlastním výkonem, odznaky i týmové soutěžení.',
                    'O obtížnosti zadání rozhoduje pro každého žáka zvlášť samostatná služba, jež vznikla ve spolupráci s výzkumníkem v oboru AI. Platforma se tak přizpůsobí tempu konkrétního dítěte místo toho, aby všem předkládala totéž.',
                ],
                'tech' => ['PHP', 'Doctrine ORM', 'Postgres', 'Vue 3', 'Blockly', 'Python', 'GitLab CI'],
                'image' => 'assets/img/projects/aibobr.webp',
                'logos' => [['src' => 'assets/img/projects/logo-aibobr.png', 'scale' => 1], ['src' => 'assets/img/logo/jcu-colored.svg', 'scale' => 1.33]],
                'link' => 'https://staging.aibobr.cz',
                'pdf' => null,
                'status' => 'Před spuštěním',
            ],
            [
                'title' => 'Hra Quackpocalypse',
                'claim' => 'Kooperativní 3D střílečka pro více hráčů, v prohlížeči a bez herního enginu.',
                'challenge' => [
                    'Hry pro více hráčů se běžně staví v Unity nebo Unreal Engine. Quackpocalypse nestojí na žádném z nich: celé herní jádro je vlastní, postavené na architektuře ECS. Server běží v Go, klient v TypeScriptu nad Three.js a hra se spouští přímo v prohlížeči bez instalace.',
                    'Jednu mapu brání proti vlnám zombie až 32 hráčů. Autoritou je server, klient si vlastní pohyb predikuje a po snapshotu ho sladí, ostatní hráče interpoluje. Zásahy server vyhodnocuje s kompenzací latence: přetočí svět do okamžiku, který střelec podle svého pingu skutečně viděl.',
                    'Server simuluje svět dvacetkrát za sekundu, dvě stě protivníků zvládne za 1,75 ms z padesátimilisekundového ticku. Hráč přitom ve čtyřčlenném zápase stáhne 2,3 kB za sekundu. Automatizovaný test hlídá, že hra vydrží latenci 100 ms a 5% ztrátu paketů. Celý projekt je sólová práce.',
                ],
                'tech' => ['Go', 'TypeScript', 'Three.js', 'WebSockets', 'ECS'],
                'image' => 'assets/img/projects/quackpocalypse.webp',
                'logos' => [['src' => 'assets/img/projects/logo-quackpocalypse.png', 'scale' => 1]],
                'link' => 'https://quackpocalypse.gg',
                'pdf' => null,
                'status' => null,
            ],
            [
                'title' => 'Aplikace a web rokuc.cz',
                'claim' => 'Prodej školení od objednávky po fakturu, bez zásahu člověka.',
                'challenge' => [
                    'Roman Kučera je soudní znalec v oboru střech a školí řemeslníky. Každý termín dřív znamenal ruční práci: objednávka, platba, faktura, připomínky účastníkům.',
                    'Aplikace dnes celý proces obslouží bez zásahu člověka. Zákazník si školení objedná a zaplatí online, GoPay potvrdí platbu a systém k ní vystaví fakturu ve Fakturoidu. Účastníkům pak sám rozešle pět připomínek, od dvou dnů před termínem po okamžik zahájení.',
                    'Správce vidí v administraci u každého termínu seznam přihlášených i stav jejich plateb a spravuje odtud termíny, ceny i texty školení.',
                    'Aplikace je součástí webu, jehož obsah si správce upravuje sám. Poptávky chodí přes dynamický krokový formulář, který další otázky odvíjí od předchozích odpovědí a přílohy ukládá do cloudového úložiště AWS S3.',
                ],
                'tech' => ['PHP', 'Doctrine ORM', 'Vue 3', 'TypeScript', 'GoPay', 'Fakturoid', 'AWS S3'],
                'image' => 'assets/img/projects/rokuc.webp',
                'logos' => [['src' => 'assets/img/logo/rokuc-colored.svg', 'scale' => 1.33]],
                'link' => 'https://rokuc.cz',
                'pdf' => null,
                'status' => null,
            ],
            [
                'title' => 'Objednávkový systém',
                'claim' => 'Havarijní výjezd na střechu, který si zákazník objedná a zaplatí online.',
                'challenge' => [
                    'Firma Střechy Bohemia zajišťuje havarijní opravy střech v nepřetržitém provozu. Cena výjezdu závisí na vzdálenosti, kterou technik k zákazníkovi ujede. Dříve ji firma počítala ručně a domlouvala se zákazníkem po telefonu.',
                    'Zákazník dnes zadá adresu, kterou mu našeptává Google Maps API, a systém sám spočítá vzdálenost. Podle ní zařadí objednávku do cenové zóny a rovnou zobrazí konečnou částku včetně dopravy.',
                    'Objednávku zákazník zaplatí online přes platební bránu GoPay. Systém pak eviduje stav objednávky, stav platby i podklady k fakturaci.',
                    'Cenové zóny, ceníky, objednávky i fakturaci spravuje firma sama v administraci. Dříve zahrnovala spolupráce i firemní web s vlastním redakčním systémem.',
                ],
                'tech' => ['PHP', 'Doctrine ORM', 'Vue 3', 'Google Maps API', 'GoPay'],
                'image' => 'assets/img/projects/strechybohemia.webp',
                'logos' => [['src' => 'assets/img/logo/strechybohemia-colored.svg', 'scale' => 1]],
                'link' => 'https://strechybohemia.cz',
                'pdf' => null,
                'status' => null,
            ],
            [
                'title' => 'Nástroj documan.ai',
                'claim' => 'Firemní dokumentace, která odpovídá na otázky a ukáže, odkud odpověď vzala.',
                'challenge' => [
                    'Vedle kódu v repozitáři leží Markdown: architektonická rozhodnutí (ADR) i s důvody, business pravidla a konvence týmu. Documan z těch souborů udělá dokumentační web, aniž by se obsah kamkoli přepisoval.',
                    'K webu patří agentní chat, který si nevymýšlí. Odpovídá výhradně z vašich vlastních materiálů a u každé odpovědi ukáže konkrétní zdrojový dokument, takže si tvrzení ověříte. Relevantní pasáže hledá vektorovým vyhledáváním nad SQLite (sqlite-vec) přímo v procesu, takže není co dalšího provozovat.',
                    'Ke stejným datům se přes MCP (Model Context Protocol) připojí i AI nástroje jako Claude. Vývojář, produktový manažer i podpora se tak ptají jednoho zdroje a dostávají stejnou odpověď.',
                    'Publikace je automatizovaná. Každá úprava textu se nasadí sama a cestou projde kontrolou, která hlídá rozbité odkazy a chybějící stránky.',
                ],
                'tech' => ['Go', 'Markdown', 'SQLite', 'sqlite-vec', 'MCP', 'Vue 3'],
                'image' => 'assets/img/projects/documan.webp',
                'logos' => [['src' => 'assets/img/projects/logo-documan.png', 'scale' => 0.67]],
                'link' => 'https://documan.ai',
                'pdf' => null,
                'status' => null,
            ],
            [
                'title' => 'Platforma webis.ai',
                'claim' => 'Web z popisu, který napíšete vlastními slovy.',
                'challenge' => [
                    'Vlastní web je pro řadu firem i jednotlivců stále překážka. Kdo si nechce najmout agenturu, skončí u stavebnice, která ho sváže do šablony.',
                    'Webis postupuje obráceně. Uživatel popíše vlastními slovy, co od webu čeká, a umělá inteligence web vygeneruje. Výsledek si uživatel v editoru doladí a jedním kliknutím vydá na vlastní doméně.',
                    'Generování trvá minuty a běží na pozadí jako perzistentní job. Přežije restart serveru i nasazení nové verze a pokračuje tam, kde skončilo, místo aby začínalo od nuly. Za rozpracovanou práci tak uživatel nikdy neplatí dvakrát.',
                    'Uživatel platí kredity a každý požadavek na model se účtuje podle skutečných nákladů. Ceny v korunách se odvozují od kurzu České národní banky, takže nezastarají den poté, co se pohne dolar.',
                ],
                'tech' => ['Go', 'Vue 3', 'TypeScript', 'Tailwind CSS', 'SQLite', 'Anthropic API'],
                'image' => 'assets/img/projects/webis.webp',
                'logos' => [['src' => 'assets/img/projects/logo-webis.png', 'scale' => 0.67]],
                'link' => 'https://webis.ai',
                'pdf' => null,
                'status' => 'Ve vývoji',
            ],
            [
                'title' => 'GoKick framework',
                'claim' => 'Startovací základ pro nové aplikace: hotová bezpečnost, uživatelé i nasazování do produkce.',
                'challenge' => [
                    'V Go neexistuje nic jako Rails nebo Laravel, takže každý nový projekt začínal stejnou prací: přihlašování, oprávnění, správa uživatelů, nasazení.',
                    'GoKick je ta chybějící kostra. Nová aplikace na něm startuje s vyřešeným přihlašováním, rolemi a administrací. Hotové jsou i překlady, strukturované logování, hlášení chyb, plánovač úloh a fronta workerů pro práci na pozadí. Základem je Go: výkonné, snadno testovatelné a dost striktní na to, aby v něm obstál i kód psaný s pomocí AI.',
                    'Jedním přepínačem se aplikace přepne do multi-tenant režimu, takže na ní jde stavět i řešení pro více firem. Hranice mezi vrstvami nehlídá člověk při code review, ale go-arch-lint v CI, architektura stojí na DDD a CQRS.',
                    'Bezpečnost jde nad výchozí nastavení velkých frameworků: zamykání účtu po neúspěšných pokusech, odhalení neoprávněně použitého přihlašovacího tokenu a nesmazatelný audit log. Aplikace se nasazuje jako jediná binárka a díky SQLite nepotřebuje databázový server. Stojí na něm Webis i Quackpocalypse.',
                ],
                'tech' => ['Go', 'Vue 3', 'SQLite', 'DDD', 'CQRS', 'JWT', 'Wire (DI)', 'go-arch-lint'],
                'image' => 'assets/img/projects/gokick.webp',
                'logos' => [],
                'link' => 'https://gokick.strategio.dev',
                'pdf' => null,
                'status' => null,
            ],
        ];
    }
    
    public function count(): int
    {
        return count($this->get());
    }
}
