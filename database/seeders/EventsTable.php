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
                "event_start_date" => "2021-11-09 15:33:53",
                "event_end_date" => "2021-11-11 15:33:53",
                "max_amount_tickets" => 400,
                "max_amount_tickets_per_person" => 8,
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
