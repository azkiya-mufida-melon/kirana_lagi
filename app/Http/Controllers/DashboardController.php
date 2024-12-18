<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil data laporan dari database
        $reports = Report::all();

        // Kelompokkan data berdasarkan kategori
        $categories = Report::select('category')->distinct()->pluck('category');

        return view('dashboard.index', compact('reports', 'categories'));
    }
}
