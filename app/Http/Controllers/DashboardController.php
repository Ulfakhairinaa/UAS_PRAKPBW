<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEvents = Event::count();
        $totalParticipants = 0;

        $status = request('status', 'upcoming');

        $events = Event::where('status', $status)
            ->orderBy('event_date', 'asc')
            ->get();

        $selectedEvent = $events->first();

        return view('dashboard', compact(
            'totalEvents',
            'totalParticipants',
            'events',
            'selectedEvent',
            'status'
        ));
    }
}