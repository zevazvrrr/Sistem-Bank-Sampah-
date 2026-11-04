
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

            <button class="btn btn-primary">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                    <path d="M6 9V3h12v6"/>
                    <rect x="4" y="9" width="16" height="8" rx="1"/>
                    <path d="M7 21h10v-4H7z"/>
                </svg>
                Cetak Laporan
            </button>
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
                    <div class="tag">LAPORAN BULANAN</div>
                    <div class="range">Periode: 01 Juni 2026 - 30 Juni 2026</div>
                </div>

            </div>

            <div class="laporan-stats">

                <div class="laporan-stat-box">
                    <div class="lbl">Total Setoran</div>
                    <div class="val">1,248 kg</div>
                </div>

                <div class="laporan-stat-box">
                    <div class="lbl">Total Transaksi</div>
                    <div class="val">156</div>
                </div>

                <div class="laporan-stat-box">
                    <div class="lbl">Dana Keluar</div>
                    <div class="val danger">Rp 4.2M</div>
                </div>

                <div class="laporan-stat-box">
                    <div class="lbl">Nasabah Aktif</div>
                    <div class="val">82</div>
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
                    <tr>
                        <td>Plastik PET</td>
                        <td><span class="kategori-tag">ANORGANIK</span></td>
                        <td>452.5</td>
                        <td>Rp 3.500</td>
                        <td>Rp 1.583.750</td>
                    </tr>

                    <tr>
                        <td>Kertas HVS</td>
                        <td><span class="kategori-tag">ANORGANIK</span></td>
                        <td>215.0</td>
                        <td>Rp 2.800</td>
                        <td>Rp 602.000</td>
                    </tr>

                    <tr>
                        <td>Logam/Besi</td>
                        <td><span class="kategori-tag">LOGAM</span></td>
                        <td>120.8</td>
                        <td>Rp 8.500</td>
                        <td>Rp 1.026.800</td>
                    </tr>

                    <tr>
                        <td>Kardus Bekas</td>
                        <td><span class="kategori-tag">ANORGANIK</span></td>
                        <td>380.0</td>
                        <td>Rp 2.000</td>
                        <td>Rp 760.000</td>
                    </tr>

                    <tr class="total-row">
                        <td colspan="2">TOTAL KESELURUHAN</td>
                        <td>1,168.3 Kg</td>
                        <td></td>
                        <td>Rp 3.972.550</td>
                    </tr>
                </tbody>
            </table>

            <p class="laporan-footer-note">
                Dokumen ini dihasilkan secara otomatis oleh Bank Sampah System.
                <br>
                Segala bentuk kecurangan akan diproses sesuai hukum yang berlaku.
            </p>

        </div>

        <button class="scroll-top-btn" onclick="window.scrollTo({top:0,behavior:'smooth'})">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5">
                <path d="m5 12 7-7 7 7"/>
                <path d="M12 5v14"/>
            </svg>
        </button>

    </main>

</div>

</body>
</html>
