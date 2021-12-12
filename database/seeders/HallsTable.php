<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hall;


class HallsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $halls = [
            [
                "name" => "Zaal 1",
                "x_amount" => "20",
                "y_amount" => "25",
            ],
            [
                "name" => "Zaal 2",
                "x_amount" => "15",
                "y_amount" => "20",
            ],
            [
                "name" => "Zaal 3",
                "x_amount" => "22",
                "y_amount" => "30",
            ],
            [
                "name" => "Zaal 4",
                "x_amount" => "12",
                "y_amount" => "15",
            ]
        ];

        foreach ($halls as $hall)
        {
            $t = new Hall($hall);
            $t->save();
        }
    }

}
