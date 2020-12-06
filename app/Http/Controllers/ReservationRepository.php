<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class ReservationRepository extends Controller
{
  public function addEvent(Request $r)
  {
    $test = Event::query()->where('event_date', $r->evt_date)->whereBetween('start_time', [$r->evt_start, $r->evt_end])->whereBetween('end_time', [$r->evt_start, $r->evt_end])->where('room_id', $r->room)->get();

    if (count($test) === 0) {
      $event = new Event([
        'event_name' => $r->name,
        'event_date' => $r->evt_date,
        'start_time' => $r->evt_start,
        'end_time' => $r->evt_end,
        'room_id' => $r->room,
        'user_id' => $r->user()->id,
      ]);
      return $event->save();
    }
    return $test;
  }

  public function eventsList()
  {
    return Event::query()->with('room')->get();
  }

  public function eventSearch(String $date) {
   return Event::query()->where('event_date', $date)->with('room')->get();
  }

  public function deleteEvent(Event $event)
  {
    try {
      return $event->delete();
    } catch (\Exception $e) {
      return $e;
    }
  }
}
