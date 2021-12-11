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
            ]
        ];

        foreach ($restaurants as $item)
        {
            $t = new Restaurant($item);
            $t->save();
        }
    }
}
