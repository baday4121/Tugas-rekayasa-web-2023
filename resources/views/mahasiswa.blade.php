<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px
        }
        .container {
            border: 1px solid #000;
            padding: 20px;
            width: 400px;

        }
        h1 {
            margin-top: 0;
            border-bottom: 1px solid #000;
            padding-bottom: 10px;
        }
        p { 
            margin: 8px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Halaman Mahasiswa</h1>
    <p> Selamat datang di halaman mahasiswa</p>
    <p><strong> Nama :</strong> {{ $nama }}</p>
    <p><strong> NIM :</strong> {{ $nim }}</p>
    <p><strong> Prodi :</strong> {{ $prodi }}</p>
</div>
    
</body>
</html>