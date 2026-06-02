<!DOCTYPE html>
<html>
<head>
    <title>Event Saya</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/user-event.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar bg-white shadow-sm">
    <div class="container">

        <a href="/events" class="navbar-brand fw-bold text-primary">
            SaweuMIPA
        </a>

        <form method="POST" action="/logout">
            @csrf
            <button class="btn btn-danger btn-sm">
                Logout
            </button>
        </form>

    </div>
</nav>

<div class="container py-5">

    <h2 class="fw-bold mb-4">
        Event Saya
    </h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- EVENT TERDEKAT --}}

    @php

        $upcomingRegistration = $registrations
            ->filter(function ($registration) {

                return \Carbon\Carbon::parse(
                    $registration->event->event_date
                )->isFuture();

            })
            ->sortBy(function ($registration) {

                return $registration->event->event_date;

            })
            ->first();

    @endphp

    @if($upcomingRegistration)

        @php

            $eventDate = \Carbon\Carbon::parse(
                $upcomingRegistration->event->event_date
            );

            $daysLeft = now()
                ->startOfDay()
                ->diffInDays(
                    $eventDate->copy()->startOfDay(),
                    false
                );

        @endphp

        <div class="countdown-box mb-4">

            <div class="row align-items-center">

                <div class="col-md-4 text-center">

                    <h1 class="count-number">
                        {{ $daysLeft }}
                    </h1>

                    <p class="mb-0">
                        Hari Menuju
                    </p>

                </div>

                <div class="col-md-8">

                    <h3 class="fw-bold">
                        {{ $upcomingRegistration->event->title }}
                    </h3>

                    <p class="mb-1">
                        📅 {{ $eventDate->format('d M Y') }}
                    </p>

                    <p class="mb-0">
                        Event terdekat yang sudah kamu daftarkan.
                    </p>

                </div>

            </div>

        </div>

    @endif

    {{-- DAFTAR EVENT SAYA --}}

    <div class="row">

        @forelse($registrations as $registration)

            @php

                $eventDate = \Carbon\Carbon::parse(
                    $registration->event->event_date
                );

                $daysLeft = now()
                    ->startOfDay()
                    ->diffInDays(
                        $eventDate->copy()->startOfDay(),
                        false
                    );

            @endphp

            <div class="col-md-6 mb-4">

                <div class="my-event-card">

                    <div class="d-flex justify-content-between align-items-start">

                        <div>

                            <h4 class="my-event-title">
                                {{ $registration->event->title }}
                            </h4>

                            <p class="text-muted mb-2">
                                {{ $registration->institution }}
                            </p>

                        </div>

                        <span class="badge bg-success">
                            Terdaftar
                        </span>

                    </div>

                    <hr>

                    <p class="mb-2">
                        📅 {{ $eventDate->format('d M Y') }}
                    </p>

                    <p class="mb-2">
                        📍 {{ $registration->event->location }}
                    </p>

                    <p class="mb-3">
                        👤 {{ $registration->full_name }}
                    </p>

                    @if($daysLeft > 0)

                        <div class="countdown-small">
                            ⏳ {{ $daysLeft }} Hari Lagi
                        </div>

                    @elseif($daysLeft == 0)

                        <div class="countdown-today">
                            🎉 Hari Ini
                        </div>

                    @else

                        <div class="countdown-finished">
                            ✔ Event Selesai
                        </div>

                    @endif

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body text-center py-5">

                        <h5 class="mb-2">
                            Belum Ada Event
                        </h5>

                        <p class="text-muted mb-0">
                            Kamu belum mendaftar event apa pun.
                        </p>

                    </div>

                </div>

            </div>

        @endforelse

    </div>

</div>

</body>
</html>