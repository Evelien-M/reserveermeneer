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
            ]
        ];

        foreach ($events as $event)
        {
            $t = new Event($event);
            $t->save();
        }
    }
}
