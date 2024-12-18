<?php

namespace App\Http\Controllers;

use App\Models\Report;

class ReportController extends Controller
{
    public function index()
    {
        // Mengambil data laporan dari database
        $reports = Report::all();

        // Kelompokkan data berdasarkan kategori
        $categories = Report::select('category')->distinct()->pluck('category');

        return view('reports.index', compact('reports', 'categories'));
    }
}
