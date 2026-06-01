<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login SaweuMIPA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container min-vh-100 d-flex align-items-center">
    <div class="row w-100 shadow-lg rounded-4 overflow-hidden bg-white">

        <div class="col-md-6 p-5">
            <h2 class="fw-bold mb-2">Login User</h2>
            <p class="text-muted mb-4">Masuk sebagai peserta event SaweuMIPA.</p>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form method="POST" action="/user-login">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control rounded-3" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control rounded-3" required>
                </div>

                <button class="btn btn-primary w-100 rounded-3 py-2">
                    Login User
                </button>
            </form>

            <p class="mt-3 mb-0">
                Belum punya akun?
                <a href="/register">Register</a>
            </p>
        </div>

        <div class="col-md-6 p-5 text-white" style="background: linear-gradient(135deg, #4f46e5, #2563eb);">

            <h2 class="fw-bold mb-2">Login Admin</h2>

            <p class="mb-4">
                Masuk sebagai admin prodi/BEM MIPA.
            </p>

            <form method="POST" action="/admin-login">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Kode Prodi</label>

                    <select name="prodi_code" class="form-control rounded-3" required>
                        <option value="">Pilih Kode Prodi</option>
                        <option value="70">70 - Informatika</option>
                        <option value="40">40 - Biologi</option>
                        <option value="80">80 - Statistika</option>
                        <option value="30">30 - Kimia</option>
                        <option value="10">10 - Matematika</option>
                        <option value="90">90 - Farmasi</option>
                        <option value="50">50 - Manajemen Informatika</option>
                        <option value="20">20 - Fisika</option>
                        <option value="00">00 - BEM MIPA</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password Admin</label>

                    <input type="password"
                           name="admin_password"
                           class="form-control rounded-3"
                           required>
                </div>

                <button class="btn btn-light w-100 rounded-3 py-2 fw-semibold">
                    Login Admin
                </button>

            </form>

        </div>

    </div>
</div>

</body>
</html>