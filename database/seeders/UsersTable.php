<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "name" => "admin",
                "email" => "admin@reserveermeneer.nl",
                "password" => "$2y$10$7xeOo66IjZ15MLXh/P0zy.f8QY8aJ7QXCijCDPKv4/SLeXNd7J9bi"
            ]
        ];

        foreach ($users as $user)
        {
            if(User::where('name',$user['name'])->first() === null) {
                $t = new User($user);
                $t->save();
            }

        }
    }
}
