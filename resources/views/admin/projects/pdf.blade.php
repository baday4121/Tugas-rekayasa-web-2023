<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Project</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 12px;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .header {
            text-align: center;
            border-bottom: 3px solid #0d6efd;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }
        .header h2 {
            margin: 0;
            color: #0d6efd;
            font-size: 24px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .header p {
            margin: 5px 0 0;
            color: #555;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px 10px;
            vertical-align: middle;
        }
        th {
            background-color: #0d6efd;
            color: white;
            font-weight: bold;
            text-align: center;
            text-transform: uppercase;
            font-size: 11px;
        }
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        .img-container {
            text-align: center;
        }
        .img-container img {
            width: 80px;
            height: auto;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .no-image {
            color: #999;
            font-style: italic;
            font-size: 11px;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 10px;
            color: #777;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>Laporan Data Project Portofolio</h2>
        <p>Rekayasa Web - Sistem Informasi</p>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="15%">Gambar</th>
                <th width="20%">Nama Project</th>
                <th width="15%">Teknologi</th>
                <th width="32%">Deskripsi</th>
                <th width="13%">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $index => $project)
            <tr>
                <td style="text-align: center;">{{ $index + 1 }}</td>
                
                <td class="img-container">
                    @if($project->image)
                        <img src="{{ public_path('images/projects/' . $project->image) }}" alt="Gambar Project">
                    @else
                        <span class="no-image">No Image</span>
                    @endif
                </td>
                
                <td><strong>{{ $project->title }}</strong></td>
                <td>{{ $project->technology }}</td>
                <td style="text-align: justify;">{{ $project->description }}</td>
                <td style="text-align: center; font-weight: bold; color: {{ $project->status == 'Selesai' ? '#198754' : '#dc3545' }};">
                    {{ $project->status }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada: {{ \Carbon\Carbon::now()->translatedFormat('d F Y H:i') }} WIB
    </div>

</body>
</html>