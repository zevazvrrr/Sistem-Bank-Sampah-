<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan - Bank Sampah</title>

    <link rel="stylesheet" href="{{ asset('laporan.css') }}">
</head>
<body>

<div class="app">

    @include('partials.nav')

    @include('partials.header')

    <main class="main-content">

        <div class="page-header">
            <div>
                <h1>Cetak Laporan</h1>
            </div>

            <div class="no-print" style="display:flex;align-items:center;gap:12px;flex-wrap:wrap;">
                {{-- Filter Periode --}}
                <form method="GET" action="{{ route('laporan') }}" style="display:flex;align-items:center;gap:8px;">
                    <select name="bulan" class="chip-select" onchange="this.form.submit()" style="border:1px solid var(--border-color);border-radius:var(--radius-sm);padding:10px 14px;font-size:13.5px;background:#fff;color:var(--text-body);cursor:pointer;">
                        <option value="semua" {{ $periode == 'semua' ? 'selected' : '' }}>Semua Periode</option>
                        <option value="bulan_ini" {{ $periode == 'bulan_ini' ? 'selected' : '' }}>Bulan Ini</option>
                        <option value="bulan_lalu" {{ $periode == 'bulan_lalu' ? 'selected' : '' }}>Bulan Lalu</option>
                        <option value="hari_ini" {{ $periode == 'hari_ini' ? 'selected' : '' }}>Hari Ini</option>
                    </select>
                </form>

                {{-- Tombol Cetak Laporan --}}
                <button type="button" class="btn btn-primary" onclick="window.print()" title="Cetak Laporan / Simpan PDF">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                        <path d="M6 9V3h12v6"/>
                        <rect x="4" y="9" width="16" height="8" rx="1"/>
                        <path d="M7 21h10v-4H7z"/>
                    </svg>
                    Cetak Laporan
                </button>
            </div>
        </div>

        <div class="card laporan-sheet">

            <div class="laporan-topbar">

                <div class="laporan-brand">
                    <div class="laporan-logo">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                            <path d="M12 2 4 6v6c0 5 4 8.5 8 10 4-1.5 8-5 8-10V6l-8-4Z"/>
                        </svg>
                    </div>

                    <div>
                        <h2>ECO-LEDGER SYSTEM</h2>
                        <p>Environmental Stewardship &amp; Waste Bank Management</p>
                    </div>
                </div>

                <div class="laporan-period">
                    <div class="tag">LAPORAN {{ $tipeLaporan }}</div>
                    <div class="range">Periode: {{ $periodeText }}</div>
                </div>

            </div>

            <div class="laporan-stats">

                <div class="laporan-stat-box">
                    <div class="lbl">Total Setoran</div>
                    <div class="val">{{ number_format($totalSetoran, 1) }} kg</div>
                </div>

                <div class="laporan-stat-box">
                    <div class="lbl">Total Transaksi</div>
                    <div class="val">{{ number_format($totalTransaksi) }}</div>
                </div>

                <div class="laporan-stat-box">
                    <div class="lbl">Dana Keluar</div>
                    <div class="val danger">Rp {{ number_format($danaKeluar, 0, ',', '.') }}</div>
                </div>

                <div class="laporan-stat-box">
                    <div class="lbl">Nasabah Aktif</div>
                    <div class="val">{{ number_format($nasabahAktif) }}</div>
                </div>

            </div>

            <h3 class="section-title">Ringkasan Jenis Sampah</h3>

            <table class="laporan-table">
                <thead>
                    <tr>
                        <th>Jenis Sampah</th>
                        <th>Kategori</th>
                        <th>Volume (Kg)</th>
                        <th>Harga Rata-rata</th>
                        <th>Total Nilai</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($ringkasan as $item)
                    <tr>
                        <td style="font-weight:600;color:var(--text-navy)">{{ $item->jenis_sampah }}</td>
                        <td><span class="kategori-tag">{{ $item->kategori }}</span></td>
                        <td>{{ number_format($item->total_volume, 1) }}</td>
                        <td>Rp {{ number_format($item->harga_rata_rata ?? 0, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($item->total_nilai, 0, ',', '.') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align:center;padding:32px;color:var(--text-muted)">
                            Belum ada data transaksi sampah untuk periode ini.
                        </td>
                    </tr>
                    @endforelse

                    <tr class="total-row">
                        <td colspan="2">TOTAL KESELURUHAN</td>
                        <td>{{ number_format($totalKeseluruhanVolume, 1) }} Kg</td>
                        <td></td>
                        <td>Rp {{ number_format($totalKeseluruhanNilai, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>

            <p class="laporan-footer-note">
                Dokumen ini dihasilkan secara otomatis oleh Bank Sampah System.
                <br>
                Segala bentuk kecurangan akan diproses sesuai hukum yang berlaku.
            </p>

        </div>

        <button class="scroll-top-btn no-print" onclick="window.scrollTo({top:0,behavior:'smooth'})" title="Kembali ke atas">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5">
                <path d="m5 12 7-7 7 7"/>
                <path d="M12 5v14"/>
            </svg>
        </button>

    </main>

</div>

</body>
</html>
