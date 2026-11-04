
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
                </div>

                {{-- STATISTIK --}}
                <div class="stat-grid">

                    <div class="stat-card">
                        <div class="stat-label">Transaksi Hari Ini</div>
                        <div class="stat-value">{{ $transaksiHariIni }}</div>
                        <div class="stat-sub">Total transaksi hari ini</div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-label">Total Berat Sampah</div>
                        <div class="stat-value">{{ number_format($totalBeratSampah, 1) }} kg</div>
                        <div class="stat-sub">Kumulatif semua transaksi</div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-label">Volume Tabungan</div>
                        <div class="stat-value">Rp {{ number_format($totalVolTabungan, 0, ',', '.') }}</div>
                        <div class="stat-sub">Total nilai tabungan aktif</div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-label">Nasabah Aktif</div>
                        <div class="stat-value">{{ $nasabahAktif }}</div>
                        <div class="stat-sub">Terdaftar di wilayah</div>
                    </div>

                </div>

                {{-- TABEL RIWAYAT TRANSAKSI --}}
                <div class="card table-card">

                    {{-- FILTER BAR --}}
                    <form method="GET" action="{{ route('riwayat_transaksi') }}">
                        <div class="filter-bar">
                            <div class="filter-left">

                                {{-- Filter Jenis Sampah --}}
                                <select name="jenis" class="chip-select" onchange="this.form.submit()">
                                    <option value="">Semua Kategori</option>
                                    @foreach($daftarJenis as $j)
                                        <option value="{{ $j }}" {{ request('jenis') == $j ? 'selected' : '' }}>
                                            {{ $j }}
                                        </option>
                                    @endforeach
                                </select>

                                {{-- Filter Tanggal Dari --}}
                                <input
                                    type="date"
                                    name="dari"
                                    class="chip-select"
                                    value="{{ request('dari') }}"
                                    placeholder="Dari tanggal"
                                >

                                {{-- Filter Tanggal Sampai --}}
                                <input
                                    type="date"
                                    name="sampai"
                                    class="chip-select"
                                    value="{{ request('sampai') }}"
                                    placeholder="Sampai tanggal"
                                >

                                {{-- Search Nasabah --}}
                                <input
                                    type="text"
                                    name="search"
                                    class="chip-select"
                                    value="{{ request('search') }}"
                                    placeholder="Cari nama nasabah..."
                                    style="min-width:180px"
                                >

                                <button type="submit" class="btn btn-primary" style="padding:10px 18px;font-size:13.5px">
                                    Cari
                                </button>

                                @if(request()->hasAny(['jenis','dari','sampai','search']))
                                    <a href="{{ route('riwayat_transaksi') }}" class="btn btn-outline" style="padding:10px 18px;font-size:13.5px">
                                        Reset
                                    </a>
                                @endif
                            </div>

                            <span class="entries-info">
                                @if($transaksi->total() > 0)
                                    Menampilkan {{ $transaksi->firstItem() }}–{{ $transaksi->lastItem() }}
                                    dari {{ $transaksi->total() }} transaksi
                                @else
                                    Tidak ada data
                                @endif
                            </span>
                        </div>
                    </form>

                    <table>
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama Nasabah</th>
                                <th>Jenis Sampah</th>
                                <th>Berat (kg)</th>
                                <th>Total Nilai (Rp)</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($transaksi as $t)
                            <tr>
                                <td>{{ $t->created_at->format('d M Y, H:i') }}</td>
                                <td style="color:var(--primary-dark);font-weight:600">
                                    {{ $t->nasabah->nama ?? '-' }}
                                </td>
                                <td><span class="jenis-tag">{{ $t->jenis_sampah }}</span></td>
                                <td>{{ number_format($t->berat_kg, 1) }} kg</td>
                                <td>Rp {{ number_format($t->subtotal, 0, ',', '.') }}</td>
                                <td>
                                    <span class="status-pill status-success">SELESAI</span>
                                </td>
                                <td>
                                    <button class="eye-btn" title="Lihat Detail">
                                        <svg width="15" height="15" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M1.5 12S5 5 12 5s10.5 7 10.5 7-3.5 7-10.5 7S1.5 12 1.5 12Z"/>
                                            <circle cx="12" cy="12" r="3"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" style="text-align:center;padding:40px;color:var(--text-muted);">
                                    <div style="font-size:15px;font-weight:600;margin-bottom:6px">Belum ada data transaksi.</div>
                                    <div style="font-size:13px">Silakan input sampah terlebih dahulu melalui menu Input Sampah.</div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- PAGINATION --}}
                    <div class="table-footer">
                        <span style="font-size:13.5px;color:var(--text-muted)">
                            Halaman {{ $transaksi->currentPage() }} dari {{ $transaksi->lastPage() }}
                        </span>

                        <div class="pagination">
                            {{-- Tombol Prev --}}
                            @if($transaksi->onFirstPage())
                                <button disabled style="opacity:0.4;cursor:not-allowed">&lt;</button>
                            @else
                                <a href="{{ $transaksi->previousPageUrl() }}" class="pagination-link">
                                    <button>&lt;</button>
                                </a>
                            @endif

                            {{-- Nomor Halaman --}}
                            @php
                                $start = max(1, $transaksi->currentPage() - 2);
                                $end   = min($transaksi->lastPage(), $transaksi->currentPage() + 2);
                            @endphp

                            @if($start > 1)
                                <a href="{{ $transaksi->url(1) }}" class="pagination-link"><button>1</button></a>
                                @if($start > 2)
                                    <span style="padding:0 4px">...</span>
                                @endif
                            @endif

                            @for($p = $start; $p <= $end; $p++)
                                @if($p == $transaksi->currentPage())
                                    <button class="active">{{ $p }}</button>
                                @else
                                    <a href="{{ $transaksi->url($p) }}" class="pagination-link">
                                        <button>{{ $p }}</button>
                                    </a>
                                @endif
                            @endfor

                            @if($end < $transaksi->lastPage())
                                @if($end < $transaksi->lastPage() - 1)
                                    <span style="padding:0 4px">...</span>
                                @endif
                                <a href="{{ $transaksi->url($transaksi->lastPage()) }}" class="pagination-link">
                                    <button>{{ $transaksi->lastPage() }}</button>
                                </a>
                            @endif

                            {{-- Tombol Next --}}
                            @if($transaksi->hasMorePages())
                                <a href="{{ $transaksi->nextPageUrl() }}" class="pagination-link">
                                    <button>&gt;</button>
                                </a>
                            @else
                                <button disabled style="opacity:0.4;cursor:not-allowed">&gt;</button>
                            @endif
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>
</body>
</html>
