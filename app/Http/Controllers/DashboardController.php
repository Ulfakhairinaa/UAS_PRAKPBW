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

        $upcomingEvent = Event::where('event_date', '>=', date('Y-m-d'))
            ->orderBy('event_date', 'asc')
            ->first();

        return view('dashboard', compact(
            'totalEvents',
            'totalParticipants',
            'upcomingEvent'
        ));
    }
}