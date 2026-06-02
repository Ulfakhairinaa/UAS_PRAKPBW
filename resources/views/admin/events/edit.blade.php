<!DOCTYPE html>
<html>
<head>
    <title>Edit Event</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/admin-event.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-5">
            <h2 class="fw-bold mb-4">Edit Event</h2>

            <form method="POST" action="/admin/events/{{ $event->id }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Judul Event</label>
                    <input type="text" name="title" value="{{ $event->title }}" class="form-control rounded-3" required>
                </div>

                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="description" class="form-control rounded-3" rows="4">{{ $event->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Tanggal Event</label>
                    <input type="date" name="event_date" value="{{ $event->event_date }}" class="form-control rounded-3" required>
                </div>

                <div class="mb-3">
                    <label>Lokasi</label>
                    <input type="text" name="location" value="{{ $event->location }}" class="form-control rounded-3" required>
                </div>

                <div class="mb-3">
                    <label>Poster Baru</label>
                    <input type="file" name="poster" class="form-control rounded-3">

                    @if ($event->poster)
                        <img src="{{ asset('storage/' . $event->poster) }}" width="120" class="rounded-3 mt-3">
                    @endif
                </div>

                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control rounded-3" required>
                        <option value="upcoming" {{ $event->status == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                        <option value="ongoing" {{ $event->status == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                        <option value="done" {{ $event->status == 'done' ? 'selected' : '' }}>Done</option>
                    </select>
                </div>

                <button class="btn btn-primary rounded-3">Update Event</button>
                <a href="/admin/events" class="btn btn-secondary rounded-3">Kembali</a>
            </form>
        </div>
    </div>

</div>

</body>
</html>


