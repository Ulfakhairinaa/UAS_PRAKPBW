<!DOCTYPE html>
<html>
<head>
    <title>Detail Event</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/user-event.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar bg-white shadow-sm">
    <div class="container">
        <a href="/events" class="navbar-brand fw-bold text-primary">SaweuMIPA</a>
        <a href="/my-events" class="nav-link-custom">Event Saya</a>
    </div>
</nav>

<div class="container py-5">

    @if(session('error'))
        <div class="alert alert-danger mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="detail-layout">

        <!-- KIRI -->
        <div>

            @if ($event->poster)
                <img
                    src="{{ asset('storage/' . $event->poster) }}"
                    class="detail-poster rounded-4 mb-4">
            @endif

            <div class="card border-0">
                <div class="card-body p-4">

                    <span class="badge bg-primary mb-3">
                        {{ ucfirst($event->status) }}
                    </span>

                    <h1 class="detail-title mb-3">
                        {{ $event->title }}
                    </h1>

                    <p class="text-muted">
                        {{ $event->description }}
                    </p>

                </div>
            </div>

        </div>

        <!-- KANAN -->
        <div>

            <div class="event-info-box">

                <h4 class="fw-bold mb-4">
                    Informasi Event
                </h4>

                <div class="detail-info">
                    <strong>Tanggal Event</strong><br>
                    {{ $event->event_date }}
                </div>

                <div class="detail-info">
                    <strong>Lokasi</strong><br>
                    {{ $event->location }}
                </div>

                <div class="detail-info">
                    <strong>Status</strong><br>
                    {{ ucfirst($event->status) }}
                </div>

                <a href="/events/{{ $event->id }}/register"
                   class="btn btn-primary w-100 mt-3">

                    Daftar Event

                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>