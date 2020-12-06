<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class NavigationController extends Controller
{
  public function index(): Response
  {
    Inertia::share('rooms',  Room::all());
    return Inertia::render('Dashboard');
  }

  public function login(): Response
  {
    return Inertia::render('Auth/Login');
  }

  public function register() : Response
  {
    return Inertia::render('Auth/Register');
  }
}
