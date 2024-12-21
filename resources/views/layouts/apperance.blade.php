<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kasir Pintar')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            --navbar-bg-color: rgb(255, 255, 255);
            --footer-bg-color: rgb(255, 255, 255);
            --content-bg-color: rgba(250, 242, 230);
            --navbar-text-color: #333;
            --footer-text-color: #333;
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
            color: #0056b3;
        }

        /* Konten utama */
        .content {
            background-color: var(--content-bg-color);
            padding: 20px;
            flex-grow: 1;
            min-height: 100vh; /* Membuat konten utama memenuhi tinggi layar */
        }

        /* Footer styling */
        footer {
            background-color: var(--footer-bg-color);
            text-align: center;
            padding: 15px;
            border-top: 1px solid #e9ecef;
            color: var(--footer-text-color);
        }

        footer a {
            color: #0056b3;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }
        
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid">
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="/home">Kasir Pintar</a>
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
                <li><a href="{{ url('/home') }}" class="nav-link">Dashboard</a></li>
                <li><a href="{{ url('/staffs') }}" class="nav-link">Staff</a></li>
                <li><a href="{{ url('/shifts') }}" class="nav-link">Shift</a></li>
                <li><a href="{{ url('/barangs') }}" class="nav-link">Barang</a></li>
                <li><a href="{{ url('/merks') }}" class="nav-link">Merk</a></li>
                <li><a href="{{ url('/kategoris') }}" class="nav-link">Kategori</a></li>
                <li><a href="{{ url('/suppliers') }}" class="nav-link">Supplier</a></li>
                <li><a href="{{ url('/cashdrawers') }}" class="nav-link">cashdrawer</a>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="container py-4">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; Katar 2024 | <a href="#">Privacy Policy</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
