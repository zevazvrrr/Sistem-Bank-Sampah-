
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi - Bank Sampah</title>

    {{-- PANGGILAN CSS --}}
    <link rel="stylesheet" href="{{ asset('riwayat_transaksi.css') }}">
</head>

<body>
    <div class="app">

        {{-- PANGGILAN NAVBAR --}}
        @include('partials.nav')

        <div class="page-wrapper">

            {{-- PANGGILAN HEADER PALING ATAS --}}
            @include('partials.header')

            {{-- KONTEN RIWAYAT TRANSAKSI --}}
            <main class="main-content">

                <div class="breadcrumb">
                    Admin &gt;
                    <span class="current">Riwayat Transaksi</span>
                </div>

                <div class="page-header">
                    <div>
                        <h1>Daftar Riwayat Transaksi</h1>
                        <p class="subtitle">
                            Monitoring data setoran sampah dan konversi nilai tabungan nasabah.
                        </p>
                    </div>

                    <div style="display:flex;gap:12px">
                        <button class="btn btn-outline">
                            <svg width="15" height="15" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M3 5h18M6 12h12M10 19h4"/>
                            </svg>
                            Filter Data
                        </button>
                    </div>
                </div>

                {{-- STATISTIK --}}
                <div class="stat-grid">

                    <div class="stat-card">
                        <div class="stat-label">Transaksi Hari Ini</div>
                        <div class="stat-value">42</div>
                        <div class="stat-sub" style="color:var(--success)">
                            &#8599; +12% from yesterday
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-label">Total Berat Sampah</div>
                        <div class="stat-value">1.284 kg</div>
                        <div class="stat-sub">Cumulative monthly total</div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-label">Volume Tabungan</div>
                        <div class="stat-value">Rp 4.5M</div>
                        <div class="stat-sub">Total active balance</div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-label">Nasabah Aktif</div>
                        <div class="stat-value">156</div>
                        <div class="stat-sub">Registered in district area</div>
                    </div>

                </div>

                {{-- TABEL RIWAYAT TRANSAKSI --}}
                <div class="card table-card">

                    <div class="filter-bar">
                        <div class="filter-left">
                            <select class="chip-select">
                                <option>Semua Kategori</option>
                            </select>

                            <select class="chip-select">
                                <option>7 Hari Terakhir</option>
                            </select>
                        </div>

                        <span class="entries-info">
                            Showing 1-10 of 1,245 entries
                        </span>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama Nasabah</th>
                                <th>Jenis Sampah</th>
                                <th>Berat (kg)</th>
                                <th>Total Nilai (Rp)</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>24 Okt 2026, 10:30</td>
                                <td style="color:var(--primary-dark);font-weight:600">
                                    Budi Santoso
                                </td>
                                <td><span class="jenis-tag">Plastik PET</span></td>
                                <td>12.5 kg</td>
                                <td>Rp 37.500</td>
                                <td>
                                    <span class="status-pill status-success">SELESAI</span>
                                </td>
                                <td>
                                    <button class="eye-btn">
                                        <svg width="15" height="15" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M1.5 12S5 5 12 5s10.5 7 10.5 7-3.5 7-10.5 7S1.5 12 1.5 12Z"/>
                                            <circle cx="12" cy="12" r="3"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td>24 Okt 2026, 11:15</td>
                                <td style="color:var(--primary-dark);font-weight:600">
                                    Ani Wijaya
                                </td>
                                <td><span class="jenis-tag">Kertas Karton</span></td>
                                <td>5.2 kg</td>
                                <td>Rp 10.400</td>
                                <td>
                                    <span class="status-pill status-success">SELESAI</span>
                                </td>
                                <td>
                                    <button class="eye-btn">
                                        <svg width="15" height="15" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M1.5 12S5 5 12 5s10.5 7 10.5 7-3.5 7-10.5 7S1.5 12 1.5 12Z"/>
                                            <circle cx="12" cy="12" r="3"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td>24 Okt 2026, 13:45</td>
                                <td style="color:var(--primary-dark);font-weight:600">
                                    Dedi Kurniawan
                                </td>
                                <td><span class="jenis-tag">Logam Besi</span></td>
                                <td>2.0 kg</td>
                                <td>Rp 16.000</td>
                                <td>
                                    <span class="status-pill status-warning">MENUNGGU</span>
                                </td>
                                <td>
                                    <button class="eye-btn">
                                        <svg width="15" height="15" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M1.5 12S5 5 12 5s10.5 7 10.5 7-3.5 7-10.5 7S1.5 12 1.5 12Z"/>
                                            <circle cx="12" cy="12" r="3"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td>23 Okt 2026, 09:20</td>
                                <td style="color:var(--primary-dark);font-weight:600">
                                    Lestari Putri
                                </td>
                                <td><span class="jenis-tag">Plastik PET</span></td>
                                <td>8.7 kg</td>
                                <td>Rp 26.100</td>
                                <td>
                                    <span class="status-pill status-success">SELESAI</span>
                                </td>
                                <td>
                                    <button class="eye-btn">
                                        <svg width="15" height="15" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M1.5 12S5 5 12 5s10.5 7 10.5 7-3.5 7-10.5 7S1.5 12 1.5 12Z"/>
                                            <circle cx="12" cy="12" r="3"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td>23 Okt 2026, 15:10</td>
                                <td style="color:var(--primary-dark);font-weight:600">
                                    Rizky Ramadhan
                                </td>
                                <td><span class="jenis-tag">Organik</span></td>
                                <td>20.0 kg</td>
                                <td>Rp 10.000</td>
                                <td>
                                    <span class="status-pill status-danger">DIBATALKAN</span>
                                </td>
                                <td>
                                    <button class="eye-btn">
                                        <svg width="15" height="15" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M1.5 12S5 5 12 5s10.5 7 10.5 7-3.5 7-10.5 7S1.5 12 1.5 12Z"/>
                                            <circle cx="12" cy="12" r="3"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- PAGINATION --}}
                    <div class="table-footer">
                        <span></span>

                        <div class="pagination">
                            <button>&lt;</button>
                            <button class="active">1</button>
                            <button>2</button>
                            <button>3</button>
                            <span style="padding:0 4px">...</span>
                            <button>125</button>
                            <button>&gt;</button>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>
</body>
</html>