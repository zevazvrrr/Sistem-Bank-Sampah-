<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard - Bank Sampah</title>
<link rel="stylesheet" href="{{ asset('dashboard.css') }}">
</head>
<body>
<div class="app">

    @include('partials.nav')
    @include('partials.header')

  <main class="main-content">
    <div class="breadcrumb">Beranda / <span class="current">Dashboard</span></div>
    <div class="page-header">
      <div>
        <h1>Ringkasan Statistik</h1>
      </div>
    </div>

    {{-- Stat Cards - data dari database --}}
    <div class="stat-grid">
      <div class="stat-card">
        <div class="stat-top">
          <div class="stat-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="8" r="3.2"/><path d="M2.5 19c0-3.3 2.8-5.5 6.5-5.5s6.5 2.2 6.5 5.5"/><circle cx="17" cy="8.5" r="2.6"/><path d="M15.5 13.7c2.7.4 4.5 2.3 4.5 5.3"/></svg></div>
        </div>
        <div class="stat-label">Total Nasabah</div>
        <div class="stat-value">{{ number_format($totalNasabah) }}</div>
      </div>
      <div class="stat-card">
        <div class="stat-top">
          <div class="stat-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 3 21 7l-4 4"/><path d="M3 11V9a2 2 0 0 1 2-2h16"/><path d="M7 21 3 17l4-4"/><path d="M21 13v2a2 2 0 0 1-2 2H3"/></svg></div>
        </div>
        <div class="stat-label">Total Transaksi</div>
        <div class="stat-value">{{ number_format($totalTransaksi) }}</div>
      </div>
      <div class="stat-card">
        <div class="stat-top">
          <div class="stat-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="5" rx="1"/><path d="M4 9v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9"/><path d="M10 13h4"/></svg></div>
        </div>
        <div class="stat-label">Total Sampah (kg)</div>
        <div class="stat-value">{{ number_format($totalSampah, 1) }}</div>
      </div>
      <div class="stat-card">
        <div class="stat-top">
          <div class="stat-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2.5" y="6" width="19" height="13" rx="2"/><path d="M2.5 10h19"/></svg></div>
        </div>
        <div class="stat-label">Total Saldo</div>
        <div class="stat-value">Rp {{ number_format($totalSaldo, 0, ',', '.') }}</div>
      </div>
    </div>

    {{-- Tabel Nasabah Terbaru --}}
    <div class="card table-card">
      <div class="table-card-header">
        <h3>Nasabah Terbaru</h3>
        <div class="actions">
          <a href="{{ route('nasabah.index') }}" class="link-green">Lihat Semua</a>
        </div>
      </div>
      <table>
        <thead>
          <tr><th>No</th><th>Nama</th><th>No. Telp</th><th>Alamat</th><th>Status</th><th>Tanggal Daftar</th></tr>
        </thead>
        <tbody>
          @forelse ($nasabahTerbaru as $index => $n)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $n->nama }}</td>
            <td>{{ $n->no_telp }}</td>
            <td>{{ $n->alamat ?? '-' }}</td>
            <td>
              @if($n->status === 'aktif')
                <span class="status-pill status-success">Aktif</span>
              @else
                <span class="status-pill status-danger">Tidak Aktif</span>
              @endif
            </td>
            <td>{{ $n->created_at ? $n->created_at->format('d M Y, H:i') : '-' }}</td>
          </tr>
          @empty
          <tr>
            <td colspan="6" style="text-align:center; padding:32px; color:var(--text-muted);">
              Belum ada data nasabah.
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
      <div class="table-footer">
        <span>Menampilkan {{ $nasabahTerbaru->count() }} nasabah terbaru</span>
      </div>
    </div>

    {{-- Aksi Cepat - full width setelah chart dihapus --}}
    <div class="card quick-actions-card">
      <h3>Aksi Cepat</h3>
      <div class="quick-actions-row">
        <a href="{{ route('nasabah.index') }}" class="quick-action-btn">
          <span class="left"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="8" r="3.2"/><path d="M2.5 19c0-3.3 2.8-5.5 6.5-5.5"/><path d="M16 8h5M18.5 5.5v5"/></svg>Daftar Nasabah Baru</span>&rsaquo;
        </a>
        <a href="{{ route('input_sampah') }}" class="quick-action-btn">
          <span class="left"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="20" r="1.3"/><circle cx="18" cy="20" r="1.3"/><path d="M2.5 3h2.4l2.4 12.2a2 2 0 0 0 2 1.6h8.4a2 2 0 0 0 2-1.6L21.5 7H6"/></svg>Input Sampah Baru</span>&rsaquo;
        </a>
        <a href="{{ route('riwayat_transaksi') }}" class="quick-action-btn">
          <span class="left"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3.5 2"/></svg>Riwayat Transaksi</span>&rsaquo;
        </a>
      </div>
      <div class="tips-box">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 8h.01"/><path d="M11 12h1v5h1"/></svg>
        <span><strong>Tips Admin:</strong> Pastikan timbangan dikalibrasi setiap pagi sebelum memulai operasional bank sampah.</span>
      </div>
    </div>

  </main>
</div>
</body>
</html>
