<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - UNPAM Sistem Informasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url("{{ asset('images/login/unpam.jfif') }}");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }

        .login-wrapper {
            width: 100%;
            max-width: 420px;
            padding: 15px;
            z-index: 2;
        }
        
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            background-color: rgba(255, 255, 255, 0.95);
        }

        .card-header {
            background-color: #0d6efd;
            color: white;
            border-bottom: none;
        }

        .form-control {
            border-radius: 6px;
            padding: 10px 15px;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
            border-color: #86b7fe;
        }

        .btn-primary {
            background-color: #0d6efd;
            border: none;
            border-radius: 6px;
            padding: 10px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(13, 110, 253, 0.3);
        }
    </style>
</head>
<body>

    <div class="login-wrapper">
        <div class="card">
            <div class="card-header text-center py-4">
                <h4 class="mb-1 fw-bold">ADMIN LOGIN</h4>
                <p class="mb-0 small text-white-50">Sistem Informasi Portofolio</p>
            </div>
            
            <div class="card-body p-4">
                
                @if ($errors->any())
                <div class="alert alert-danger py-2 rounded-3 border-0">
                    <ul class="mb-0 ps-3" style="font-size: 0.85rem;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ url('/admin/login') }}">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="email" class="form-label text-secondary fw-semibold small mb-1">Email Address</label>
                        <input type="email" class="form-control bg-light border-0" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Masukkan email Anda">
                    </div>
                    
                    <div class="mb-4">
                        <label for="password" class="form-label text-secondary fw-semibold small mb-1">Password</label>
                        <input type="password" class="form-control bg-light border-0" id="password" name="password" required placeholder="Masukkan password">
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100 py-2 mb-4 fw-bold">LOGIN</button>
                    
                    <div class="text-center mt-2">
                        <span class="badge bg-light text-secondary border border-secondary-subtle px-3 py-2 fw-normal" style="font-size: 0.75rem;">
                            Demo: admin@example.com / password
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>