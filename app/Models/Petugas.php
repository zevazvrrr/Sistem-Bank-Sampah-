<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Petugas extends Authenticatable
{
    use Notifiable;

    protected $table = 'petugas';
    protected $primaryKey = 'id_petugas'; // Primary key sesuai database

    public $timestamps = false; // Karena tabel petugas tidak ada created_at/updated_at

    protected $fillable = [
        'nama_petugas',
        'username',
        'password',
        'no_telp',
    ];

    protected $hidden = [
        'password',
    ];
}