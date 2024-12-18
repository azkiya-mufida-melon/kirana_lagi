<?php

namespace App\Http\Controllers;

use App\Helpers\AHPHelper;
use App\Helpers\SAWHelper;
use App\Models\HasilTPK;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class TPKController extends Controller
{
    public function hitungTPK()
    {
        $kriteriaMatrix = [[1, 3, 2, 4], [0.33, 1, 0.5, 2], [0.5, 2, 1, 3], [0.25, 0.5, 0.33, 1]];
        $tipe = ['biaya', 'keuntungan', 'keuntungan', 'keuntungan'];
        $data = Karyawan::all()->map(function ($k) {
            return ['nama' => $k->nama, 'nilai' => [$k->jam_kerja, $k->evaluasi_terakhir, $k->jumlah_pelayanan, $k->lama_bekerja]];
        })->toArray();

        $bobot = AHPHelper::hitungBobot($kriteriaMatrix);
        $hasil = SAWHelper::hitungSAW($data, $bobot, $tipe);

        HasilTPK::create(['periode' => now(), 'hasil_perhitungan' => json_encode($hasil)]);

        return view('tpk.hasil', ['hasil' => $hasil]);
    }
}
