<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Status Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <!-- Form Edit Status Pesanan -->
                        <form action="{{ route('status_pesanans.update', $statusPesanan->id_status) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- ID Pesanan -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">ID Pesanan</label>
                                <input type="number" class="form-control @error('id_pesanan') is-invalid @enderror"
                                    name="id_pesanan" value="{{ old('id_pesanan', $statusPesanan->id_pesanan) }}"
                                    placeholder="Masukkan ID Pesanan">
                                @error('id_pesanan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Nama Pemesan -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Nama Pemesan</label>
                                <input type="text" class="form-control @error('nama_pemesan') is-invalid @enderror"
                                    name="nama_pemesan" value="{{ old('nama_pemesan', $statusPesanan->nama_pemesan) }}"
                                    placeholder="Masukkan Nama Pemesan">
                                @error('nama_pemesan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Detail Pesanan -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Detail Pesanan</label>
                                <textarea class="form-control @error('detail_pesanan') is-invalid @enderror" 
                                    name="detail_pesanan" placeholder="Masukkan Detail Pesanan" rows="4">{{ old('detail_pesanan', $statusPesanan->detail_pesanan) }}</textarea>
                                @error('detail_pesanan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Status Pesanan -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" name="status">
                                    <option value="pending" {{ old('status', $statusPesanan->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="completed" {{ old('status', $statusPesanan->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ old('status', $statusPesanan->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                                @error('status')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update Status Pesanan</button>
                            <a href="{{ route('status_pesanans.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
