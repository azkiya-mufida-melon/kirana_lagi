<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'laporans';

    // Primary key jika bukan `id`
    protected $primaryKey = 'id_laporan';
    public $incrementing = true; // Assuming `id_laporan` is an integer and auto-incremented
    protected $keyType = 'int';

    // Kolom yang boleh diisi
    protected $fillable = [
        'id_pesanan',
        'tgl_laporan'
    ];
}
