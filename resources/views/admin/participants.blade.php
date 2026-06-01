<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Participants</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body>

<div class="sidebar">

    <h3 class="sidebar-title">SaweuMIPA</h3>

    <a href="/dashboard" class="menu-link">
        <i class="bi bi-grid"></i>
        Dashboard
    </a>

    <a href="/admin/events" class="menu-link">
        <i class="bi bi-calendar-event"></i>
        Event
    </a>

    <a href="/admin/participants" class="menu-link active">
        <i class="bi bi-people"></i>
        Participants
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
            <h2 class="dashboard-title">
                Participants
            </h2>

            <p class="dashboard-subtitle">
                Pilih event untuk melihat daftar peserta {{ session('admin_prodi') }}.
            </p>
        </div>
    </div>

    <div class="table-modern mb-4">
        <div class="p-4">
            <h4 class="fw-bold mb-3">Daftar Event</h4>

            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Event</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($events as $event)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->event_date }}</td>
                            <td>{{ $event->location }}</td>
                            <td>
                                <span class="badge-modern">
                                    {{ ucfirst($event->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="/admin/participants/{{ $event->id }}" 
                                class="btn-modern text-decoration-none">
                                    Lihat Peserta
                                </a>
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

    @if ($selectedEvent)
        <div class="table-modern">
            <div class="p-4">
                <h4 class="fw-bold mb-1">
                    Peserta: {{ $selectedEvent->title }}
                </h4>

                <p class="text-muted mb-4">
                    {{ $selectedEvent->event_date }} • {{ $selectedEvent->location }}
                </p>

                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Peserta</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($participants as $participant)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $participant->user->name }}</td>
                                <td>{{ $participant->user->email }}</td>
                                <td>
                                    <span class="badge-modern">
                                        Terdaftar
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">
                                    Belum ada peserta pada event ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endif

</div>

</body>
</html>