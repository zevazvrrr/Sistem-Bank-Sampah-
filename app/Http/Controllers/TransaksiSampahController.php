<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\TransaksiSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiSampahController extends Controller
{
    /**
     * Halaman Riwayat Transaksi — data dari database dengan filter & pagination.
     */
    public function index(Request $request)
    {
        $query = TransaksiSampah::with('nasabah')
            ->orderBy('created_at', 'desc');

        // Filter: jenis sampah
        if ($request->filled('jenis')) {
            $query->where('jenis_sampah', $request->jenis);
        }

        // Filter: rentang tanggal
        if ($request->filled('dari')) {
            $query->whereDate('tanggal_transaksi', '>=', $request->dari);
        }
        if ($request->filled('sampai')) {
            $query->whereDate('tanggal_transaksi', '<=', $request->sampai);
        }

        // Filter: nama nasabah (search)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('nasabah', function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%");
            });
        }

        $transaksi = $query->paginate(10)->withQueryString();

        // Statistik
        $today = now()->toDateString();

        $transaksiHariIni  = TransaksiSampah::whereDate('tanggal_transaksi', $today)->count();
        $totalBeratSampah  = TransaksiSampah::sum('berat_kg');
        $totalVolTabungan  = TransaksiSampah::sum('subtotal');
        $nasabahAktif      = Nasabah::where('status', 'aktif')->count();

        // Daftar jenis sampah unik untuk dropdown filter
        $daftarJenis = TransaksiSampah::select('jenis_sampah')
            ->distinct()
            ->orderBy('jenis_sampah')
            ->pluck('jenis_sampah');

        return view('riwayat_transaksi', compact(
            'transaksi',
            'transaksiHariIni',
            'totalBeratSampah',
            'totalVolTabungan',
            'nasabahAktif',
            'daftarJenis'
        ));
    }

    /**
     * Simpan transaksi sampah ke database.
     * Dipanggil saat "Konfirmasi Transaksi" diklik di halaman input_sampah.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_nasabah'              => 'required|exists:nasabah,id_nasabah',
            'tanggal_transaksi'       => 'required|date',
            'catatan'                 => 'nullable|string|max:500',
            'rincian'                 => 'required|array|min:1',
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
