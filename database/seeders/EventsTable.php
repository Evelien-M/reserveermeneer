<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                "name" => "Graspop",
                "image" => "1636540149.jpg",
                "content" => "Graspop Metal Meeting is een jaarlijks meerdaags metalfestival in Dessel, in de Belgische provincie Antwerpen. Sinds 2008 trekt het festival elk jaar rond de 135.000 bezoekers. Vanaf 2011 is het een vierdaags festival dat, behoudens enkele uitzonderingen, telkens in het voorlaatste weekend van juni plaatsvindt.",
                "content2" => "Graspop Metal Meeting is an annual multi-day metal festival in Dessel, in the Belgian province of Antwerp. Since 2008, the festival has attracted around 135,000 visitors every year. From 2011, it is a four-day festival that, with a few exceptions, always takes place in the penultimate weekend of June.",
                "event_start_date" => "2022-02-08 15:00:00",
                "event_end_date" => "2022-02-11 20:00:00",
                "max_amount_tickets" => 1000,
                "max_amount_tickets_per_person" => 8,
                "location" => "Dessel",
                "price" => 12.99
            ],
            [
                "name" => "Lowlands",
                "image" => "1639216467.jpg",
                "content" => "A Campingflight to Lowlands Paradise of kortweg Lowlands is een driedaags muziekfestival dat sinds 1993 jaarlijks in Biddinghuizen (Flevoland) op het evenemententerrein van Walibi Holland gehouden wordt. Mojo Concerts begon Lowlands als tegenhanger van festivals als Pinkpop en Dynamo Open Air en probeerde hier wat alternatievere muziek uit. Het festival heeft grote variatie in het aanbod van amusement: er is niet alleen muziek, maar ook literatuur, film, cabaret, ballet, theater en strip.",
                "content2" => "A Campingflight to Lowlands Paradise or Lowlands for short is a three-day music festival that has been held annually in Biddinghuizen (Flevoland) on the event site of Walibi Holland since 1993. Mojo Concerts started Lowlands as a counterpart to festivals such as Pinkpop and Dynamo Open Air and tried out some more alternative music here. The festival offers a wide variety of entertainment: there is not only music, but also literature, film, cabaret, ballet, theater and comics.",
                "event_start_date" => "2022-02-20 15:00:00",
                "event_end_date" => "2022-02-24 20:00:00",
                "max_amount_tickets" => 800,
                "max_amount_tickets_per_person" => 8,
                "location" => "Biddinghuizen",
                "price" => 16.99
            ],
            [
                "name" => "Rock am Ring",
                "image" => "1234124.jpg",
                "content" => "Rock am Ring is een jaarlijks terugkerend muziekfestival op de Nürburgring nabij Adenau in de Eifel (Duitsland). Het festival trekt jaarlijks tienduizenden bezoekers voor tientallen optredens. Rock am Ring duurt drie dagen en om het festivalterrein heen liggen meerdere campings.",
                "content2" => "Rock am Ring is an annual music festival on the Nürburgring near Adenau in the Eifel (Germany). The festival attracts tens of thousands of visitors every year for dozens of performances. Rock am Ring lasts three days and there are several campsites around the festival site.",
                "event_start_date" => "2022-08-20 15:00:00",
                "event_end_date" => "2022-08-24 20:00:00",
                "max_amount_tickets" => 1000,
                "max_amount_tickets_per_person" => 8,
                "location" => "Neurenberg",
                "price" => 19.99
            ],
            [
                "name" => "Download Festival",
                "image" => "1321323.jpg",
                "content" => "Het Download Festival is een drie dagen durend rock/metal-muziekfestival, dat jaarlijks wordt gehouden in Donington Park, Engeland. Het festival vindt altijd plaats tegen het einde van het voorjaar, en wordt beheerd door Live Nation.",
                "content2" => "The Download Festival is a three day rock/metal music festival held annually in Donington Park, England. The festival always takes place towards the end of spring, and is managed by Live Nation.",
                "event_start_date" => "2022-06-20 15:00:00",
                "event_end_date" => "2022-06-24 20:00:00",
                "max_amount_tickets" => 1200,
                "max_amount_tickets_per_person" => 6,
                "location" => "Donington Park",
                "price" => 19.99
            ],
            [
                "name" => "Pinkpop",
                "image" => "1323214.jpg",
                "content" => "Pinkpop is het langstlopende jaarlijkse popfestival ter wereld.[1] Het festival is een aantal keer van locatie gewisseld. In principe wordt het evenement sinds 2008 in elk jaar waarin Pinksteren vroeg valt, niet met Pinksteren gehouden, maar in een ander weekend, dat in of dichter bij de maand juni ligt. De reden hiervoor is dat Pinksteren anders te ver van andere Europese festivals zou liggen en er dan niet veel bands op tournee zijn in Europa, met als gevolg dat er in het Pinksterweekend te weinig bands zouden kunnen optreden. Hiermee had het evenement een slechte ervaring in 2005.",
                "content2" => "Pinkpop is the longest running annual pop festival in the world.[1] The festival has changed locations a number of times. In principle, since 2008, in every year in which Pentecost falls early, the event is not held at Pentecost, but on a different weekend, which is in or closer to the month of June. The reason for this is that Pentecost would otherwise be too far from other European festivals and there would not be many bands touring in Europe, with the result that too few bands could perform during the Whitsun weekend. With this, the event had a bad experience in 2005.",
                "event_start_date" => "2022-07-20 15:00:00",
                "event_end_date" => "2022-07-24 20:00:00",
                "max_amount_tickets" => 600,
                "max_amount_tickets_per_person" => 5,
                "location" => "Landgraaf",
                "price" => 19.99
            ]
        ];

        foreach ($events as $event)
        {
            $t = new Event($event);
            $t->save();
        }
    }
}
