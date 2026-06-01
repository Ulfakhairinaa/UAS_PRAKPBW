<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::where('prodi_code', session('admin_code'))
            ->orderBy('event_date', 'asc')
            ->get();

        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'event_date' => 'required|date',
            'location' => 'required',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required'
        ]);

        $posterPath = null;

        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters', 'public');
        }

        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'location' => $request->location,
            'poster' => $posterPath,
            'status' => $request->status,
            'prodi_code' => session('admin_code')
        ]);

        return redirect('/admin/events')->with('success', 'Event berhasil ditambahkan.');
    }

    public function edit(Event $event)
    {
        if ($event->prodi_code !== session('admin_code')) {
            abort(403);
        }

        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        if ($event->prodi_code !== session('admin_code')) {
            abort(403);
        }

        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'event_date' => 'required|date',
            'location' => 'required',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required'
        ]);

        $posterPath = $event->poster;

        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters', 'public');
        }

        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'location' => $request->location,
            'poster' => $posterPath,
            'status' => $request->status,
        ]);

        return redirect('/admin/events')->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy(Event $event)
    {
        if ($event->prodi_code !== session('admin_code')) {
            abort(403);
        }

        $event->delete();

        return redirect('/admin/events')->with('success', 'Event berhasil dihapus.');
    }
}
