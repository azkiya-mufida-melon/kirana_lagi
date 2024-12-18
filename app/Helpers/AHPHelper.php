<?php

namespace App\Helpers;

class AHPHelper
{
    public static function hitungBobot($matrix)
    {
        $jumlahKolom = array_map('array_sum', array_map(null, ...$matrix));
        $normalizedMatrix = [];
        $bobotPrioritas = [];

        foreach ($matrix as $row) {
            $normalizedRow = array_map(fn($value, $colSum) => $value / $colSum, $row, $jumlahKolom);
            $normalizedMatrix[] = $normalizedRow;
            $bobotPrioritas[] = array_sum($normalizedRow) / count($row);
        }

        return $bobotPrioritas;
    }
}
