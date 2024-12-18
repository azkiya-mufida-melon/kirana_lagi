<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilTPK extends Model
{
    use HasFactory;

    protected $table = 'hasil_tpk'; // Ganti dengan nama tabel yang sesuai
    protected $fillable = ['periode', 'hasil_perhitungan'];
}
