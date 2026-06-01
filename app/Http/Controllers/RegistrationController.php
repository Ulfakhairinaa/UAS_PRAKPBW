<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Registration;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function store(Event $event)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $exists = Registration::where('user_id', Auth::id())
            ->where('event_id', $event->id)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Kamu sudah terdaftar pada event ini.');
        }

        Registration::create([
            'user_id' => Auth::id(),
            'event_id' => $event->id
        ]);

        return redirect('/my-events')->with('success', 'Berhasil mendaftar event.');
    }

    public function myEvents()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $registrations = Registration::with('event')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('user.my-events', compact('registrations'));
    }
}
