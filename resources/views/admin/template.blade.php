<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Web Portofolio - Universitas Pamulang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    @yield('styles')

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            background-color: #0d6efd;
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }
        .sidebar {
            min-height: calc(100vh - 70px);
            background-color: #212529;
            color: #fff;
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,.75);
            padding: 12px 20px;
            border-radius: 4px;
            margin: 4px 10px;
            transition: all 0.2s ease-in-out;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.1);
        }
        .sidebar-heading {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: .1rem;
            color: rgba(255,255,255,.5);
            padding: 15px 20px 5px 20px;
        }
        .main-content {
            padding: 30px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar px-3 py-2">
        <div class="container-fluid">

            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/admin') }}">
                <img src="{{ asset('images/logo-unpam.png') }}" alt="Logo UNPAM" height="40" class="d-inline-block align-text-top">
                <div class="d-flex flex-column text-white">
                    <span style="font-size: 0.9rem; font-weight: 700; line-height: 1.1;">UNIVERSITAS PAMULANG</span>
                    <span style="font-size: 0.75rem; letter-spacing: 0.5px;">SISTEM INFORMASI</span>
                </div>
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav align-items-lg-center gap-2 mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white px-3 py-1" href="{{ url('/admin') }}">Dashboard</a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white fw-medium" href="#" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="navbarDropdownUser">
                            <li>
                                <span class="dropdown-item-text text-muted small px-3">
                                    {{ Auth::user()->email }}
                                </span>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('admin.logout') }}" method="POST" class="m-0">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger fw-medium" onclick="return confirm('Yakin ingin keluar dari halaman admin?');">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse px-0">
                <div class="position-sticky pt-3">
                    <div class="sidebar-heading">Admin Menu</div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/home*') || request()->is('admin') ? 'active' : '' }}" href="{{ url('/admin') }}">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/projects*') ? 'active' : '' }}" href="{{ url('/admin/projects') }}">
                                Data Project
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}" href="{{ url('/admin/users') }}">
                                Data Users
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @yield('scripts')
</body>
</html>