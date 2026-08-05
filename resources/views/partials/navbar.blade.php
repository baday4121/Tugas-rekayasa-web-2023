<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="{{ url('/') }}">MyPortfolio -  Rekayasa Web</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="{{ url('/about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('projects*') && !Request::is('admin*') ? 'active' : '' }}" href="{{ url('/projects') }}">Projects</a>
                </li>
                <li class="nav-item">
                    @if(Auth::check())
                        <a class="nav-link {{ Request::is('admin*') ? 'active' : '' }} text-primary fw-medium" href="{{ url('/admin') }}">Admin</a>
                    @else
                        <a class="nav-link" href="{{ url('/admin/login') }}">Admin</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>