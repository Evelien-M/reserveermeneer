<?php

namespace App\Http\Controllers;

use App\Models\Halls_has_movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;

class CinemaController extends Controller
{
    public function index()
    {
        $now = new DateTime();
        $now->format('Y-m-d H:i:s');

        $movies = DB::table('halls_has_movies')
        ->select('halls_has_movies.id as id' ,'movies.name as movie_name', 'halls.name as hall_name' , 'movies.image as image', 'movies.price as price', 'halls_has_movies.movie_start_date as movie_start_date','halls_has_movies.movie_end_date as movie_end_date')
        ->Join('halls', 'halls.id', '=', 'halls_has_movies.hall_id')
        ->Join('movies', 'movies.id', '=', 'halls_has_movies.movie_id')
        ->where('halls_has_movies.movie_start_date', '>', $now)
        ->orderBy('halls_has_movies.movie_start_date')
        ->get();

        return view('cinema/cinema',['movies' => $movies]);
    }
}
