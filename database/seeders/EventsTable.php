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
                "max_amount_tickets" => 400,
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
            ]
        ];

        foreach ($events as $event)
        {
            $t = new Event($event);
            $t->save();
        }
    }
}
