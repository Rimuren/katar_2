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
            --navbar-bg-color: rgb(255, 255, 255);
            --sidebar-bg-color: #343a40;
            --footer-bg-color: rgb(255, 255, 255);
            --content-bg-color: rgba(250, 242, 230);
            --navbar-text-color: #333;
            --footer-text-color: #333;
            --sidebar-text-color: #ffffff;
            --sidebar-hover-color: #495057;
            --btn-primary-color:rgb(156, 204, 255);
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
            color:rgb(255, 255, 255);
        }

        /* Sidebar styling */
        .offcanvas-start {
            width: 220px; /* Lebar sidebar yang lebih kecil */
        }

        .offcanvas-body {
            background-color: var(--sidebar-bg-color);
            padding-top: 20px;
        }

        .offcanvas-body .nav-link {
            color: var(--sidebar-text-color);
            padding: 8px 12px; /* Mengurangi padding agar sidebar lebih ramping */
            font-size: 1rem; /* Ukuran font sedikit lebih kecil */
        }

        .offcanvas-body .nav-link:hover {
            background-color: var(--sidebar-hover-color);
            color: #ffffff;
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

        /* Button icon */
        .btn i {
            margin-right: 5px;
        }

    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid">
            <button class="btn " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
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
                <li><a href="{{ url('/home') }}" class="nav-link"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="{{ url('/staffs') }}" class="nav-link"><i class="fas fa-users"></i> Staff</a></li>
                <li><a href="{{ url('/shifts') }}" class="nav-link"><i class="fas fa-clock"></i> Shift</a></li>
                <li><a href="{{ url('/barangs') }}" class="nav-link"><i class="fas fa-cogs"></i> Barang</a></li>
                <li><a href="{{ url('/merks') }}" class="nav-link"><i class="fas fa-tag"></i> Merk</a></li>
                <li><a href="{{ url('/kategoris') }}" class="nav-link"><i class="fas fa-th-large"></i> Kategori</a></li>
                <li><a href="{{ url('/suppliers') }}" class="nav-link"><i class="fas fa-truck"></i> Supplier</a></li>
                <li><a href="{{ url('/cashdrawers') }}" class="nav-link"><i class="fas fa-cash-register"></i> Cashdrawer</a></li>
                <li><a href="{{ url('/opnames') }}" class="nav-link"><i class="fas fa-search"></i> Opname</a></li>
                <li><a href="{{ url('/pelanggans') }}" class="nav-link"><i class="fas fa-person"></i> Pelanggan</a></li>
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
