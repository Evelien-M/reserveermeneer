<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class RestaurantTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = [
            [
                "name" => "Restaurant Buurten",
                "open_time" => "10:00",
                "close_time" => "16:00",
                "amount_seats" => "20",
                "location" => "Utrecht",
                "kitchen_type" => "Orientaals"
            ],
            [
                "name" => "Restaurant Taboe",
                "open_time" => "17:00",
                "close_time" => "22:00",
                "amount_seats" => "28",
                "location" => "Utrecht",
                "kitchen_type" => "Arabisch"
            ],
            [
                "name" => "Restaurant Badhuis",
                "open_time" => "10:00",
                "close_time" => "17:00",
                "amount_seats" => "34",
                "location" => "Utrecht",
                "kitchen_type" => "Italiaans"
            ],
            [
                "name" => "Restaurant BuitenHuis",
                "open_time" => "11:00",
                "close_time" => "20:00",
                "amount_seats" => "54",
                "location" => "Amersfoort",
                "kitchen_type" => "Orientaals"
            ],
            [
                "name" => "Restaurant 't Hoogt",
                "open_time" => "11:00",
                "close_time" => "20:00",
                "amount_seats" => "64",
                "location" => "Amersfoort",
                "kitchen_type" => "Sushi"
            ],
            [
                "name" => "Restaurant Perceel",
                "open_time" => "12:00",
                "close_time" => "21:00",
                "amount_seats" => "64",
                "location" => "Rotterdam",
                "kitchen_type" => "Italiaans"
            ],
            [
                "name" => "Restaurant Zotte",
                "open_time" => "17:00",
                "close_time" => "22:00",
                "amount_seats" => "34",
                "location" => "Rotterdam",
                "kitchen_type" => "Arabisch"
            ],
            [
                "name" => "Restaurant Harmsen",
                "open_time" => "12:00",
                "close_time" => "18:00",
                "amount_seats" => "44",
                "location" => "Amsterdam",
                "kitchen_type" => "Orientaals"
            ],
            [
                "name" => "Restaurant Amstelle",
                "open_time" => "12:00",
                "close_time" => "22:00",
                "amount_seats" => "44",
                "location" => "Amsterdam",
                "kitchen_type" => "Orientaals"
            ],
            [
                "name" => "Restaurant Aan de Poel",
                "open_time" => "12:00",
                "close_time" => "18:00",
                "amount_seats" => "24",
                "location" => "Amsterdam",
                "kitchen_type" => "Orientaals"
            ]
        ];

        foreach ($restaurants as $item)
        {
            $t = new Restaurant($item);
            $t->save();
        }
    }
}
