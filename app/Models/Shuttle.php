<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shuttle extends Model
{
    use HasFactory;

    protected $table = 'shuttles'; // Nama tabel di database

    protected $fillable = [
        'nama_armada',
        'kapasitas',
        'rute_operasional',
        'status_aktif',
    ];
}