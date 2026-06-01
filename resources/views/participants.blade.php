<!DOCTYPE html>
<html>
<head>
    <title>Participants</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold">Participants</h2>

            <p class="text-muted">
                Data peserta event {{ session('admin_prodi') }}
            </p>
        </div>

        <a href="/dashboard" class="btn btn-primary rounded-3">
            Dashboard
        </a>

    </div>

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <table class="table align-middle">

                <thead>

                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Event</th>
                        <th>Status</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse ($participants as $participant)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $participant->user->name }}</td>

                            <td>{{ $participant->user->email }}</td>

                            <td>{{ $participant->event->title }}</td>

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