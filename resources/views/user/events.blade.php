<!DOCTYPE html>
<html>
<head>
    <title>Daftar Event SaweuMIPA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/user-event.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="/events">SaweuMIPA</a>

        <div>
            <a href="/my-events" class="btn btn-outline-primary btn-sm">Event Saya</a>

            <form method="POST" action="/logout" class="d-inline">
                @csrf
                <button class="btn btn-danger btn-sm">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="container py-5">

    <div class="hero-section">
        <h1 class="fw-bold">Temukan Event Fakultas MIPA</h1>
        <p class="text-muted mb-0">
            Ikuti seminar, workshop, pelatihan, webinar, lomba, dan kegiatan organisasi.
        </p>
    </div>

    <div class="row g-4">
        @forelse ($events as $event)
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 h-100">

                    @if ($event->poster)
                        <img src="{{ asset('storage/' . $event->poster) }}" class="card-img-top rounded-top-4" style="height: 190px; object-fit: cover;">
                    @endif

                    <div class="card-body p-4">
                        <span class="badge bg-primary mb-3">{{ ucfirst($event->status) }}</span>

                        <h5 class="fw-bold">{{ $event->title }}</h5>

                        <p class="text-muted mb-1">
                            Tanggal: {{ $event->event_date }}
                        </p>

                        <p class="text-muted">
                            Lokasi: {{ $event->location }}
                        </p>

                        <a href="/events/{{ $event->id }}" class="btn btn-primary rounded-3 w-100">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Belum ada event tersedia.</p>
        @endforelse
    </div>
</div>

</body>
</html>