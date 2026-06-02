<!DOCTYPE html>
<html>
<head>
    <title>Event Saya</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/user-event.css') }}">
</head>

<body class="bg-light">

<nav class="navbar bg-white shadow-sm">
    <div class="container">
        <a href="/events" class="navbar-brand fw-bold text-primary">SaweuMIPA</a>

        <form method="POST" action="/logout">
            @csrf
            <button class="btn btn-danger btn-sm">Logout</button>
        </form>
    </div>
</nav>

<div class="container py-5">

    <h2 class="fw-bold mb-4">Event Saya</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <table class="table align-middle">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Instansi</th>
                    <th>Event</th>
                    <th>Status</th>
                </tr>
                </thead>

                <tbody>

                @forelse ($registrations as $registration)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $registration->full_name }}</td>

                    <td>{{ $registration->institution }}</td>

                    <td>{{ $registration->event->title }}</td>

                    <td>
                        <span class="badge bg-success">
                            Terdaftar
                        </span>
                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="5"
                        class="text-center text-muted">

                        Kamu belum mendaftar event.

                    </td>
                </tr>

                @endforelse

                </tbody>
            </table>
        </div>
    </div>

</div>

</body>
</html>