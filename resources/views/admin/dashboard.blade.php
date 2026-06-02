<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body>

<div class="sidebar">
    <h3 class="sidebar-title">SaweuMIPA</h3>

    <a href="/dashboard" class="menu-link active">
        <i class="bi bi-grid"></i> Dashboard
    </a>

    <a href="/admin/events" class="menu-link">
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

    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="dashboard-title">
                Dashboard {{ session('admin_prodi') }}
            </h2>
            <p class="dashboard-subtitle">
                Kelola event prodi dengan mudah.
            </p>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card-modern">
                <div class="card-label">Total Event</div>
                <div class="card-value">{{ $totalEvents }}</div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-modern">
                <div class="card-label">Participants</div>
                <div class="card-value">{{ $totalParticipants }}</div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="card-modern">
                <div class="card-label">Upcoming</div>
                <div class="card-value">{{ $upcomingCount }}</div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="card-modern">
                <div class="card-label">Ongoing</div>
                <div class="card-value">{{ $ongoingCount }}</div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="card-modern">
                <div class="card-label">Done</div>
                <div class="card-value">{{ $doneCount }}</div>
            </div>
        </div>
    </div>

    <div class="upcoming-events-section mb-4">

        <div class="section-title-row">
            <div>
                <h4 class="section-title">
                    <i class="bi bi-calendar-event"></i>
                    Upcoming Events
                </h4>
                <p class="section-subtitle">Event terdekat yang akan datang</p>
            </div>
        </div>

        <div id="eventCountdownCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3500" data-bs-pause="hover">

            <div class="carousel-inner">

                @forelse($upcomingEvents as $index => $event)

                    @php
                        $daysLeft = now()->startOfDay()->diffInDays(\Carbon\Carbon::parse($event->event_date)->startOfDay(), false);
                    @endphp

                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <div class="event-countdown-card">

                            <div class="event-countdown-icon">
                                <i class="bi bi-calendar-event"></i>
                            </div>

                            <div class="event-countdown-content">

                                <div class="countdown-text">
                                    <span class="countdown-number">{{ $daysLeft }}</span>
                                    <span class="countdown-label">Hari Menuju</span>
                                </div>

                                <h2 class="event-countdown-title">
                                    {{ $event->title }}
                                </h2>

                                <div class="event-countdown-date">
                                    <i class="bi bi-calendar3"></i>
                                    {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}
                                </div>

                            </div>

                        </div>
                    </div>

                @empty

                    <div class="carousel-item active">
                        <div class="event-countdown-card empty-countdown">
                            <h2>Tidak ada upcoming event</h2>
                            <p>Belum ada event terdekat untuk ditampilkan.</p>
                        </div>
                    </div>

                @endforelse

            </div>

            <button class="carousel-control-prev" type="button"
                data-bs-target="#eventCountdownCarousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next" type="button"
                data-bs-target="#eventCountdownCarousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>

        </div>

    </div>


    <div class="card-modern">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">Daftar Event</h4>

            <form method="GET" action="/dashboard">
                <select name="status" class="select-modern" onchange="this.form.submit()">
                    <option value="upcoming" {{ $status == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                    <option value="ongoing" {{ $status == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                    <option value="done" {{ $status == 'done' ? 'selected' : '' }}>Done</option>
                </select>
            </form>
        </div>

        @if ($events->count() > 0)
            <div class="row g-4">
                @foreach ($events as $event)
                    <div class="col-md-6">
                        <div class="event-box">

                            @if ($event->poster)
                                <img src="{{ asset('storage/' . $event->poster) }}" class="event-image">
                            @endif

                            <div class="event-content">
                                <span class="badge-modern">
                                    {{ ucfirst($event->status) }}
                                </span>

                                <h5 class="event-title">
                                    {{ $event->title }}
                                </h5>

                                <p class="event-date">
                                    <i class="bi bi-calendar3 me-2"></i>
                                    {{ $event->event_date }}
                                </p>

                                <p class="event-location">
                                    <i class="bi bi-geo-alt me-2"></i>
                                    {{ $event->location }}
                                </p>

                                <a href="#" class="btn-modern w-100 d-block text-center text-decoration-none">
                                    Lihat Detail Event
                                </a>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-muted">
                Belum ada event pada status ini.
            </p>
        @endif
    </div>

</div>

</body>
</html>