<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EventCRUDController;
use App\Http\Controllers\Admin\MovieCRUDController;
use App\Http\Controllers\Admin\RestaurantCRUDController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/event', [App\Http\Controllers\EventController::class, 'index']);
Route::get('/event/{event}', [App\Http\Controllers\EventItemController::class, 'index'])->middleware('auth');
Route::post('/eventItem', [App\Http\Controllers\EventItemController::class, 'store'])->middleware('auth');

Route::get('/cinema', [App\Http\Controllers\CinemaController::class, 'index']);
Route::get('/cinema/{item}', [App\Http\Controllers\CinemaItemController::class, 'index'])->middleware('auth');
Route::post('/cinemaItem', [App\Http\Controllers\CinemaItemController::class, 'store'])->middleware('auth');

Route::get('/restaurant', [App\Http\Controllers\RestaurantController::class, 'index']);
Route::get('/restaurant/{item}', [App\Http\Controllers\RestaurantItemController::class, 'index']);

Route::get('/eventcrud', [EventCRUDController::class, 'index'])->middleware('auth');
Route::get('/eventcrud/{event}/edit', [EventCRUDController::class, 'edit'])->middleware('auth');
Route::put('/eventcrud/{event}', [EventCRUDController::class, 'update'])->middleware('auth');
Route::get('/eventcrud/create', [EventCRUDController::class, 'create'])->middleware('auth');
Route::post('/eventcrud', [EventCRUDController::class, 'store'])->middleware('auth');

Route::get('/moviecrud', [MovieCRUDController::class, 'index'])->middleware('auth');
Route::get('/moviecrud/{movie}/edit', [MovieCRUDController::class, 'edit'])->middleware('auth');
Route::put('/moviecrud/{movie}', [MovieCRUDController::class, 'update'])->middleware('auth');
Route::get('/moviecrud/create', [MovieCRUDController::class, 'create'])->middleware('auth');
Route::post('/moviecrud', [MovieCRUDController::class, 'store'])->middleware('auth');

Route::get('/restaurantcrud', [RestaurantCRUDController::class, 'index'])->middleware('auth');
Route::get('/restaurantcrud/{restaurant}/edit', [RestaurantCRUDController::class, 'edit'])->middleware('auth');
Route::put('/restaurantcrud/{restaurant}', [RestaurantCRUDController::class, 'update'])->middleware('auth');
Route::get('/restaurantcrud/create', [RestaurantCRUDController::class, 'create'])->middleware('auth');
Route::post('/restaurantcrud', [RestaurantCRUDController::class, 'store'])->middleware('auth');

Route::get('/reservations', [App\Http\Controllers\ReservationsController::class, 'index'])->middleware('auth');
Route::get('/reservations/json/{id}', [App\Http\Controllers\ReservationsController::class, 'getJSON'])->middleware('auth');
Route::get('/reservations/csv/{id}', [App\Http\Controllers\ReservationsController::class, 'getCSV'])->middleware('auth');

Route::get('/planmovie/{id}', [\App\Http\Controllers\Admin\PlanMovieController::class, 'index'])->middleware('auth');
Route::post('/planmovie/{id}', [\App\Http\Controllers\Admin\PlanMovieController::class, 'showHalls'])->middleware('auth');
Route::post('/planmovie/{id}/hall', [\App\Http\Controllers\Admin\PlanMovieController::class, 'store'])->middleware('auth');

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);