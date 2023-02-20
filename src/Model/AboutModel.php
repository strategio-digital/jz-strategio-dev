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
            'paragraphs' => [
                [
                    'year' => '1993 - 1996',
                    'title' => 'Fresh start & basics',
                    'text' => 'První 2 až 3 roky od narození nebylo programování aplikací mou silnou stránkou. Ovšem AI a tvorba vlastních neuronových sítí byla denním chlebem. Myslím, že to do budoucna ovlivnilo celkový směr mého vývoje.',
                    'images' => []
                ],
                [
                    'year' => '1998',
                    'title' => 'První algoritmus',
                    'text' => 'Po pár letech došlo ke změně lokace z Moravy do Jižních čech a v backlogu přibyl nový task - školka. Zjištění, že ty nejlepší hračky nejsou určeny jen pro mě, opět ovlivnilo mé chování a došlo k přesunu do dětské kuchyňky. Tam byl vytvořen můj úplně první algoritmus - recept na kořeněné koření do mističky.',
                    'images' => []
                ],
                [
                    'year' => '1999',
                    'title' => 'Kazetové videohry',
                    'text' => 'O rok později začaly letět kazetové videohry. U nás doma to byly tanky, Super Mario, Duck Hunt a pistole s infračerveným senzorem. Zde jsem se nejspíše stal normálním člověkem. Lze to poznat z toho, že hraní na konzoli byla velká zábava, ale více mě lákalo být venku s kamarády.',
                    'images' => []
                ],
                [
                    'year' => '2000',
                    'title' => 'První stolní počítač',
                    'text' => 'Naši pořídili první stolní počítač - Pentium 2, 32 MB RAM, Windows 98, GPU NVidia GeForce 256 s prvním 3D renderingem. Komp za 40 táců, hry AoE, GTA, Worms, Soldier of Fortune byly velkým lákadlem a proto hned přišly restrikce. PC pouze 1h denně - zajímavý nástroj pro korigování závislosti.',
                    'images' => []
                ],
                [
                    'year' => '2003',
                    'title' => 'Základní škola, Windows XP a internet',
                    'text' => 'První školácké roky za mnou. Už se dalo číst, psát a počítat. Škola fungovala i bez nutnosti domácího učení a díky tomu zbýval čas na počítač. Závislost rostla i přes to, že náš PC již zastarával - hry jako GTA 3 a CS 1.6 se sekaly jak foto-promítačka. To mě ale neodradilo a převážilo nutkání pochopit toto zařízení. Jakmile přišlo vyúčtování za internet (za pevnou linku), ochotně mě naši přihlásili na kroužek počítačů v Domě dětí a mládeže.',
                    'images' => []
                ],
                [
                    'year' => '2004',
                    'title' => 'Kroužek - Počítače pro pokročilé',
                    'text' => 'Pátá třída, já jako starý mazák, který uměl zapnout XP-čka - proč nejít rovnou mezi pokročilé, když tady mají ještě Windows 95? Naštěstí, jediná překážka bylo pomalé psaní na klávesnici, které šlo natrénovat. Vytvořit hierarchii složek, upravit textový soubor, použít e-mail a něco vyhledat na internetu pak nebyl takový problém. Dokonce i Word a Excel šlo ovládnout bez větších obtíží.',
                    'images' => []
                ],
                [
                    'year' => '2005',
                    'title' => 'Kroužek - Počítače pro experty a tvorba webu v HTML',
                    'text' => 'Úspěšné absolvování předchozího kroužku mi otevřelo dveře do světa webařiny. Ve 12 letech bylo možné ovládnout HTML a CSS a stát se tak uznávaným webmasterem. Né že bych tam úplně vyčníval, ale druhý nejmladší účastník byl o 3 roky starší. Co si budem, lektor má mé obrovské uznání. Díky své nekonečné trpělivosti a spoustě dalších zázraků mě to nějak naučil.',
                    'images' => []
                ],
                [
                    'year' => '2006',
                    'title' => 'Odbočka - tvorba videí',
                    'text' => 'V sedmé třídě šla má webová kariéra do ústraní a internet ovládly herní videa na Youtube. Závislost na hře Counter-Strike 1.6 nebyla až tak silná a proto začala nová éra. Stříhání vlastních herních videí ve skvělém Sony Vegas 7.0. Tato éra ovšem velmi rychle skončila. Převálcovala ji závislost na hrách, které se daly stahovat přes BitTorrent.',
                    'images' => []
                ],
                [
                    'year' => '2007',
                    'title' => 'První programování v jazyce Pawno',
                    'text' => 'Pawn! Nejlepší programovací jazyk na světě mě vytáhl z hluboké závislosti na hrách. Sice né tak úplně, jelikož se v něm programovaly módy do multiplayeru pro GTA San Andreas, ale zase mě postavil na kolej vývojáře. První pohled na zdrojový kód připomínal rozsypaný čaj. Naštěstí existovalo fórum Pawno.cz a zkušenější jedinci s notnou dávkou trpělivosti. Spuštění prvního serveru na pipni.cz a vývoj herního módu, kde se stanu adminem, započal.',
                    'images' => []
                ],
                [
                    'year' => '2008',
                    'title' => 'První programování v jazyce PHP a PHP-Fusion',
                    'text' => 'Pawno.cz mi ukázalo, jak důležitá a nápomocná je komunita, když něco vyvíjíte. Na můj herní server chodily již desítky hráčů a já chtěl znát jejich názory. Byl potřeba vlastní web a fórum. Netuším jak, ale objevil se u mě redakční systém PHP-Fusion, jenž byl pro můj případ naprosto ideální. Také existovalo velmi aktivní fórum phpfusion.sk, ze kterého bylo možné těžit. PHP se mi celkově velmi zalíbilo a můj web e-power.ic.cz zkvétal.',
                    'images' => []
                ],
                [
                    'year' => '2009 - 2012',
                    'title' => 'Prohloubení znalostí na SŠ a založení Wakers.cz',
                    'text' => 'Přišla střední škola a obor se zaměřením na programování - naprosto skvělé. O hodinách bylo možné používat i notebooky. Nic mi nebránilo programovat - o češtině, o matice, literatuře, angličtině, ekonomice a vlastně o všech předmětech mimo tělocvik. V podstatě se ze mě stal full-time vývojář. Když skončila výuka, programování pokračovalo na internátu až do večerky. Studium šlo samo od sebe a v odborných předmětech mě považovali za odborníka. Čtyři roky zábavy a ovládal jsem: C, C++, C#, Javu, PHP, SQL, SDL, XNA, Direct3D, JS, Nette a určitě i další jazyky. Během studia vznikla i má “firma” Wakers.cz (Meet Your Web-Makers).',
                    'images' => []
                ],
                [
                    'year' => '2013',
                    'title' => 'Maturita, založení OSVČ a nástup na vysokou školu',
                    'text' => 'Během studia vznikly desítky projektů - hry, programy, webové portály, ligové systémy, drobné weby a aplikace. Maturitní práce musela být dostatečně složitá, aby překonala práci Grow Bomber od spolubydlícího Honzy. Začal tedy vývoj 2D multiplayerové hry War of Tanks s vlastním editorem map v C#, XNA a PHP. Úkol splněn, odmaturováno, ještě založit živnost ať si můžu přivydělávat a hurá na vysokou.',
                    'images' => []
                ],
                [
                    'year' => '2014',
                    'title' => 'Paralýza a rozhodování o další budoucnosti',
                    'text' => 'Vývoj her byla zábava a tak přišlo na řadu založení českého fóra ohledně vývoje her v Unity s vidinou natáčení tutoriálů pro začátečníky. To ovšem nevydrželo moc dlouho, jelikož po prázdninách a nastoupení na vysokou školu přišel obrovský šok - respektive návrat do roku 2007 a v některých případech i do roku 2005. Začali nás učit základy algoritmů, základy programování, základy databází, základy www, prostě samé základy. Představa, že další roky budou opáčkem střední školy, se mi moc nezamlouvala - co tedy budu dělat?',
                    'images' => []
                ],
                [
                    'year' => '2015',
                    'title' => 'Makačka 18h denně včetně víkendů',
                    'text' => 'Dokud nebylo studium ukončeno, naši platili ubytování a stravu. Toho jsem trošku zneužil a do školy chodil jen na to nejnutnější - aby byly kredity a nikdo mě nevyhodil. Vydrželo to až do 4. semestru, než mě uvařili na angličtině. Mezi tím už ale vznikala základna webových klientů a mě pálily otázky - jak získat a odbavit co nejvíce zakázek, jak inovovat vlastní redakční systém Wakers CMS a jak docílit dlouhodobé spokojenosti klientů - bylo na čem pracovat. Jakmile se šlo trošku postavit na vlastní nohy, zrušení příspěvků od rodičů také přišlo na řadu.',
                    'images' => []
                ],
                [
                    'year' => '2016 - 2017',
                    'title' => 'Ponoření do marketingu, prodejní psychologie, UX a výzkumů',
                    'text' => 'Velmi dlouho mě trápilo, že nedokážu efektivně shánět vlastní zakázky. Jak tedy mohu nabízet weby, jež mají prodávat byznys klientů, když to neumím? A tak začalo hluboké studium knih o psychologii, manipulaci a lidském chování. Mezi mé aktivity patřily i online kurzy marketingu a navštěvování marketingových akcí. Vlastní výzkum, mapování trhu, analýzy konkurence, praktiky sociálního inženýrství, investice do reklamních (PPC) systémů a vytváření vlastních strategií přinesly své ovoce v podobě nových zákazníků. Dnes jsem díky tomuto know-how schopen přinést nejrůznější strategické vhledy do každého projektu.',
                    'images' => []
                ],
                [
                    'year' => '2018',
                    'title' => 'Vývoj Bobříka informatiky pro Jihočeskou univerzitu',
                    'text' => 'Dělat weby bylo super, ale lidi za ně nechtěli moc platit <em>“Však jen koupíš šablonu do Wordpressu a je to”</em> - <strong>ne, takto to opravdu nefunguje!</strong> A tak přišla potřeba spolupráce s fundovanější klientelou.<br><br>Nicméně, jak mě z vysoké vyhodili dveřmi, tak mě oknem zase vzali zpět. Tentokrát ale v roli programátora, který si mohl diktovat podmínky vývoje a technologie volit podle gusta. Naprogramoval jsem tedy kompletní administrační systém pro Bobříka informatiky. Spolupráce byla skvělá, tak hned přišla další zakázka na vytvoření webu ibobr.cz. Až na ten Joomla požadavek, to také proběhlo skvěle.<br><br><em><strong>Poznámka:</strong> Pro všechny příznivce Wordpressů, Joomel, Drupalů a podobných nesmyslů. Uvědomte si, že s každou úpravou přeplácíte juniora programátora - protože senior, který zvládá práci 10x rychleji se v tom praso-kódu prostě vrtat nebude. Navíc, existují 1000x lepší systémy, jako je Strapi CMS, Pocketbase, Laravel Nova nebo třeba Contentio web a Strategio SaaS.</em>',
                    'images' => []
                ],
                [
                    'year' => '2019',
                    'title' => 'Fuckup při vývoji Pricinga. Contactio a Wakers CMS 5',
                    'text' => 'Prototyp systému, který uměl číst ceny konkurenčních e-shopů a automaticky řídil cenotvorbu v tom vlastním, vznikl o 3 roky dříve. Ideálního zájemce se mi bohužel podařilo sehnat až v tomto roce. Obrat k 1 miliardě, tisíce denních konverzí, pricingový tým nakloněný spolupráci - další skvělý kšeft. Až na to, že po 6 měsících programování, analyzování, testování, schůzkování a euforii z vlastního startupu si mě klient hodil do ignoru a byl konec.<br><br><em><strong>Poznámka:</strong> Pokud Vám přijde divné, že zdarma nabízím jen úvodní schůzku, tak tohle je ten hlavní důvod.</em><br><br>Svět se ale nezhroutil a jelo se dále - znalosti z 35 (zbytečně) vytvořených scraperů se využily pro můj nový projekt Contactio - nástroj na hromadný e-mailing. Také vyšla nová verze Wakers CMS 5, zbouchalo se několik nových webů a přišly i rekordy v počtu poptávek.',
                    'images' => []
                ],
                [
                    'year' => '2020',
                    'title' => 'Založení Strategio Digital s.r.o. a další kontrakt s univerzitou',
                    'text' => 'Zakázek bylo víc než dost, OSVČ už nestačilo a přišlo na řadu založení firmy Strategio. Bohužel jsem se na začátku nového maratonu rovnou střelil do kolena - vyvinout cloudovou platformu pro úzce specializované e-shopy byl špatný nápad. Co klient, to naprosto unikátní požadavky na funkce a ty by bez armády programátorů trvalo vyvinout další roky. Po ¾ roce one man show skončila.<br><br>Od Jihočeské Univerzity přišel kontrakt na další 3 roky spolupráce v rámci Bobříka informatiky. Cílem bylo vytvořit prostředí, kde si děti pomocí vizuálních bloků sestaví program, který rozpohybuje jejich hrdiny a ti splní určité zadání v daných herních světech. Povedlo se a trhaly se rekordy v podobě 150&nbsp;000 soutěžících dětí.',
                ],
                [
                    'year' => '2021 - 2022',
                    'title' => 'Vývoj pro GoPay, Shoptet a Strategio',
                    'text' => 'Zatím asi nejzajímavější zakázka u mě přistála od instituce GoPay. Požadovali integraci platební brány a její širší propojení s e-shopovou platformou Shoptet. Za 3 měsíce byla venku první verze, kterou si obchodníci mohli snadno nainstalovat. Dnes tuto integraci používá přes 4&nbsp;000 obchodníků a spolupráce stále pokračuje.<br><br> V roce 2022 byl prostor na vlastní projekty - původně vyvíjená e-shop platforma prošla transformací do pokročilého CRM / CMS na kterém lze stavět nové weby. Také se mi už nechtělo platit za Fakturoid a proto vznikl Invoice GUN (vlastní systém na faktury). <br><br>Tím vůbec nejzajímavějším projektem se stalo Strategio SaaS - nástroj ve kterém lze doslova naklikat profesionální administraci aplikace, Doctrine entity, REST API a úrovně přístupů pro uživatelské skupiny. Zároveň generuje krásný zdrojový kód, který lze dle libosti upravit pro potřeby konkrétního klienta. Tento nástroj šetří mnoho času a peněz a je také zdrojem nových zakázek.',
                    'images' => []
                ],
                [
                    'year' => '2023',
                    'title' => 'Odlet do Kanady a roční práce ze zahraničí',
                    'text' => 'In progress... Odlet do Calgary 15.4. 2023.',
                    'images' => []
                ]
            ]
        ];
    }
}