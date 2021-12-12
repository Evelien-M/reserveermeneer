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
            ],
            [
                "name" => "Harry Potter Deel 1",
                "image" => "PS_poster1.jpg",
                "content" => "De wereld van Harry Potter is de magische wereld zoals die beschreven wordt in de Harry Potter-boeken van J.K. Rowling, die naast de 'normale' wereld van Dreuzels (niet-magische mensen) bestaat. De magische wereld is wel bekend met de dreuzelwereld, maar leeft volledig voor hen verborgen; de dreuzelwereld is niet bekend met het bestaan van de magische wereld. Een van de belangrijkste taken van de magische wereld is haar bestaan verborgen houden voor de dreuzels. De term 'magische wereld' slaat op de maatschappij van tovenaars, heksen en magische wezens, niet zozeer op de geografische locatie. De magische wereld bevindt zich op dezelfde aarde en in hetzelfde universum als de dreuzelwereld.",
                "content2" => "The world of Harry Potter is the magical world described in the Harry Potter books by J.K. Rowling, who coexists with the 'normal' world of Muggles (non-magical humans). The magical world is well acquainted with the Muggle world, but lives completely hidden from them; the muggle world is not aware of the existence of the magical world. One of the main tasks of the magical world is to hide its existence from the Muggles. The term 'magic world' refers to the society of wizards, witches and magical creatures, rather than geographical location. The magical world is on the same Earth and in the same universe as the Muggle world.",
                "duration" => "152",
                'price' => "9.99"
            ],
            [
                "name" => "Harry Potter Deel 2",
                "image" => "PS_poster2.jpg",
                "content" => "De wereld van Harry Potter is de magische wereld zoals die beschreven wordt in de Harry Potter-boeken van J.K. Rowling, die naast de 'normale' wereld van Dreuzels (niet-magische mensen) bestaat. De magische wereld is wel bekend met de dreuzelwereld, maar leeft volledig voor hen verborgen; de dreuzelwereld is niet bekend met het bestaan van de magische wereld. Een van de belangrijkste taken van de magische wereld is haar bestaan verborgen houden voor de dreuzels. De term 'magische wereld' slaat op de maatschappij van tovenaars, heksen en magische wezens, niet zozeer op de geografische locatie. De magische wereld bevindt zich op dezelfde aarde en in hetzelfde universum als de dreuzelwereld.",
                "content2" => "The world of Harry Potter is the magical world described in the Harry Potter books by J.K. Rowling, who coexists with the 'normal' world of Muggles (non-magical humans). The magical world is well acquainted with the Muggle world, but lives completely hidden from them; the muggle world is not aware of the existence of the magical world. One of the main tasks of the magical world is to hide its existence from the Muggles. The term 'magic world' refers to the society of wizards, witches and magical creatures, rather than geographical location. The magical world is on the same Earth and in the same universe as the Muggle world.",
                "duration" => "161",
                'price' => "9.99"
            ],
            [
                "name" => "Harry Potter Deel 3",
                "image" => "PS_poster3.jpg",
                "content" => "De wereld van Harry Potter is de magische wereld zoals die beschreven wordt in de Harry Potter-boeken van J.K. Rowling, die naast de 'normale' wereld van Dreuzels (niet-magische mensen) bestaat. De magische wereld is wel bekend met de dreuzelwereld, maar leeft volledig voor hen verborgen; de dreuzelwereld is niet bekend met het bestaan van de magische wereld. Een van de belangrijkste taken van de magische wereld is haar bestaan verborgen houden voor de dreuzels. De term 'magische wereld' slaat op de maatschappij van tovenaars, heksen en magische wezens, niet zozeer op de geografische locatie. De magische wereld bevindt zich op dezelfde aarde en in hetzelfde universum als de dreuzelwereld.",
                "content2" => "The world of Harry Potter is the magical world described in the Harry Potter books by J.K. Rowling, who coexists with the 'normal' world of Muggles (non-magical humans). The magical world is well acquainted with the Muggle world, but lives completely hidden from them; the muggle world is not aware of the existence of the magical world. One of the main tasks of the magical world is to hide its existence from the Muggles. The term 'magic world' refers to the society of wizards, witches and magical creatures, rather than geographical location. The magical world is on the same Earth and in the same universe as the Muggle world.",
                "duration" => "142",
                'price' => "9.99"
            ],
            [
                "name" => "Harry Potter Deel 4",
                "image" => "PS_poster4.jpg",
                "content" => "De wereld van Harry Potter is de magische wereld zoals die beschreven wordt in de Harry Potter-boeken van J.K. Rowling, die naast de 'normale' wereld van Dreuzels (niet-magische mensen) bestaat. De magische wereld is wel bekend met de dreuzelwereld, maar leeft volledig voor hen verborgen; de dreuzelwereld is niet bekend met het bestaan van de magische wereld. Een van de belangrijkste taken van de magische wereld is haar bestaan verborgen houden voor de dreuzels. De term 'magische wereld' slaat op de maatschappij van tovenaars, heksen en magische wezens, niet zozeer op de geografische locatie. De magische wereld bevindt zich op dezelfde aarde en in hetzelfde universum als de dreuzelwereld.",
                "content2" => "The world of Harry Potter is the magical world described in the Harry Potter books by J.K. Rowling, who coexists with the 'normal' world of Muggles (non-magical humans). The magical world is well acquainted with the Muggle world, but lives completely hidden from them; the muggle world is not aware of the existence of the magical world. One of the main tasks of the magical world is to hide its existence from the Muggles. The term 'magic world' refers to the society of wizards, witches and magical creatures, rather than geographical location. The magical world is on the same Earth and in the same universe as the Muggle world.",
                "duration" => "157",
                'price' => "9.99"
            ],
            [
                "name" => "Harry Potter Deel 5",
                "image" => "PS_poster5.jpg",
                "content" => "De wereld van Harry Potter is de magische wereld zoals die beschreven wordt in de Harry Potter-boeken van J.K. Rowling, die naast de 'normale' wereld van Dreuzels (niet-magische mensen) bestaat. De magische wereld is wel bekend met de dreuzelwereld, maar leeft volledig voor hen verborgen; de dreuzelwereld is niet bekend met het bestaan van de magische wereld. Een van de belangrijkste taken van de magische wereld is haar bestaan verborgen houden voor de dreuzels. De term 'magische wereld' slaat op de maatschappij van tovenaars, heksen en magische wezens, niet zozeer op de geografische locatie. De magische wereld bevindt zich op dezelfde aarde en in hetzelfde universum als de dreuzelwereld.",
                "content2" => "The world of Harry Potter is the magical world described in the Harry Potter books by J.K. Rowling, who coexists with the 'normal' world of Muggles (non-magical humans). The magical world is well acquainted with the Muggle world, but lives completely hidden from them; the muggle world is not aware of the existence of the magical world. One of the main tasks of the magical world is to hide its existence from the Muggles. The term 'magic world' refers to the society of wizards, witches and magical creatures, rather than geographical location. The magical world is on the same Earth and in the same universe as the Muggle world.",
                "duration" => "138",
                'price' => "9.99"
            ],
        ];

        foreach ($movies as $movie)
        {
            $t = new Movie($movie);
            $t->save();
        }
    }
}
