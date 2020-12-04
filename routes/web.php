<?php

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

Route::get('/about', function () {
  return Inertia::render('Welcome', ['foo' => 'about',]);
});

Route::get('/contact', function () {
  return Inertia::render('Welcome', ['foo' => 'Contact',]);
});

Route::get('/', function () {
  $user = Auth::user();
  return Inertia::render('Welcome', ['foo' => 'About', 'user' => $user]);
})->middleware(['auth:sanctum', 'verified']);

Route::get('/dashboard', function () {
  $user = Auth::user();
  return Inertia::render('Welcome', ['foo' => 'About', 'user' => $user]);
})->middleware(['auth:sanctum', 'verified']);

Route::get('/login', function () {
  return Inertia::render('Auth/Login');
})->name('login');

Route::get('/register', function () {
  return Inertia::render('Auth/Register');
});
