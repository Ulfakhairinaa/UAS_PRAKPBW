<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Participant Detail</title>

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

</div>

<div class="main">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="dashboard-title">
                {{ $event->title }}
            </h2>

            <p class="dashboard-subtitle">
                Daftar peserta event
            </p>

        </div>

        <a href="/admin/participants"
           class="btn-modern text-decoration-none">
            Kembali
        </a>

    </div>

    <div class="table-modern">

        <div class="p-4">

            <table class="table align-middle">

                <thead>

                    <tr>
                        <th>#</th>
                        <th>Nama</th>
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

                            <td colspan="4"
                                class="text-center text-muted">

                                Belum ada peserta.

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