<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register SaweuMIPA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="card border-0 shadow-lg rounded-4" style="width: 430px;">
        <div class="card-body p-5">
            <h2 class="fw-bold mb-2">Register User</h2>
            <p class="text-muted mb-4">Buat akun peserta SaweuMIPA.</p>

            <form method="POST" action="/register">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control rounded-3" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control rounded-3" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control rounded-3" required>
                </div>

                <button class="btn btn-primary w-100 rounded-3 py-2">Register</button>
            </form>

            <p class="mt-3 mb-0">
                Sudah punya akun?
                <a href="/login">Login</a>
            </p>
        </div>
    </div>
</div>

</body>
</html>