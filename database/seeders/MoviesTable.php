<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;

class MoviesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movies = [
            [
                "name" => "Lord of the rings Deel 1",
                "image" => "lort_1.jpg",
                "content" => "In een klein, gezellig dorpje in Midden-Aarde komt een ring met bijzondere krachten toevallig in handen van de hobbit Frodo. Het is een instrument dat Sauron, de duistere heerser van het koninkrijk Mordor, in staat zou stellen de wereld te veroveren.",
                "content2" => "In a small, cozy village in Middle-earth, a ring with special powers happens to be in the hands of the hobbit Frodo. It is an instrument that would enable Sauron, the dark ruler of the kingdom of Mordor, to take over the world.",
                "duration" => "178",
                'price' => "12.99"
            ],
            [
                "name" => "Lord of the rings Deel 2",
                "image" => "lort_2.jpg",
                "content" => "In een klein, gezellig dorpje in Midden-Aarde komt een ring met bijzondere krachten toevallig in handen van de hobbit Frodo. Het is een instrument dat Sauron, de duistere heerser van het koninkrijk Mordor, in staat zou stellen de wereld te veroveren.",
                "content2" => "In a small, cozy village in Middle-earth, a ring with special powers happens to be in the hands of the hobbit Frodo. It is an instrument that would enable Sauron, the dark ruler of the kingdom of Mordor, to take over the world.",
                "duration" => "179",
                'price' => "12.99"
            ],
            [
                "name" => "Lord of the rings Deel 3",
                "image" => "lort_3.jpg",
                "content" => "In een klein, gezellig dorpje in Midden-Aarde komt een ring met bijzondere krachten toevallig in handen van de hobbit Frodo. Het is een instrument dat Sauron, de duistere heerser van het koninkrijk Mordor, in staat zou stellen de wereld te veroveren.",
                "content2" => "In a small, cozy village in Middle-earth, a ring with special powers happens to be in the hands of the hobbit Frodo. It is an instrument that would enable Sauron, the dark ruler of the kingdom of Mordor, to take over the world.",
                "duration" => "201",
                'price' => "12.99"
            ]
        ];

        foreach ($movies as $movie)
        {
            $t = new Movie($movie);
            $t->save();
        }
    }
}
