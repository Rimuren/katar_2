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
            height: auto;
            font-family: Arial, sans-serif;
        }

        /* Variabel untuk warna agar mudah diubah */
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
        }

        .card {
            background-color: var(--card-bg-color);
            color: var(--card-text-color);
        }

        body.dark-mode .card {
            background-color: var(--card-bg-color-dark);
            color: #ffffff; 
        }

        body .card {
            background-color: var(--card-bg-color-light);
            color: #333; 
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

        /* Konten utama */
        .content {
            background-color: var(--content-bg-color);
            padding-bottom: 50px;
            flex-grow: 1;
            min-height: calc(100vh - 70px); 
        }

        .card {
            margin-bottom: 20px;
        }

        .card-body {
            padding: 15px;
        }

        /* Styling carousel control buttons */
.carousel-control-prev,
.carousel-control-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;  /* Ensure the button is above other content */
    width: 80px;  /* Adjust size as needed */
    height: 80px; /* Adjust size as needed */
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}

/* Remove background and make the icon itself visible */
.carousel-control-prev-icon, 
.carousel-control-next-icon {
    background-color: transparent;  /* Make the background transparent */
    border-radius: 50%;
    width: 40px;   /* Increased icon size */
    height: 40px;  /* Increased icon size */
    background-size: contain;  /* Ensures the icon remains sharp */
    background-position: center;  /* Centers the icon */
}

/* Adjusting the position of the previous and next buttons */
.carousel-control-prev {
    left: 10px;   /* Move the previous arrow closer to the edge */
}

.carousel-control-next {
    right: 10px;  /* Move the next arrow closer to the edge */
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

        .container {
            width: 100%;
            max-width: 1200px;
            margin-bottom: 20px;
            padding: 0 15px;
        }

        @media (max-width: 768px) {
            .navbar {
                margin-bottom: 10px;
            }

            .card {
                margin-bottom: 20px;
            }

            .card-body {
                padding: 20px;
            }

            .container {
                margin-bottom: 30px;
            }

            .carousel-item img {
                width: 100%;  
            }
        }

        #themeToggle i {
            color: var(--navbar-text-color);
        }

        body.dark-mode #themeToggle i {
            color: var(--navbar-text-color-dark);
        }

    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid">
            <!-- Logo Kasir Pintar and Laravel -->
            <a class="navbar-brand d-flex align-items-center ms-3" href="#" onclick="location.reload()" style="text-decoration: none;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Laravel.svg" alt="Laravel Logo" class="brand-logo" style="height: 30px; margin-right: 10px;">
                <span class="brand-text" style="color: var(--navbar-text-color);">Kasir Pintar</span>
            </a>

            <div class="d-flex align-items-center">
            
                <!-- Theme Toggle Button -->
                <button class="btn btn-link" id="themeToggle" aria-label="Toggle Theme">
                    <i class="fas fa-moon" style="color: var(--navbar-text-color);"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="content">
        <div class="container-fluid py-4">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Kasir Pintar. All rights reserved. <a href="#">Privacy Policy</a></p>
    </footer>

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

