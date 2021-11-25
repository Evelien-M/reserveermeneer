<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CinemaItemController extends Controller
{
    public function index($id)
    {
        $movie = DB::table('halls_has_movies')
        ->select('halls_has_movies.id as id' ,'movies.name as movie_name', 'movies.content as content' , 'movies.content2 as content2' , 'halls.name as hall_name' , 'halls.x_amount as x_amount' , 'halls.y_amount as y_amount' , 'movies.image as image', 'movies.price as price', 'halls_has_movies.movie_start_date as movie_start_date','halls_has_movies.movie_end_date as movie_end_date')
        ->Join('halls', 'halls.id', '=', 'halls_has_movies.hall_id')
        ->Join('movies', 'movies.id', '=', 'halls_has_movies.movie_id')
        ->where('halls_has_movies.id', '=', $id)
        ->orderBy('halls_has_movies.movie_start_date')
        ->first();

        return view("cinema.cinemaitem", ['movie' => $movie]);
    }
}
