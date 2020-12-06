<?php

use App\Http\Controllers\NavigationController;
use App\Http\Controllers\ReservationRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', [NavigationController::class, 'index'])->middleware(['auth:sanctum', 'verified']);
Route::get('/dashboard', [NavigationController::class, 'index'])->middleware(['auth:sanctum', 'verified']);
Route::get('/login', [NavigationController::class, 'login'])->name('login');
Route::get('/register', [NavigationController::class, 'register']);
Route::get('/events', [ReservationRepository::class, 'eventsList']);
Route::get('/events/search/{date}', [ReservationRepository::class, 'eventSearch']);

Route::post('/events/add', [ReservationRepository::class, 'addEvent'])->middleware(['auth:sanctum', 'verified']);

Route::delete('/events/{event}/delete', [ReservationRepository::class, 'deleteEvent'])->middleware(['auth:sanctum', 'verified']);
