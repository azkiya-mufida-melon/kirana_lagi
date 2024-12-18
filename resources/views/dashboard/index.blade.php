<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIRANA COFFEE - DASHBOARD ADMIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #333;
            position: fixed;
            top: 0;
            left: 0;
            color: #fff;
            padding-top: 20px;
            overflow-y: auto;
        }

        .sidebar-header {
            font-size: 24px;
            text-align: center;
            padding: 10px 0;
            background-color: #2b2b2b;
            font-weight: bold;
            margin: 10px auto;
            border-radius: 8px;
            width: 90%;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .sidebar ul {
            list-style: none;
            padding-left: 0;
        }

        .sidebar ul li {
            padding: 15px 20px;
            font-size: 16px;
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
        }

        .sidebar ul li:hover {
            background-color: #444;
            cursor: pointer;
        }

        /* Top Header (KIRANA COFFEE - Laporan) */
        .top-header {
            background-color: #2b2b2b;
            color: #fff;
            text-align: center;
            font-size: 24px;
            padding: 15px 0;
            margin: 20px auto;
            margin-left: 270px;
            width: calc(100% - 300px);
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 10;
        }

        /* Main Content */
        .main-content {
            margin-left: 270px;
            padding: 20px;
            background-color: #f7f7f7;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .chart-container {
            position: relative;
            margin-top: 20px;
            width: 950px;
            height: 200px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .evaluation-form-container {
            margin-top: 30px;
        }

        /* Dropdown size adjustment */
        .form-select {
            width: auto; /* Mengatur lebar dropdown sesuai ukuran konten */
            max-width: 200px; /* Membatasi lebar dropdown */
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .top-header {
                margin-left: 210px;
                width: calc(100% - 230px);
            }

            .main-content {
                margin-left: 210px;
            }
        }

        /* Tabel */
        .evaluation-table td, .evaluation-table th {
            vertical-align: middle;
        }

        /* Memperpendek kolom Catatan Evaluasi */
        .evaluation-notes {
            max-width: 150px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Mengatur agar skor dan nama di form berada di samping */
        .form-row {
            display: flex;
            justify-content: space-between;
        }

        .form-row .form-group {
            width: 48%;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            KIRANA COFFEE
        </div>
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Pesanan</a></li>
            <li><a href="#">Delivery Order</a></li>
            <li><a href="#">Menu</a></li>
            <li><a href="#">Laporan</a></li>
            <li><a href="#">Biodata</a></li>
        </ul>
    </div>

    <div class="top-header">
        KIRANA COFFEE - Dashboard
    </div>

    <div class="main-content">
        <h2>Statis Penjualan</h2>

        <div class="row">
            <!-- Data kategori (gunakan Blade syntax) -->
            @foreach($categories as $category)
                <div class="col-md-3">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $category }}</h5>
                            <p class="card-text">Details about {{ $category }}.</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="chart-container">
            <canvas id="reportChart" width="930" height="200"></canvas>
        </div>

        <div class="evaluation-form-container">
            <form id="evaluationForm" class="mb-4">
                <div class="form-row">
                    <div class="form-group">
                        <label for="employeeName" class="form-label">Nama Karyawan</label>
                        <select class="form-select" id="employeeName">
                            <option value="" disabled selected>Pilih nama karyawan</option>
                            <option value="Ahmad">Ahmad</option>
                            <option value="Budi">Budi</option>
                            <option value="Citra">Citra</option>
                            <option value="Dewi">Dewi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="evaluationScore" class="form-label">Skor Evaluasi</label>
                        <select class="form-select" id="evaluationScore">
                            <option value="" disabled selected>Pilih skor evaluasi</option>
                            <option value="1-50">1-50</option>
                            <option value="51-100">51-100</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="evaluationNotes" class="form-label">Catatan Evaluasi</label>
                    <textarea class="form-control" id="evaluationNotes" rows="3" placeholder="Masukkan catatan (opsional)"></textarea>
                </div>
                <button type="button" class="btn btn-primary" id="saveButton">Simpan</button>
            </form>
        </div>

        <!-- Tabel Evaluasi -->
        <div class="evaluation-table mt-4">
            <h4>Data Evaluasi Karyawan</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Karyawan</th>
                        <th>Skor Evaluasi</th>
                        <th>Catatan Evaluasi</th>
                    </tr>
                </thead>
                <tbody id="evaluationTableBody">
                    <!-- Data dari form akan ditambahkan di sini -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Fungsi untuk memuat data dari LocalStorage dan menambahkannya ke tabel
        function loadEvaluationData() {
            const savedData = JSON.parse(localStorage.getItem('evaluations')) || [];
            const tableBody = document.getElementById('evaluationTableBody');
            savedData.forEach((data, index) => {
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${data.name}</td>
                    <td>${data.score}</td>
                    <td class="evaluation-notes">${data.notes}</td>
                `;
                tableBody.appendChild(newRow);
            });
        }

        // Fungsi untuk menyimpan data ke LocalStorage
        function saveEvaluationData(name, score, notes) {
            const savedData = JSON.parse(localStorage.getItem('evaluations')) || [];
            savedData.push({ name, score, notes });
            localStorage.setItem('evaluations', JSON.stringify(savedData));
        }

        // Event listener untuk tombol simpan
        document.getElementById('saveButton').addEventListener('click', function () {
            const name = document.getElementById('employeeName').value;
            const score = document.getElementById('evaluationScore').value;
            const notes = document.getElementById('evaluationNotes').value;

            if (!name || !score) {
                alert("Nama dan Skor Evaluasi wajib diisi!");
                return;
            }

            // Menyimpan data ke LocalStorage
            saveEvaluationData(name, score, notes);

            // Menambah data ke tabel
            const tableBody = document.getElementById('evaluationTableBody');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>${tableBody.children.length + 1}</td>
                <td>${name}</td>
                <td>${score}</td>
                <td class="evaluation-notes">${notes}</td>
            `;
            tableBody.appendChild(newRow);

            // Reset formulir setelah disimpan
            document.getElementById('evaluationForm').reset();
        });

        // Muat data saat halaman dimuat
        window.onload = loadEvaluationData;
    </script>

    <script>
        const ctx = document.getElementById('reportChart').getContext('2d');
        const reportChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($reports->pluck('name')),
                datasets: [{
                    label: 'Report Values',
                    data: @json($reports->pluck('value')),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
