<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kirana Coffee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            display: flex;
            background-color: #f8f5f0; /* Background color */
        }
        .sidebar {
            min-width: 260px;
            max-width: 250px;
            background: #ffffff; /* Dark brown color */
            color: black;
            height: 100vh;
            padding: 20px;
        }
        .sidebar h2 {
            margin-bottom: 50px; /* Menambahkan jarak bawah */
        }
        .sidebar a {
            color: black;
            text-decoration: none;
            margin: 20px 0;
            display: block;
            font-size: 17px;
            font-style: Lilita One;
        }
        .sidebar a:hover {
            background: #d7ccc8; /* Light grey hover */
            color: #3e2723;
            padding-left: 10px;
            transition: 0.3s;
        }
        .sidebar a i {
            margin-right: 10px;
        }
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
        }
        .navbar {
            background: #3C3D37; /* Navbar color */
            width: 100%;
            padding: 25px;
            color: white;
            margin: 0;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
        }
        .card {
            background-color: #fffaf0; /* Card background */
            border: none;
        }
        .btn-success {
            background-color: #8d6e63; /* Button color */
            border: none;
        }
        .btn-success:hover {
            background-color: #6d4c41;
        }
        .btn-danger {
            background-color: #8d6e63; /* Delete button color */
            border: none;
        }
        .btn-danger:hover {
            background-color: #6d4c41;
        }
        table th {
            background-color: #e0e0e0; /* Table header color */
        }
        .dropdown-menu {
            min-width: 110px; /* Kurangi ukuran minimum lebar */
            max-width: 150px; /* Batasi ukuran maksimum lebar */
            background-color: #f8f9fa; /* Warna latar dropdown */
            padding: 5px 10px; /* Sesuaikan padding */
            border-radius: 5px; /* Buat sudut melengkung */
        }
        .dropdown {
            position: relative;
            z-index: 1050; /* Agar dropdown tampil di atas elemen lain */
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
    <h2>KIRANA COFFE</h2>
        <a href="#"><i class="fas fa-home"></i> Dashboard</a>
        <a href="{{ route('menus.index') }}"><i class="fas fa-coffee"></i> Menu</a>
        <a href="{{ route('pesanans.index') }}"><i class="fas fa-truck"></i> Pesanan</a>
        <a href="{{ route('transaksis.index') }}"><i class="fas fa-file-alt"></i> Transaksi</a>
        <a href="#"><i class="fas fa-chart-line"></i> Laporan</a>
        <a href="{{ route('biodatas.index') }}"><i class="fas fa-user"></i> Biodata</a>
        <a href="#"><i class="fas fa-lightbulb"></i> TPK</a>
        <a href="#"><i class="fas fa-chart-pie"></i> Hasil TPK</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <nav class="navbar d-flex justify-content-between">
            <span class="navbar-brand text-white">KIRANA COFFEE - Menu</span>
            <div class="d-flex align-items-center">
                <i class="fas fa-bell fa-lg me-3"></i>
                <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="Profile Picture">
                <div class="dropdown">
                    <a class="btn dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Admin
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Log out
                            </a>
                            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('absensis.index') }}">Absensi</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Data Menu Table -->
        
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <img src="{{ asset('/storage/menus/'.$menu->gambar_menu) }}" class="rounded" style="width: 100%">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>{{ $menu->nama_menu }}</h3>
                        <code>
                            <p><strong>Nama Menu:</strong>{!! $menu->detail_menu !!}</p>
                        </code>
                        <hr/>
                        <p><strong>Harga:</strong></p>
                        <p>{{ "Rp " . number_format($menu->harga,2,',','.') }}</p>
                        <hr/>
                        <p><strong>Stok:</strong></p>
                        <p>{{ $menu->stok }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            //message with sweetalert
            @if(session('success'))
                Swal.fire({
                    icon: "success",
                    title: "BERHASIL",
                    text: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 2000
                });
            @elseif(session('error'))
                Swal.fire({
                    icon: "error",
                    title: "GAGAL!",
                    text: "{{ session('error') }}",
                    showConfirmButton: false,
                    timer: 2000
                });
            @endif
        </script>
    </div>

</body>
</html>
