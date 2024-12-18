<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = Laporan::latest()->paginate(10);
        return view('laporans.index', compact('laporans'));
    }

    public function create()
    {
        return view('laporans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pesanan' => 'required|numeric',
            'tgl_laporan' => 'required|date',
        ]);

        Laporan::create([
            'id_pesanan' => $request->id_pesanan,
            'tgl_laporan' => $request->tgl_laporan,
        ]);

        return redirect()->route('laporans.index')->with('success', 'Laporan Berhasil Disimpan!');
    }

    public function show(string $id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('laporans.show', compact('laporan'));
    }

    public function edit(string $id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('laporans.edit', compact('laporan'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_pesanan' => 'required|numeric',
            'tgl_laporan' => 'required|date',
        ]);

        $laporan = Laporan::findOrFail($id);
        $laporan->update([
            'id_pesanan' => $request->id_pesanan,
            'tgl_laporan' => $request->tgl_laporan,
        ]);

        return redirect()->route('laporans.index')->with('success', 'Laporan Berhasil Diubah!');
    }

    public function destroy(string $id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();

        return redirect()->route('laporans.index')->with('success', 'Laporan Berhasil Dihapus!');
    }
}
