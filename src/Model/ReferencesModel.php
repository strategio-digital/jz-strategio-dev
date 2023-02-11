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
     * @return array<int, array{name:string, job: string, logo:string|null, photoSm:string, photoLg:string, text:string}>
     */
    public function get(int $limit = null): array
    {
        $data = [
            [
                'name' => 'doc. PaeDr. Jiří Vaníček, Ph.D.',
                'job' => 'Vedoucí katedry informatiky, PF, JČU',
                'logo' => 'assets/img/logo/jcu-colored.svg',
                'photoSm' => 'assets/img/client/jiri-vanicek.jpg',
                'photoLg' => 'assets/img/project/jihoceska-univerzita.jpg',
                'text' => 'Jsem velmi potěšen veškerou programátorskou prací, kterou Jiří na Bobříkovi Informatiky odvedl. Jeho práce byla klíčovým přínosem pro úspěch našeho projektu a tímto mu tedy děkuji za jeho úsilí a angažovanost.'
            ],
            [
                'name' => 'Václav Novotný',
                'job' => 'Technický ředitel GoPay s.r.o.',
                'logo' => 'assets/img/logo/gopay-colored.svg',
                'photoSm' => 'assets/img/client/vaclav-novotny.jpg',
                'photoLg' => 'assets/img/project/jihoceska-univerzita.jpg',
                'text' => 'Vývoj GoPay+ doplňku do Shoptetu proběhl hladce. Oceňuji především kvalitu, proaktivní přístup a rychlou komunikaci. Jiří Zapletal je pro nás spolehlivým partnerem, se kterým plánujeme dlouhodobě spolupracovat.'
            ],
            [
                'name' => 'Roman Kučera',
                'job' => 'Jednatel Střechy Bohemia s.r.o.',
                'logo' => 'assets/img/logo/strechybohemia-colored.svg',
                'photoSm' => 'assets/img/client/roman-kucera.jpg',
                'photoLg' => 'assets/img/project/jihoceska-univerzita.jpg',
                'text' => 'Deset let bezproblémové spolupráce. Jiří pro nás vyvinul objednávkové i administrační systémy včetně několika webových stránek. Oceňuji precizní screening požadavků, odborné znalosti, lidský přístup a přesnou domluvu.'
            ],
            [
                'name' => 'Jan Přibyl',
                'job' => 'Jednatel Silluro s.r.o.',
                'logo' => null, //'assets/img/logo/silluro-colored.svg',
                'photoSm' => 'assets/img/client/jan-pribyl.jpg',
                'photoLg' => 'assets/img/project/jihoceska-univerzita.jpg',
                'text' => 'Jiří Zapletal pro nás vyvinul scrapera, díky kterému jsme byli schopni přenést veškerá produktová data včetně variant produktů do Shoptetu. Je to zkušený a spolehlivý odborník se kterým rád spolupracuji.'
            ],
            [
                'name' => 'Roman Kučera st.',
                'job' => 'Soudní znalec a odobrník v oblastni střech',
                'logo' => 'assets/img/logo/rokuc-colored.svg',
                'photoSm' => 'assets/img/client/roman-kucera-st.jpg',
                'photoLg' => 'assets/img/project/jihoceska-univerzita.jpg',
                'text' => 'Jirku považuji za skvělého kreativce a partnera. Vytvořil již několik webových stránek, které mi každý den přinášejí několik poptávek. Pro správu těchto webů používám jednoduchý web-editor Contentio, který také sám vyvinul.',
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