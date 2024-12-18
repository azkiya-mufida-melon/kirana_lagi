<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Hasil Evaluasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Detail Hasil Evaluasi</h1>

        <p><strong>Periode:</strong> {{ \Carbon\Carbon::parse($period->period_date)->format('d M Y') }}</p>
        <h3>Hasil Evaluasi:</h3>
        @if (is_array($period->results))
            <ul>
                @foreach ($period->results as $result)
                    <li>{{ $result['employee'] }}: <strong>{{ $result['score'] }}</strong></li>
                @endforeach
            </ul>
        @else
            <p>Tidak ada hasil evaluasi.</p>
        @endif

        <a href="{{ route('tpk.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
