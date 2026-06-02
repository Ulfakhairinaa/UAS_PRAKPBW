<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Saweu MIPA Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/css/auth.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>

<div class="page">

    <!-- LEFT -->
    <div class="left">
        <div class="brand">SAWEU MIPA</div>
        <div class="desc">Event Management System Fakultas MIPA</div>

        <div class="highlight">
            Daftar akun untuk mengikuti event, registrasi kegiatan, dan akses sistem SaweuMIPA.
        </div>
    </div>

    <!-- RIGHT -->
    <div class="right">

        <div class="card">

            <div class="brand" style="font-size:24px; margin-bottom:5px;">
                REGISTER
            </div>

            <div class="desc" style="margin-bottom:15px;">
                Buat akun peserta SaweuMIPA
            </div>

            <form method="POST" action="/register">
                @csrf

                <div class="form-group">
                    <input type="text" name="name" placeholder="Nama Lengkap" required>
                </div>

                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>

                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>

                <button type="submit" class="btn-submit">Create Account</button>
            </form>

            <p class="small">
                Sudah punya akun? <a href="/login">Login</a>
            </p>

        </div>

    </div>

</div>

</body>
</html>