<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTable::class,
            EventsTable::class,
            HallsTable::class,
            MoviesTable::class,
            KitchenTypes::class,
            RestaurantTable::class
        ]);
    }
}
