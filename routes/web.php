<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/event', [App\Http\Controllers\EventController::class, 'index'])->middleware('auth');

Route::get('/eventcrud', [App\Http\Controllers\Admin\EventCRUDController::class, 'index'])->middleware('auth');

Route::prefix('/eventcrud')->group( function () 
{
    route::post('/create', [App\Http\Controllers\Admin\EventCRUDController::class, 'create']);
    route::put('/{id}', [App\Http\Controllers\Admin\EventCRUDController::class, 'update']);
    route::delete('/{id}', [App\Http\Controllers\Admin\EventCRUDController::class, 'delete']);
}
);