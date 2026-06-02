<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class UserEventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('event_date', 'asc')->get();

        return view('user.events', compact('events'));
    }

    public function show(Event $event)
    {
        return view('user.detail', compact('event'));
    }
}
