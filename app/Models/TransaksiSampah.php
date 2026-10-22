<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiSampah extends Model
{
    use HasFactory;

    protected $table      = 'transaksi_sampah';
    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'id_nasabah',
        'tanggal_transaksi',
        'jenis_sampah',
        'berat_kg',
        'harga_per_kg',
        'subtotal',
        'catatan',
    ];

    protected $casts = [
        'tanggal_transaksi' => 'date',
        'berat_kg'          => 'float',
    ];

    /** Relasi ke Nasabah */
    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class, 'id_nasabah', 'id_nasabah');
    }
}

