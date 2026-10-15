
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saldo Tabungan - Bank Sampah</title>

    {{-- PANGGILAN CSS --}}
    <link rel="stylesheet" href="{{ asset('saldo_tabungan.css') }}">
</head>

<body>
    <div class="app">

        {{-- PANGGILAN NAVBAR --}}
        @include('partials.nav')

        <div class="page-wrapper">

            {{-- PANGGILAN HEADER PALING ATAS --}}
            @include('partials.header')

            {{-- KONTEN SALDO TABUNGAN --}}
            <main class="main-content">

                <div class="breadcrumb">
                    Dashboard &gt;
                    <span class="current">Saldo Tabungan</span>
                </div>

                {{-- SALDO UTAMA --}}
                <div class="saldo-hero">
                    <div>
                        <div class="label">Total Saldo Anda</div>
                        <div class="amount">Rp 2.450.000</div>
                        <div class="updated">
                            Terakhir Diperbarui
                            <strong>24 Oktober 2026, 14:30 WIB</strong>
                        </div>
                    </div>

                    <div style="display:flex;flex-direction:column;align-items:flex-end;gap:16px">
                        <div class="saldo-hero-icon">
                            <svg width="28" height="28" viewBox="0 0 24 24"
                                fill="none" stroke="white" stroke-width="2">
                                <path d="M3 21V8l9-5 9 5v13"/>
                                <path d="M9 21v-6h6v6"/>
                            </svg>
                        </div>

                        <button class="btn-tarik">
                            <svg width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="2.5" y="6" width="19" height="13" rx="2"/>
                                <path d="M2.5 10h19"/>
                            </svg>
                            Tarik Saldo
                        </button>
                    </div>
                </div>

                {{-- RIWAYAT TRANSAKSI TERAKHIR --}}
                <div class="card table-card">

                    <div class="riwayat-header">
                        <h3>Riwayat Transaksi Terakhir</h3>

                        <div class="actions">
                            <a href="#" class="link-green">Lihat Semua</a>

                            <button class="btn btn-outline">
                                <svg width="15" height="15" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M3 5h18M6 12h12M10 19h4"/>
                                </svg>
                                Filter
                            </button>
                        </div>
                    </div>

                    {{-- TRANSAKSI 1 --}}
                    <div class="trx-row">
                        <div class="trx-left">
                            <div class="trx-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="9" cy="20" r="1.3"/>
                                    <circle cx="18" cy="20" r="1.3"/>
                                    <path d="M2.5 3h2.4l2.4 12.2a2 2 0 0 0 2 1.6h8.4a2 2 0 0 0 2-1.6L21.5 7H6"/>
                                </svg>
                            </div>

                            <div>
                                <div class="trx-name">Setoran Sampah Plastik</div>
                                <div class="trx-id">ID: #TRX-9921</div>
                            </div>
                        </div>

                        <div class="trx-mid">
                            <span>24 Okt 2026</span>
                            <span class="trx-cat">Anorganik</span>
                        </div>

                        <div class="trx-right">
                            <span class="trx-amount positive">+Rp 45.000</span>
                            <span class="status-pill status-success">Selesai</span>
                        </div>
                    </div>

                    {{-- TRANSAKSI 2 --}}
                    <div class="trx-row">
                        <div class="trx-left">
                            <div class="trx-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="7" width="18" height="13" rx="2"/>
                                    <path d="M8 7V5a4 4 0 0 1 8 0v2"/>
                                </svg>
                            </div>

                            <div>
                                <div class="trx-name">Penukaran Eco-Points</div>
                                <div class="trx-id">Voucher Listrik</div>
                            </div>
                        </div>

                        <div class="trx-mid">
                            <span>22 Okt 2026</span>
                            <span class="trx-cat">Loyalty</span>
                        </div>

                        <div class="trx-right">
                            <span class="trx-amount" style="color:#b8860b">-500 Pts</span>
                            <span class="status-pill status-success">Selesai</span>
                        </div>
                    </div>

                    {{-- TRANSAKSI 3 --}}
                    <div class="trx-row">
                        <div class="trx-left">
                            <div class="trx-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="2.5" y="6" width="19" height="13" rx="2"/>
                                    <path d="M2.5 10h19"/>
                                </svg>
                            </div>

                            <div>
                                <div class="trx-name">Tarik Tunai Saldo</div>
                                <div class="trx-id">ID: #TRX-9854</div>
                            </div>
                        </div>

                        <div class="trx-mid">
                            <span>20 Okt 2026</span>
                            <span class="trx-cat">Cash Out</span>
                        </div>

                        <div class="trx-right">
                            <span class="trx-amount negative">-Rp 150.000</span>
                            <span class="status-pill status-success">Selesai</span>
                        </div>
                    </div>

                    {{-- TRANSAKSI 4 --}}
                    <div class="trx-row">
                        <div class="trx-left">
                            <div class="trx-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M7 3 3 7l4 4"/>
                                    <path d="M3 7h11a5 5 0 0 1 5 5v1"/>
                                </svg>
                            </div>

                            <div>
                                <div class="trx-name">Setoran Kertas &amp; Karton</div>
                                <div class="trx-id">ID: #TRX-9812</div>
                            </div>
                        </div>

                        <div class="trx-mid">
                            <span>18 Okt 2026</span>
                            <span class="trx-cat">Anorganik</span>
                        </div>

                        <div class="trx-right">
                            <span class="trx-amount positive">+Rp 12.500</span>
                            <span class="status-pill status-success">Selesai</span>
                        </div>
                    </div>

                    {{-- INFORMASI JUMLAH TRANSAKSI --}}
                    <div class="table-footer">
                        <span>Menampilkan 4 dari 158 transaksi</span>
                        <span></span>
                    </div>

                </div>

                {{-- TIPS MENABUNG SAMPAH --}}
                <div class="tips-card-bottom">
                    <div class="icon">
                        <svg width="22" height="22" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 21h6"/>
                            <path d="M12 3a6 6 0 0 0-4 10.5c.6.6 1 1.4 1 2.5h6c0-1.1.4-1.9 1-2.5A6 6 0 0 0 12 3Z"/>
                        </svg>
                    </div>

                    <div>
                        <h4>Tips Menabung Sampah</h4>
                        <p>
                            Pastikan sampah plastik dalam keadaan bersih dan kering
                            untuk mendapatkan nilai tukar yang lebih tinggi.
                        </p>
                    </div>
                </div>

            </main>
        </div>
    </div>
</body>
</html>