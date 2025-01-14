<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Daftar & Masuk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
        }

        :root {
            --navbar-bg-color-light: #ffffff;
            --footer-bg-color-light: #ffffff;
            --content-bg-color-light: #faf2e6;
            --card-bg-color-light: #ffffff;
            --navbar-text-color-light: #333;
            --footer-text-color-light: #333;
            --btn-primary-color-light: rgb(100, 138, 253);

            --navbar-bg-color-dark: #1f1f1f;
            --footer-bg-color-dark: #121212;
            --content-bg-color-dark: #1c1c1c;
            --card-bg-color-dark: #2b2b2b;
            --navbar-text-color-dark: #e0e0e0;
            --footer-text-color-dark: #e0e0e0;
            --btn-primary-color-dark: rgb(100, 138, 253);
        }

        body.dark-mode {
            --navbar-bg-color: var(--navbar-bg-color-dark);
            --navbar-text-color: var(--navbar-text-color-dark);
            --content-bg-color: var(--content-bg-color-dark);
            --footer-bg-color: var(--footer-bg-color-dark);
            --footer-text-color: var(--footer-text-color-dark);
            --card-bg-color: var(--card-bg-color-dark);
            --btn-primary-color: var(--btn-primary-color-dark);
        }

        body {
            --navbar-bg-color: var(--navbar-bg-color-light);
            --navbar-text-color: var(--navbar-text-color-light);
            --content-bg-color: var(--content-bg-color-light);
            --footer-bg-color: var(--footer-bg-color-light);
            --footer-text-color: var(--footer-text-color-light);
            --card-bg-color: var(--card-bg-color-light);
            --btn-primary-color: var(--btn-primary-color-light);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: var(--content-bg-color);
        }

        .navbar {
            background-color: var(--navbar-bg-color);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbar .navbar-brand, .navbar .nav-link {
            color: var(--navbar-text-color);
        }

        .navbar .navbar-brand:hover, .navbar .nav-link:hover {
            color: #ffffff;
        }

        .content {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .card {
            background-color: var(--card-bg-color);
            color: var(--navbar-text-color);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            width: 100%;
            max-width: 400px;
        }

        footer {
            background-color: var(--footer-bg-color);
            text-align: center;
            padding: 20px;
            border-top: 1px solid #e9ecef;
            color: var(--footer-text-color);
        }

        footer a {
            color: var(--btn-primary-color);
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center ms-3" href="{{ route('guests.home') }}" style="text-decoration: none;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Laravel.svg" alt="Laravel Logo" class="brand-logo" style="height: 30px; margin-right: 10px;">
                <span class="brand-text" style="color: var(--navbar-text-color);">Kasir Pintar</span>
            </a>            
            <div class="d-flex align-items-center">
                <button class="btn btn-link" id="themeToggle" aria-label="Toggle Theme">
                    <i class="fas fa-moon" style="color: var(--navbar-text-color);"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="content">
        <div>
            <div class="card" id="registerForm">
                <h3 class="text-center mb-4">Form Pendaftaran</h3>
                <form action="{{ route('guests.daftar.submit') }}" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Daftar</button>
                </form>
                <div class="text-center mt-3">
                    <a href="#" id="toLogin">Sudah punya akun? Masuk</a>
                </div>
            </div>

            <div class="card d-none" id="loginForm">
                <h3 class="text-center mb-4">Form Masuk</h3>
                <form action="{{ route('guests.masuk.submit') }}" method="post">
                    <div class="mb-3">
                        <label for="login_email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="login_email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="login_password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="login_password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Masuk</button>
                </form>
                <div class="text-center mt-3">
                    <a href="#" id="toRegister">Belum punya akun? Daftar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Kasir Pintar. All rights reserved. <a href="#">Privacy Policy</a></p>
    </footer>

    <script>
        const themeToggle = document.getElementById('themeToggle');
        const registerForm = document.getElementById('registerForm');
        const loginForm = document.getElementById('loginForm');
        const toLogin = document.getElementById('toLogin');
        const toRegister = document.getElementById('toRegister');

        themeToggle.addEventListener('click', function () {
            document.body.classList.toggle('dark-mode');
        });

        toLogin.addEventListener('click', function (e) {
            e.preventDefault();
            registerForm.classList.add('d-none');
            loginForm.classList.remove('d-none');
        });

        toRegister.addEventListener('click', function (e) {
            e.preventDefault();
            loginForm.classList.add('d-none');
            registerForm.classList.remove('d-none');
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

