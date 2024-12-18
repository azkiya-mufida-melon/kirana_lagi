<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationPeriod extends Model
{
    use HasFactory;

    protected $fillable = [
        'period_date',  // Tanggal evaluasi
        'results',      // Hasil evaluasi
    ];

    protected $casts = [
        'results' => 'array', // Simpan hasil dalam format JSON
    ];
}
