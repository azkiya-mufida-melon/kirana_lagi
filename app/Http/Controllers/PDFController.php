<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Laporan;

class PDFController extends Controller
{
    public function downloadPdf()
    {
        // Ambil semua data dari tabel 'laporans'
        $laporans = Laporan::all();

        // Muat view ke dalam PDF dengan data 'laporans'
        $pdf = Pdf::loadView('pdf', ['laporans' => $laporans]);

        // Unduh file PDF
        return $pdf->download('laporan.pdf');
    }
}
