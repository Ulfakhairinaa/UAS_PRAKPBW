<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        session([
            'role' => 'admin',
            'admin_code' => '70',
            'admin_prodi' => 'Informatika'
        ]);
        $status = $request->status ?? 'upcoming';

        $events = Event::where('prodi_code', session('admin_code'))
            ->where('status', $status)
            ->orderBy('event_date', 'asc')
            ->get();

        $totalEvents = Event::where('prodi_code', session('admin_code'))->count();

        $totalParticipants = Registration::whereHas('event', function ($query) {
            $query->where('prodi_code', session('admin_code'));
        })->count();

        $upcomingCount = Event::where('prodi_code', session('admin_code'))
            ->where('status', 'upcoming')
            ->count();

        $ongoingCount = Event::where('prodi_code', session('admin_code'))
            ->where('status', 'ongoing')
            ->count();

        $doneCount = Event::where('prodi_code', session('admin_code'))
            ->where('status', 'done')
            ->count();

        return view('admin.dashboard', compact(
            'events',
            'status',
            'totalEvents',
            'totalParticipants',
            'upcomingCount',
            'ongoingCount',
            'doneCount'
        ));
    }

    public function participants(Request $request)
    {
        session([
            'role' => 'admin',
            'admin_code' => '70',
            'admin_prodi' => 'Informatika'
        ]);

        $events = Event::where('prodi_code', session('admin_code'))
            ->orderBy('event_date', 'asc')
            ->get();

        $selectedEvent = null;
        $participants = collect();

        if ($request->event_id) {
            $selectedEvent = Event::where('prodi_code', session('admin_code'))
                ->where('id', $request->event_id)
                ->first();

            if ($selectedEvent) {
                $participants = Registration::with('user')
                    ->where('event_id', $selectedEvent->id)
                    ->latest()
                    ->get();
            }
        }

        return view('admin.participants', compact(
            'events',
            'selectedEvent',
            'participants'
        ));
    }

    public function showParticipants(Event $event)
    {
    session([
        'role' => 'admin',
        'admin_code' => '70',
        'admin_prodi' => 'Informatika'
    ]);

    if ($event->prodi_code !== session('admin_code')) {
        abort(403);
    }

    $participants = Registration::with('user')
        ->where('event_id', $event->id)
        ->latest()
        ->get();

    return view('admin.participant-detail', compact(
        'event',
        'participants'
    ));
    }
}