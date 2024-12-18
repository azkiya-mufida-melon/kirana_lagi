<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'working_hours',       // Jam kerja
        'last_evaluation',     // Evaluasi terakhir
        'services_count',      // Jumlah pelayanan
        'working_duration',    // Lama bekerja
    ];
}
