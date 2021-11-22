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
            ]
        ];

        foreach ($halls as $hall)
        {
            $t = new Hall($hall);
            $t->save();
        }
    }

}
