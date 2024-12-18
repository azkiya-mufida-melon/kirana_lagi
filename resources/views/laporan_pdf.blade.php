<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data</title>
</head>
<body>
    <h1>Laporan Data</h1>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporans as $laporan)
            <tr>
                <td>{{ $laporan->id }}</td>
                <td>{{ $laporan->judul }}</td>
                <td>{{ $laporan->deskripsi }}</td>
                <td>{{ $laporan->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
