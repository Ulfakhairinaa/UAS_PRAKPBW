<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Event</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/events.css') }}">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card shadow border-0 rounded-4">

                <div class="card-body p-5">

                    <h2 class="fw-bold mb-4">
                        Form Pendaftaran Event
                    </h2>

                    <p class="text-muted mb-4">
                        {{ $event->title }}
                    </p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form method="POST"
                          action="/events/{{ $event->id }}/register">

                        @csrf

                        <div class="mb-3">
                            <label>Nama Lengkap</label>

                            <input
                                type="text"
                                name="full_name"
                                class="form-control"
                                required>
                        </div>

                        <div class="mb-3">
                            <label>Email</label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                required>
                        </div>

                        <div class="mb-3">
                            <label>Nomor HP</label>

                            <input
                                type="text"
                                name="phone"
                                class="form-control"
                                required>
                        </div>

                        <div class="mb-4">
                            <label>Instansi</label>

                            <input
                                type="text"
                                name="institution"
                                class="form-control"
                                required>
                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary w-100">

                            Daftar Event

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>