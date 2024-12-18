<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'jam_kerja', 'evaluasi_terakhir', 'jumlah_pelayanan', 'lama_bekerja'];
}
