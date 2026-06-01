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

        return view('dashboard', compact(
            'events',
            'status',
            'totalEvents',
            'totalParticipants',
            'upcomingCount',
            'ongoingCount',
            'doneCount'
        ));
    }

    public function participants()
    {
        session([
            'role' => 'admin',
            'admin_code' => '70',
            'admin_prodi' => 'Informatika'
        ]);
        $participants = Registration::with(['user', 'event'])
            ->whereHas('event', function ($query) {
                $query->where('prodi_code', session('admin_code'));
            })
            ->latest()
            ->get();

        return view('admin.participants', compact('participants'));
    }
}