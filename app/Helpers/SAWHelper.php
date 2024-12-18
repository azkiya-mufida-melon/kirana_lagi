<?php

namespace App\Helpers;

class SAWHelper
{
    public static function hitungSAW($data, $bobot, $tipe)
    {
        $normalized = [];

        foreach ($data as $karyawan) {
            $score = 0;
            foreach ($karyawan['nilai'] as $i => $value) {
                $maxMin = ($tipe[$i] === 'keuntungan') ? max(array_column($data, 'nilai')[$i]) : min(array_column($data, 'nilai')[$i]);
                $normalizedValue = ($tipe[$i] === 'keuntungan') ? $value / $maxMin : $maxMin / $value;
                $score += $normalizedValue * $bobot[$i];
            }
            $normalized[] = ['nama' => $karyawan['nama'], 'score' => $score];
        }

        return $normalized;
    }
}
