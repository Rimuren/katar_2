<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kasir Pintar')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Reset margin/padding */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
        }

        /* Variabel untuk warna agar mudah diubah */
        :root {
            --navbar-bg-color-light: #ffffff; /* Putih untuk navbar di mode terang */
            --sidebar-bg-color-light: #343a40;
            --footer-bg-color-light: #ffffff;
            --content-bg-color-light: #faf2e6; /* Cream untuk konten di mode terang */
            --card-bg-color-light: #ffffff; /* Putih untuk card di mode terang */
            --navbar-text-color-light: #333;
            --footer-text-color-light: #333;
            --sidebar-text-color-light: #ffffff;
            --sidebar-hover-color-light: #495057;
            --btn-primary-color-light: rgb(100, 138, 253);

            --navbar-bg-color-dark: #1f1f1f; /* Terang sedikit untuk navbar di mode gelap */
            --sidebar-bg-color-dark: #343a40;
            --footer-bg-color-dark: #121212;
            --content-bg-color-dark: #1c1c1c; /* Gelap untuk konten di mode gelap */
            --card-bg-color-dark: #2b2b2b; /* Card dengan warna abu-abu gelap di mode gelap */
            --navbar-text-color-dark: #e0e0e0;
            --footer-text-color-dark: #e0e0e0;
            --sidebar-text-color-dark: #e0e0e0;
            --sidebar-hover-color-dark: #495057;
            --btn-primary-color-dark: rgb(100, 138, 253);
            --hamburger-color-dark: #ffffff; /* Warna putih untuk hamburger di mode gelap */
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
        }

        /* Navbar styling */
        .navbar {
            background-color: var(--navbar-bg-color);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbar .navbar-brand,
        .navbar .nav-link {
            color: var(--navbar-text-color);
        }

        .navbar .navbar-brand:hover,
        .navbar .nav-link:hover {
            color: #ffffff;
        }

        /* Mengubah warna garis ikon hamburger */
        .navbar-toggler-icon {
            filter: invert(0%) sepia(100%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);
        }

        /* Mode Gelap - Ubah warna garis ikon hamburger */
        body.dark-mode .navbar-toggler-icon {
            filter: invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);
        }

        /* Sidebar styling */
        .offcanvas-start {
            width: 220px;
        }

        .offcanvas-body {
            background-color: #ffffff; /* Default light sidebar */
            padding-top: 20px;
        }

        .offcanvas-body .nav-link {
                    padding: 8px 12px;
                    font-size: 1rem;
                }

                /* Sidebar Header Styling */
        body.dark-mode .offcanvas-header {
            background-color: #1f1f1f;
            color: #ffffff;
        }

        body.dark-mode .offcanvas-header .btn-close {
            filter: invert(100%);
        }

        /* Light mode styling */
        body.light-mode .offcanvas-body {
            background-color: #ffffff;
        }

        body.light-mode .offcanvas-body .nav-link {
            color: #333333;
        }

        body.light-mode .offcanvas-body .nav-link:hover {
            background-color: #f1f1f1;
            color: #333333;
        }

        /* Dark mode styling */
        body.dark-mode .offcanvas-body {
            background-color: #1f1f1f;
        }

        body.dark-mode .offcanvas-body .nav-link {
            color: #ffffff;
        }

        body.dark-mode .offcanvas-body .nav-link:hover {
            background-color: #4e5057;
        }

        /* Konten utama */
        .content {
            background-color: var(--content-bg-color);
            padding: 20px;
            flex-grow: 1;
            min-height: 100vh;
            margin-top: 56px;
        }

        /*RGB text*/
        #artext {
            font-weight:bold; 
            font-size: 48px;
            background: linear-gradient(90deg,
            violet, indigo,
            blue, green, yellow,
            orange, red);
            background-size: 300%;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: animated 7s linear infinite;
            white-space: nowrap;
        }
        @keyframes animated {
            0% {background-position: 0% 50%;}

            100% {background-position: 100% 50%;}
        }

        /* Footer styling */
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

        /* Responsiveness */
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }

        @media (max-width: 768px) {
            .navbar {
                margin-bottom: 10px;
            }
        }

        /* Dark Mode Styling for Cards */
        body.dark-mode .card {
            background-color: var(--card-bg-color);
            color: #e0e0e0;
        }

        /* Dark Mode text in Content */
        body.dark-mode .content {
            color: #e0e0e0;
        }

        /* Tabel di Mode Gelap */
        body.dark-mode table {
            background-color: #2b2b2b;
            color: #e0e0e0;
            border-color: #444444;
        }

        /* Header Tabel */
        body.dark-mode th {
            background-color: #333333;
            color: #ffffff;
        }

        /* Sel Tabel */
        body.dark-mode td {
            background-color: #2b2b2b;
            color: #e0e0e0;
        }

        /* Baris yang dihover */
        body.dark-mode tr:hover {
            background-color: #444444;
        }

        /* Warna label untuk mode terang */
        label.form-label {
            color: #333;
        }

        /* Warna label untuk mode gelap */
        body.dark-mode label.form-label {
            color: #e0e0e0;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid">
            <!-- Hamburger Icon -->
            <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Logo Kasir Pintar and Laravel -->
            <a class="navbar-brand d-flex align-items-center ms-3" href="/dashboard" style="text-decoration: none;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Laravel.svg" alt="Laravel Logo" class="brand-logo" style="height: 30px; margin-right: 10px;">
                <span class="brand-text" style="color: var(--navbar-text-color);">Kasir Pintar</span>
            </a>

            <!-- Theme Toggle Button -->
            <button class="btn btn-link" id="themeToggle" aria-label="Toggle Theme">
                <i class="fas fa-moon" style="color: var(--navbar-text-color);"></i>
            </button>
        </div>
    </nav>

    <!-- Offcanvas Sidebar -->
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="list-unstyled">
                <li><a href="{{ url('/dashboard') }}" class="nav-link"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="{{ url('/staffs') }}" class="nav-link"><i class="fas fa-users"></i> Staff</a></li>
                <li><a href="{{ url('/shifts') }}" class="nav-link"><i class="fas fa-clock"></i> Shift</a></li>
                <li><a href="{{ url('/barangs') }}" class="nav-link"><i class="fas fa-cogs"></i> Barang</a></li>
                <li><a href="{{ url('/merks') }}" class="nav-link"><i class="fas fa-tag"></i> Merk</a></li>
                <li><a href="{{ url('/kategoris') }}" class="nav-link"><i class="fas fa-th-large"></i> Kategori</a></li>
                <li><a href="{{ url('/suppliers') }}" class="nav-link"><i class="fas fa-truck"></i> Supplier</a></li>
                <li><a href="{{ url('/cashdrawers') }}" class="nav-link"><i class="fas fa-cash-register"></i> Cashdrawer</a></li>
                <li><a href="{{ url('/opnames') }}" class="nav-link"><i class="fas fa-box"></i> Opname</a></li>
            </ul>
        </div>
    </div>

    <!-- Content -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Kasir Pintar. All rights reserved.</p>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mendapatkan elemen dan status tema
        const themeToggleButton = document.getElementById('themeToggle');
        const body = document.body;
    
        // Memeriksa preferensi tema dari localStorage saat halaman dimuat
        if (localStorage.getItem('dark-mode') === 'enabled') {
            body.classList.add('dark-mode'); // Aktifkan tema gelap jika diset di localStorage
        }
    
        // Fungsi untuk toggle tema dan simpan preferensi di localStorage
        themeToggleButton.addEventListener('click', function () {
            body.classList.toggle('dark-mode');
            
            // Simpan status tema ke localStorage
            if (body.classList.contains('dark-mode')) {
                localStorage.setItem('dark-mode', 'enabled');
            } else {
                localStorage.setItem('dark-mode', 'disabled');
            }
        });
    </script>
    

</body>

</html>
