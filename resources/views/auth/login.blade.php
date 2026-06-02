<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Saweu MIPA Login</title>
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
            Sistem modern untuk event, registrasi, dan admin kampus.
        </div>
    </div>

    <!-- RIGHT -->
    <div class="right">

        <div class="card">

            <!-- TAB -->
            <div class="tab">
                <button id="tabUser" class="active" onclick="switchTab('user')">User</button>
                <button id="tabAdmin" onclick="switchTab('admin')">Admin</button>
            </div>

            <!-- INFO TEXT (FIXED) -->
            <p id="userInfo" class="info show">
                Masuk sebagai peserta event SaweuMIPA.
            </p>

            <p id="adminInfo" class="info hidden">
                Masuk sebagai admin prodi/BEM MIPA.
            </p>

            <!-- USER FORM -->
            <form id="userForm" class="form show" method="POST" action="/user-login">
                @csrf

                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>

                <button type="submit">Login as User</button>

                <p class="small">
                    Belum punya akun? <a href="/register">Register</a>
                </p>
            </form>

            <!-- ADMIN FORM -->
            <form id="adminForm" class="form hidden" method="POST" action="/admin-login">
                @csrf

                <select name="prodi_code" required>
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

                <input type="password" name="admin_password" placeholder="Password Admin" required>

                <button type="submit">Login as Admin</button>
            </form>

        </div>

    </div>

</div>

<!-- SCRIPT (FIXED STATE FULL CLEAN) -->
<script>
function switchTab(type) {

    const userForm = document.getElementById('userForm');
    const adminForm = document.getElementById('adminForm');

    const userInfo = document.getElementById('userInfo');
    const adminInfo = document.getElementById('adminInfo');

    const tabUser = document.getElementById('tabUser');
    const tabAdmin = document.getElementById('tabAdmin');

    if (type === 'user') {

        // FORM
        userForm.classList.add('show');
        userForm.classList.remove('hidden');

        adminForm.classList.add('hidden');
        adminForm.classList.remove('show');

        // INFO
        userInfo.classList.add('show');
        userInfo.classList.remove('hidden');

        adminInfo.classList.add('hidden');
        adminInfo.classList.remove('show');

        // TAB ACTIVE
        tabUser.classList.add('active');
        tabAdmin.classList.remove('active');

    } else {

        // FORM
        adminForm.classList.add('show');
        adminForm.classList.remove('hidden');

        userForm.classList.add('hidden');
        userForm.classList.remove('show');

        // INFO
        adminInfo.classList.add('show');
        adminInfo.classList.remove('hidden');

        userInfo.classList.add('hidden');
        userInfo.classList.remove('show');

        // TAB ACTIVE
        tabAdmin.classList.add('active');
        tabUser.classList.remove('active');
    }
}
</script>

</body>
</html>