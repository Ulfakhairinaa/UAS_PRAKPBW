<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Registration;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function create(Event $event)
    {
        if (!Auth::check()) {
            return redirect('/login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        $exists = Registration::where('user_id', Auth::id())
            ->where('event_id', $event->id)
            ->exists();

        if ($exists) {
            return redirect('/my-events')
                ->with('error', 'Kamu sudah terdaftar pada event ini.');
        }

        return view('user.register', compact('event'));
    }
    

    public function store(Request $request, Event $event)
    {
        if (!Auth::check()) {
            return redirect('/login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        $exists = Registration::where('user_id', Auth::id())
            ->where('event_id', $event->id)
            ->exists();

        if ($exists) {
            return back()
                ->with('error', 'Kamu sudah terdaftar pada event ini.');
        }

        $request->validate([
            'full_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:20',
            'institution' => 'required|max:255',
        ]);

        Registration::create([
            'user_id' => Auth::id(),
            'event_id' => $event->id,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'institution' => $request->institution,
        ]);

        return redirect('/my-events')
            ->with('success', 'Berhasil mendaftar event.');
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
