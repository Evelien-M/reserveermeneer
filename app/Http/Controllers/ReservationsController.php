<?php

namespace App\Http\Controllers;

use App\Models\Event_ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ReservationsController extends Controller
{
    public function index()
    {
        $event_reservation = $this->getEventTickets();
        $movie_reservation = $this->getCinemaTickets();
        $restaurant_reservation = $this->getRestaurantReservation();
        return view('reservations', ['event' => $event_reservation, 'movie' => $movie_reservation, 'restaurant' => $restaurant_reservation]);
    }

    public function getJSON($id)
    {
        $ticket = Event_ticket::all()->where('user_id', '=', Auth::user()->id)->where('id', '=', $id);
        $json = json_encode($ticket);
        $name = "json_" . $id . ".json";
        Storage::disk('public')->put($name, $json);
        return response()->download(storage_path('app\\public\\'. $name));
    }

    private function getEventTickets()
    {
        return DB::table('event_tickets')
        ->select('event_tickets.id as id','name as name','location as location','event_start_date as event_start_date', 'event_end_date as event_end_date', 'price as price', 'days as days')
            ->join('events', 'events.id', '=', 'event_tickets.events_id')
            ->where('event_tickets.user_id', '=', Auth::user()->id)
            ->get();
    }

    private function getCinemaTickets()
    {
        return DB::table('movies_reservations')
        ->select('movies_reservations.x as x','movies_reservations.y as y','halls_has_movies.movie_start_date as start_date','halls_has_movies.movie_end_date as end_date','halls.name as hall_name','movies.name as movie_name','movies.price as movie_price')
            ->join('halls_has_movies', 'halls_has_movies.id', '=', 'movies_reservations.halls_has_movies_id')
            ->join('halls', 'halls_has_movies.hall_id', '=', 'halls.id')
            ->join('movies', 'halls_has_movies.movie_id', '=', 'movies.id')
            ->where('movies_reservations.user_id', '=', Auth::user()->id)
            ->get();
    }

    private function getRestaurantReservation()
    {
        return DB::table('restaurant_reservations')
        ->select('restaurants.name as name','restaurants.location as location','restaurant_reservations.day as day','restaurant_reservations.time as time')
            ->join('restaurants', 'restaurants.id', '=', 'restaurant_reservations.restaurant_id')
            ->where('restaurant_reservations.user_id', '=', Auth::user()->id)
            ->get();
    }

    public function getCSV($id)
    {
        $fileName = "csv_" . $id . ".csv";
        $tasks = Event_ticket::all()->where('user_id', '=', Auth::user()->id)->where('id', '=', $id);

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('user_id', 'events_id', 'image', 'days', 'zipcode', 'address', 'city', 'house_number', 'country');

        $callback = function() use($tasks, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($tasks as $task) {
                $row['user_id']  = $task->user_id;
                $row['events_id']    = $task->events_id;
                $row['image']    = $task->image;
                $row['days']  = $task->days;
                $row['zipcode']  = $task->zipcode;
                $row['address']  = $task->address;
                $row['city']  = $task->city;
                $row['house_number']  = $task->house_number;
                $row['country']  = $task->country;

                fputcsv($file, array($row['user_id'], $row['events_id'], $row['image'], $row['days'], $row['zipcode'], $row['address'], $row['city'], $row['house_number'], $row['country']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
        }
}
