<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Hall;
use App\Models\Halls_has_movie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateInterval;

class PlanMovieController extends Controller
{
    public function index($id)
    {
        if (Auth::user()->name == "admin")
        {
            $movie = Movie::whereId($id)->first();
            $availableHalls = $this->getAvailableHalls(null,null);
            return view("admin.planmovie.index", ['movie' => $movie, 'halls' => $availableHalls, 'startdate' => null]);
        }
        return redirect()->back();
    }

    public function showHalls($id)
    {
        if (Auth::user()->name == "admin")
        {

            request()->validate([
            "startdate" => "date_format:Y-m-d\TH:i"]);
        
            $movie = Movie::whereId($id)->first();
            $availableHalls = $this->getAvailableHalls(request('startdate'),$movie->duration);
            return view("admin.planmovie.index", ['movie' => $movie, 'halls' => $availableHalls, 'startdate' => request('startdate')]);
        }
        return redirect()->back();
    }

    private function getAvailableHalls($startdate,$duration)
    {
        if ($startdate == null || $duration == null)
        {
            return [];
        }
            $start = new DateTime($startdate);
            $end = new DateTime($startdate);
            $end->add(new DateInterval('PT' . $duration . 'M'));
            $daynumber = $start->format('z') + 1;
            
             $c = DB::table('halls_has_movies')
                ->select('halls.id as hall_id', 'movie_id as movie_id ','movie_start_date as movie_start_date','movie_end_date as movie_end_date', 'day as day')
                ->Join('halls', 'halls.id', '=', 'halls_has_movies.hall_id')
                ->where('halls_has_movies.day' , '=', $daynumber)
                ->orderBy("halls_has_movies.hall_id")
                ->get();
            
      
            $remove_ids = [];
            $count = 0;
            $id = 1;
            foreach($c as $row)
            {
                if($row->hall_id == $id)
                {
                    $count++;
                    if($count == 3)
                    {
                        array_push($remove_ids,$id);
                        $count = 0;
                        $id++;
                    }
                }
                $a = new DateTime($row->movie_start_date);
                $b = new DateTime($row->movie_end_date);
                if($start >= $a && $end >= $b)
                {
                    array_push($remove_ids, $row->hall_id);
                }
                else if($start >= $a && $end <= $b)
                {
                    array_push($remove_ids, $row->hall_id);
                }

            }
 
            $availableHalls = Hall::whereNotIn('id', $remove_ids)->get();
        return $availableHalls;
    }

    public function store($id)
    {
        if (Auth::user()->name == "admin")
        {
            request()->validate([
                'selectedhall' => 'required']);
            
            $start = new DateTime(request('movie_start_date'));
            $end = new DateTime(request('movie_start_date'));
            $end->add(new DateInterval('PT' . request('duration') . 'M'));
            $daynumber = $start->format('z') + 1;

            Halls_has_movie::create([
                'hall_id' => request('selectedhall'),
                'movie_id' => $id,
                'movie_start_date' => $start,
                'movie_end_date' => $end,
                'day' => $daynumber
            ]);
            return redirect("/cinema");
        }
        return redirect()->back();
    }
}
