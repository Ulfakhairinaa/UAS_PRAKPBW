<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <h1 class="mb-4">Dashboard Admin SaweuMIPA</h1>

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Event</h5>
                        <h2>{{ $totalEvents }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Participants</h5>
                        <h2>{{ $totalParticipants }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Upcoming Event</h5>

                @if ($upcomingEvent)
                    <p><strong>Nama Event:</strong> {{ $upcomingEvent->title }}</p>
                    <p><strong>Tanggal:</strong> {{ $upcomingEvent->event_date }}</p>
                    <p><strong>Lokasi:</strong> {{ $upcomingEvent->location }}</p>
                @else
                    <p>Belum ada event terdekat.</p>
                @endif
            </div>
        </div>
    </div>

</body>
</html>