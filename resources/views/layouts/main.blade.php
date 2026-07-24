<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prodi Sistem Informasi - @yield('title')</title>
    <style>
        body { font-family: sans-serif; margin: 0; padding: 0; background-color: white; }
        .content-area { padding: 40px 10%; min-height: 250px; }
    </style>
</head>
<body>

    @include('partials.navbar')

    <div class="content-area">
        @yield('content')
    </div>

    @include('partials.footer')

</body>
</html>