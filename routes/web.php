<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EventCRUDController;

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

Route::get('/eventcrud', [EventCRUDController::class, 'index'])->middleware('auth');
Route::get('/eventcrud/{event}/edit', [EventCRUDController::class, 'edit'])->middleware('auth');
Route::put('/eventcrud/{event}', [EventCRUDController::class, 'update'])->middleware('auth');
Route::get('/eventcrud/create', [EventCRUDController::class, 'create'])->middleware('auth');
Route::post('/eventcrud', [EventCRUDController::class, 'store'])->middleware('auth');

Route::get('/reservations', [App\Http\Controllers\ReservationsController::class, 'index'])->middleware('auth');
Route::get('/reservations/json/{id}', [App\Http\Controllers\ReservationsController::class, 'getJSON'])->middleware('auth');
Route::get('/reservations/csv/{id}', [App\Http\Controllers\ReservationsController::class, 'getCSV'])->middleware('auth');

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);