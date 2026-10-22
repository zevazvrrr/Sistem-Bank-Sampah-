<?php

namespace App\Http\Controllers;

use App\Models\TransaksiSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiSampahController extends Controller
{
    /**
     * Simpan transaksi sampah ke database.
     * Dipanggil saat "Konfirmasi Transaksi" diklik di halaman input_sampah.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_nasabah'        => 'required|exists:nasabah,id_nasabah',
            'tanggal_transaksi' => 'required|date',
            'catatan'           => 'nullable|string|max:500',
            'rincian'           => 'required|array|min:1',
            'rincian.*.jenis_sampah'  => 'required|string',
            'rincian.*.berat_kg'      => 'required|numeric|min:0.01',
            'rincian.*.harga_per_kg'  => 'required|integer|min:1',
            'rincian.*.subtotal'      => 'required|integer|min:0',
        ]);

        DB::transaction(function () use ($validated) {
            foreach ($validated['rincian'] as $item) {
                TransaksiSampah::create([
                    'id_nasabah'        => $validated['id_nasabah'],
                    'tanggal_transaksi' => $validated['tanggal_transaksi'],
                    'jenis_sampah'      => $item['jenis_sampah'],
                    'berat_kg'          => $item['berat_kg'],
                    'harga_per_kg'      => $item['harga_per_kg'],
                    'subtotal'          => $item['subtotal'],
                    'catatan'           => $validated['catatan'] ?? null,
                ]);
            }
        });

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil dikonfirmasi!',
        ]);
    }
}

