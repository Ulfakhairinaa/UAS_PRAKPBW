<!DOCTYPE html>
<html>
<head>
    <title>Detail Event</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/user-event.css') }}">
</head>

<body class="bg-light">

<nav class="navbar bg-white shadow-sm">
    <div class="container">
        <a href="/events" class="navbar-brand fw-bold text-primary">SaweuMIPA</a>
        <a href="/my-events" class="btn btn-outline-primary btn-sm">Event Saya</a>
    </div>
</nav>

<div class="container py-5">
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

        @if ($event->poster)
            <img src="{{ asset('storage/' . $event->poster) }}" style="height: 360px; object-fit: cover;">
        @endif

        <div class="card-body p-5">
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <span class="badge bg-primary mb-3">{{ ucfirst($event->status) }}</span>

            <h1 class="fw-bold">{{ $event->title }}</h1>

            <p class="text-muted">
                {{ $event->description }}
            </p>

            <p><strong>Tanggal:</strong> {{ $event->event_date }}</p>
            <p><strong>Lokasi:</strong> {{ $event->location }}</p>

            <a href="/events/{{ $event->id }}/register"
                class="btn btn-primary rounded-3 px-4">
                Daftar Event
            </a>
        </div>
    </div>
</div>

</body>
</html>