<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\TransaksiSampah;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Tampilkan halaman Cetak Laporan dengan data agregasi dari database.
     */
    public function index(Request $request)
    {
        $periode = $request->get('bulan', 'semua');
        $query   = TransaksiSampah::query();

        $tipeLaporan = 'KESELURUHAN';
        $periodeText = 'Semua Data Terdaftar';

        // Filter periode
        if ($periode === 'hari_ini') {
            $today = Carbon::today();
            $query->whereDate('tanggal_transaksi', $today);
            $tipeLaporan = 'HARIAN';
            $periodeText = $today->translatedFormat('d F Y');
        } elseif ($periode === 'bulan_ini') {
            $start = Carbon::now()->startOfMonth();
            $end   = Carbon::now()->endOfMonth();
            $query->whereBetween('tanggal_transaksi', [$start->toDateString(), $end->toDateString()]);
            $tipeLaporan = 'BULANAN';
            $periodeText = $start->translatedFormat('d F Y') . ' - ' . $end->translatedFormat('d F Y');
        } elseif ($periode === 'bulan_lalu') {
            $start = Carbon::now()->subMonth()->startOfMonth();
            $end   = Carbon::now()->subMonth()->endOfMonth();
            $query->whereBetween('tanggal_transaksi', [$start->toDateString(), $end->toDateString()]);
            $tipeLaporan = 'BULANAN (LALU)';
            $periodeText = $start->translatedFormat('d F Y') . ' - ' . $end->translatedFormat('d F Y');
        } elseif ($request->filled('dari') && $request->filled('sampai')) {
            $query->whereBetween('tanggal_transaksi', [$request->dari, $request->sampai]);
            $tipeLaporan = 'KUSTOM';
            $periodeText = Carbon::parse($request->dari)->translatedFormat('d F Y') . ' - ' . Carbon::parse($request->sampai)->translatedFormat('d F Y');
        } else {
            // Default "semua" data: jika ada transaksi, tampilkan tanggal awal sampai akhir transaksi
            $minDate = TransaksiSampah::min('tanggal_transaksi');
            $maxDate = TransaksiSampah::max('tanggal_transaksi');

            if ($minDate && $maxDate) {
                $periodeText = Carbon::parse($minDate)->translatedFormat('d F Y') . ' - ' . Carbon::parse($maxDate)->translatedFormat('d F Y');
            } else {
                $periodeText = Carbon::now()->startOfMonth()->translatedFormat('d F Y') . ' - ' . Carbon::now()->endOfMonth()->translatedFormat('d F Y');
            }
        }

        // Statistik ringkasan
        $totalSetoran = (clone $query)->sum('berat_kg');
        $totalTransaksi = (clone $query)->count();
        $danaKeluar   = (clone $query)->sum('subtotal');
        $nasabahAktif = Nasabah::where('status', 'aktif')->count();

        // Ringkasan per jenis sampah
        $ringkasan = (clone $query)
            ->select(
                'jenis_sampah',
                DB::raw('SUM(berat_kg) as total_volume'),
                DB::raw('SUM(subtotal) as total_nilai'),
                DB::raw('ROUND(SUM(subtotal) / NULLIF(SUM(berat_kg), 0)) as harga_rata_rata')
            )
            ->groupBy('jenis_sampah')
            ->orderByDesc('total_volume')
            ->get()
            ->map(function ($item) {
                $item->kategori = $this->kategoriSampah($item->jenis_sampah);
                return $item;
            });

        $totalKeseluruhanVolume = $ringkasan->sum('total_volume');
        $totalKeseluruhanNilai  = $ringkasan->sum('total_nilai');

        return view('laporan', compact(
            'tipeLaporan',
            'periodeText',
            'totalSetoran',
            'totalTransaksi',
            'danaKeluar',
            'nasabahAktif',
            'ringkasan',
            'totalKeseluruhanVolume',
            'totalKeseluruhanNilai',
            'periode'
        ));
    }

    /**
     * Helper pemetaan kategori sampah.
     */
    private function kategoriSampah($jenis)
    {
        $j = strtolower($jenis ?? '');

        if (str_contains($j, 'logam') || str_contains($j, 'besi') || str_contains($j, 'aluminium') || str_contains($j, 'tembaga') || str_contains($j, 'seng') || str_contains($j, 'kaleng')) {
            return 'LOGAM';
        }
        if (str_contains($j, 'organik') || str_contains($j, 'daun') || str_contains($j, 'makanan') || str_contains($j, 'sisa') || str_contains($j, 'sayur')) {
            return 'ORGANIK';
        }
        if (str_contains($j, 'kaca') || str_contains($j, 'beling') || str_contains($j, 'botol')) {
            return 'KACA';
        }
        if (str_contains($j, 'b3') || str_contains($j, 'elektronik') || str_contains($j, 'baterai') || str_contains($j, 'aki') || str_contains($j, 'lampu')) {
            return 'B3';
        }

        return 'ANORGANIK';
    }
}

