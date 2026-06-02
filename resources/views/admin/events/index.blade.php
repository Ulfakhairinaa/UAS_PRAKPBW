<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Kelola Event</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/admin-event.css') }}">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="sidebar">
    <h3 class="sidebar-title">SaweuMIPA</h3>

    <a href="/dashboard" class="menu-link">
        <i class="bi bi-grid"></i> Dashboard
    </a>

    <a href="/admin/events" class="menu-link active">
        <i class="bi bi-calendar-event"></i> Event
    </a>

    <a href="/admin/participants" class="menu-link">
        <i class="bi bi-people"></i> Participants
    </a>

    <form method="POST" action="/logout">
        @csrf
        <button class="btn btn-danger w-100 mt-4 rounded-3">
            Logout
        </button>
    </form>
</div>

<div class="main">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="dashboard-title">Kelola Event</h2>
            <p class="dashboard-subtitle">
                Event untuk kode prodi: {{ session('admin_code') }}
            </p>
        </div>

        <a href="/admin/events/create" class="btn btn-primary-custom">
            + Tambah Event
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-modern">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Poster</th>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($events as $event)
                    <tr>

                        <td>
                            @if ($event->poster)
                                <img src="{{ asset('storage/' . $event->poster) }}"
                                     width="70"
                                     class="rounded-3">
                            @else
                                <span class="text-muted">
                                    No poster
                                </span>
                            @endif
                        </td>

                        <td>{{ $event->title }}</td>

                        <td>{{ $event->event_date }}</td>

                        <td>{{ $event->location }}</td>

                        <td>
                            <span class="badge-modern">
                                {{ ucfirst($event->status) }}
                            </span>
                        </td>

                        <td>
                            <a href="/admin/events/{{ $event->id }}/edit"
                               class="btn btn-sm btn-warning rounded-3">
                                Edit
                            </a>

                            <form action="/admin/events/{{ $event->id }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-danger rounded-3"
                                    onclick="return confirm('Hapus event ini?')">

                                    Hapus

                                </button>
                            </form>
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            Belum ada event.
                        </td>
                    </tr>

                @endforelse
            </tbody>
        </table>
    </div>

</div>

</body>
</html>