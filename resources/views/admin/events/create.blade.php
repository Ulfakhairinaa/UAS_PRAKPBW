<!DOCTYPE html>
<html>
<head>
    <title>Tambah Event</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-5">
            <h2 class="fw-bold mb-4">Tambah Event</h2>

            <form method="POST" action="/admin/events" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>Judul Event</label>
                    <input type="text" name="title" class="form-control rounded-3" required>
                </div>

                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="description" class="form-control rounded-3" rows="4"></textarea>
                </div>

                <div class="mb-3">
                    <label>Tanggal Event</label>
                    <input type="date" name="event_date" class="form-control rounded-3" required>
                </div>

                <div class="mb-3">
                    <label>Lokasi</label>
                    <input type="text" name="location" class="form-control rounded-3" required>
                </div>

                <div class="mb-3">
                    <label>Poster</label>
                    <input type="file" name="poster" class="form-control rounded-3">
                </div>

                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control rounded-3" required>
                        <option value="upcoming">Upcoming</option>
                        <option value="ongoing">Ongoing</option>
                        <option value="done">Done</option>
                    </select>
                </div>

                <button class="btn btn-primary rounded-3">Simpan Event</button>
                <a href="/admin/events" class="btn btn-secondary rounded-3">Kembali</a>
            </form>
        </div>
    </div>

</div>

</body>
</html>
