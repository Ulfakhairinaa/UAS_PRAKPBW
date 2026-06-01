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

            <form>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control rounded-3">
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control rounded-3">
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

            <form>

                <div class="mb-3">
                    <label class="form-label">Kode Prodi</label>

                    <select class="form-control rounded-3">
                        <option>70 - Informatika</option>
                        <option>40 - Biologi</option>
                        <option>80 - Statistika</option>
                        <option>30 - Kimia</option>
                        <option>10 - Matematika</option>
                        <option>90 - Farmasi</option>
                        <option>50 - Manajemen Informatika</option>
                        <option>20 - Fisika</option>
                        <option>00 - BEM MIPA</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password Admin</label>

                    <input type="password" class="form-control rounded-3">
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