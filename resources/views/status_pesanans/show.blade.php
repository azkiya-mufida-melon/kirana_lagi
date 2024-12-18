<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Status Pesanan - Kirana Coffee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>Detail Status Pesanan</h3>
                        <hr/>
                        <p><strong>ID Pesanan:</strong> {{ $statusPesanan->id_pesanan }}</p>
                        <p><strong>Nama Pemesan:</strong> {{ $statusPesanan->nama_pemesan }}</p>
                        <p><strong>Detail Pesanan:</strong> {{ $statusPesanan->detail_pesanan }}</p>
                        <p><strong>Status:</strong> {{ $statusPesanan->status }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
