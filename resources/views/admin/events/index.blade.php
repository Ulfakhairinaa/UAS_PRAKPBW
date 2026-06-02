<!DOCTYPE html>
<html>
<head>
    <title>Kelola Event</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">Kelola Event</h2>
            <p class="text-muted mb-0">Event untuk kode prodi: {{ session('admin_code') }}</p>
        </div>

        <a href="/admin/events/create" class="btn btn-primary rounded-3">
            + Tambah Event
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Poster</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($events as $event)
                        <tr>
                            <td>
                                @if ($event->poster)
                                    <img src="{{ asset('storage/' . $event->poster) }}" width="70" class="rounded-3">
                                @else
                                    <span class="text-muted">No poster</span>
                                @endif
                            </td>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->event_date }}</td>
                            <td>{{ $event->location }}</td>
                            <td>
                                <span class="badge bg-primary">
                                    {{ ucfirst($event->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="/admin/events/{{ $event->id }}/edit" class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                <form action="/admin/events/{{ $event->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus event ini?')">
                                        Hapus
                                    </button>
                                </form>
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

</div>

</body>
</html>