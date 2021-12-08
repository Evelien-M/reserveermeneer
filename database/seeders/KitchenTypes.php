<?php

namespace Database\Seeders;

use App\Models\Restaurant_kitchentype;
use Illuminate\Database\Seeder;

class KitchenTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                "type" => "Orientaals",
            ],
            [
                "type" => "Sushi",
            ],
            [
                "type" => "Arabisch",
            ],
            [
                "type" => "Italiaans",
            ]
        ];

        foreach ($types as $type)
        {
            $t = new Restaurant_kitchentype($type);
            $t->save();
        }
    }
}
