<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-5">

            <h3 class="mb-3">Register User</h3>

            <form method="POST" action="/register">
                @csrf

                <input type="text" name="name" class="form-control mb-2" placeholder="Nama">

                <input type="email" name="email" class="form-control mb-2" placeholder="Email">

                <input type="password" name="password" class="form-control mb-2" placeholder="Password">

                <button class="btn btn-primary w-100">Register</button>
            </form>

            <p class="mt-3">
                Sudah punya akun? <a href="/login">Login</a>
            </p>

        </div>
    </div>

</div>

</body>
</html>