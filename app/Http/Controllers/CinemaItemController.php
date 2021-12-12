<?php

namespace App\Http\Controllers;

use App\Models\Halls_has_movie;
use App\Models\Movies_reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $amount_reservation = Movies_reservation::All()->Where('halls_has_movies_id' , '=', $movie->id);
        $array = $this->CreateArray($movie,$amount_reservation);
        $capaciteit = $movie->x_amount * $movie->y_amount;
        $ticketsLeft = $capaciteit - count($amount_reservation);
        return view("cinema.cinemaitem", ['movie' => $movie, 'ticketsLeft' => $ticketsLeft, 'reservation' => $array]);
    }

    public function store()
    {
        $halls_has_movies_id = Halls_has_movie::whereId(request('halls_has_movies_id'))->first();
        if($halls_has_movies_id == null)
        {
            abort(404);
        }

        $checks = request()->input('pos');
        if ($checks == null)
        {
            return redirect()->back();
        }

        request()->validate([
            'zipcode' => 'required|max:255',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'house_number' => 'required|max:255',
            'country' => 'required|max:255'
        ]);
        foreach ($checks as $check) {
            $a = explode("-",$check); 
            $x = $a[0];
            $y = $a[1];

            $l = Movies_reservation::all()->where('x', '=', $x-1)->where('y', '=', $y)->first();
            $r = Movies_reservation::all()->where('x', '=', $x+1)->where('y', '=', $y)->first();
           if($l == null)
            {
                Movies_reservation::create([
                    'halls_has_movies_id' => $halls_has_movies_id->id,
                    'user_id' => null,
                    'x' => $x - 1,
                    'y' => $y,
                    'locked' => true,
                    'zipcode' => request('zipcode'),
                    'address' => request('address'),
                    'city' => request('city'),
                    'house_number' => request('house_number'),
                    'country' => request('country')
                ]);
            }
            if($r == null)
            {
                Movies_reservation::create([
                    'halls_has_movies_id' => $halls_has_movies_id->id,
                    'user_id' => null,
                    'x' => $x + 1,
                    'y' => $y,
                    'locked' => true,
                    'zipcode' => request('zipcode'),
                    'address' => request('address'),
                    'city' => request('city'),
                    'house_number' => request('house_number'),
                    'country' => request('country')
                ]);
            }

            Movies_reservation::create([
                'halls_has_movies_id' => $halls_has_movies_id->id,
                'user_id' => Auth::User()->id,
                'x' => $x,
                'y' => $y,
                'locked' => false,
                'zipcode' => request('zipcode'),
                'address' => request('address'),
                'city' => request('city'),
                'house_number' => request('house_number'),
                'country' => request('country')
            ]);
        }
        return redirect('/reservations');
    }

    private function CreateArray($movie, $reservation)
    {
        $array = array();
        for($y = 0; $y < $movie->y_amount; $y++)
        {
            for($x = 0; $x < $movie->x_amount; $x++)
            {
                $array[$x][$y] = 0;
                foreach($reservation as $item) {
                    if($item->x == $x && $item->y == $y)
                    {
                        if($item->user_id != null)
                        {
                            $array[$x][$y] = 1;
                        }
                        else if ($item->locked == 1)
                        {
                            $array[$x][$y] = 2;
                        }
                    }
                }
            }
        }
        return $array;
    }
}
