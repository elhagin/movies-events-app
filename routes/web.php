<?php

use App\Http\Controllers\AttendeeController;
use App\Http\Controllers\EventDayController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ShowtimeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('register', RegisterController::class)->only(['index', 'store']);
Route::resource('movies', MovieController::class)->only(['index', 'store', 'create']);
Route::resource('eventDays', EventDayController::class)->only(['index', 'store', 'create']);
Route::resource('attendees', AttendeeController::class)->only(['index', 'store']);
Route::resource('showtimes', ShowtimeController::class)->only(['index', 'store', 'create']);
Route::get('/movies/edit', [MovieController::class, 'edit'])->name('movies.edit');
Route::post('/movies/edit', [MovieController::class, 'update'])->name('movies.update');
Route::get('/movies/delete', [MovieController::class, 'delete'])->name('movies.delete');
Route::post('/movies/delete', [MovieController::class, 'destroy'])->name('movies.destroy');
Route::get('/showtimes/edit', [ShowtimeController::class, 'edit'])->name('showtimes.edit');
Route::post('/showtimes/edit', [ShowtimeController::class, 'update'])->name('showtimes.update');
Route::get('/showtimes/delete', [ShowtimeController::class, 'delete'])->name('showtimes.delete');
Route::post('/showtimes/delete', [ShowtimeController::class, 'destroy'])->name('showtimes.destroy');
Route::get('/eventDays/edit', [EventDayController::class, 'edit'])->name('eventDays.edit');
Route::post('/eventDays/edit', [EventDayController::class, 'update'])->name('eventDays.update');
Route::get('/eventDays/delete', [EventDayController::class, 'delete'])->name('eventDays.delete');
Route::post('/eventDays/delete', [EventDayController::class, 'destroy'])->name('eventDays.destroy');
