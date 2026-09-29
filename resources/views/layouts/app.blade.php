<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Studio Musik</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #030712;
            color: #f8fafc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        #sidebar {
            min-height: 100vh;
            background-color: #0b132b !important;
            border-right: 1px solid #1e3a8a;
            box-shadow: 5px 0 15px rgba(30, 58, 138, 0.2);
        }
        #sidebar .brand {
            font-size: 1.25rem;
            font-weight: bold;
            color: #38bdf8;
            padding: 1.5rem 1rem;
            border-bottom: 1px solid #1e3a8a;
            text-align: center;
            text-shadow: 0 0 10px rgba(56, 189, 248, 0.5);
        }
        #sidebar .nav-link {
            color: #94a3b8;
            padding: 0.85rem 1.25rem;
            margin: 0.25rem 0.75rem;
            border-radius: 0.375rem;
            transition: all 0.3s ease;
        }
        #sidebar .nav-link:hover, #sidebar .nav-link.active {
            color: #ffffff;
            background-color: #1e3a8a;
            box-shadow: 0 0 10px rgba(59, 130, 246, 0.5);
        }
        /* Card & Form Styling */
        .card {
            background-color: #0b132b !important;
            border: 1px solid #1e3a8a;
            box-shadow: 0 0 15px rgba(30, 58, 138, 0.4);
        }
        .btn-primary {
            background-color: #3b82f6;
            border-color: #3b82f6;
            box-shadow: 0 0 10px rgba(59, 130, 246, 0.5);
        }
        .btn-primary:hover {
            background-color: #2563eb;
            border-color: #2563eb;
            box-shadow: 0 0 15px rgba(37, 99, 235, 0.8);
        }
        .form-control, .form-select {
            background-color: #0f172a !important;
            color: #ffffff !important;
            border-color: #1e3a8a !important;
        }
        .form-control:focus, .form-select:focus {
            border-color: #3b82f6 !important;
            box-shadow: 0 0 10px rgba(59, 130, 246, 0.5) !important;
        }
    </style>
</head>
<body>

    <div class="container-fluid">
        <div class="row">
 
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block px-0">
                <div class="brand">
                    Kano Studio
                </div>
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') ?? '#' }}">
                                 Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('studios.*') ? 'active' : '' }}" href="{{ route('studios.index') ?? '#' }}">
                                Kelola Studio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('bookings.*') ? 'active' : '' }}" href="{{ route('bookings.create') }}">
                                 Buat Booking
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

        
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>