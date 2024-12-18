<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perhitungan TPK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <!-- Judul Halaman -->
        <h1 class="mb-4 text-center">Hasil Perhitungan TPK</h1>

        <!-- Notifikasi Sukses -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Tombol Mulai Perhitungan -->
        <div class="mb-3 text-end">
            <a href="{{ route('tpk.calculate') }}" class="btn btn-primary">Mulai Perhitungan TPK</a>
        </div>

        <!-- Jika Data Kosong -->
        @if ($periods->isEmpty())
            <div class="alert alert-info text-center">
                Belum ada hasil evaluasi. Klik tombol "Mulai Perhitungan TPK" untuk memulai.
            </div>
        @else
            <!-- Tabel Data Evaluasi -->
            <table class="table table-bordered table-hover">
                <thead class="table-dark text-center">
                    <tr>
                        <th>#</th>
                        <th>Periode</th>
                        <th>Hasil Evaluasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($periods as $index => $period)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($period->period_date)->format('d M Y') }}
                            </td>
                            <td>
                                <!-- Menampilkan Hasil Evaluasi -->
                                @if (is_array($period->results))
                                    <ul>
                                        @foreach ($period->results as $result)
                                            <li>{{ $result['employee'] }}: <strong>{{ $result['score'] }}</strong></li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>Tidak ada data hasil evaluasi.</p>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('tpk.show', $period->id) }}" class="btn btn-info btn-sm">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
