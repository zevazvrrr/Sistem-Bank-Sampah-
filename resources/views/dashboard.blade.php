<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{ asset('dashboard.css') }}">
<title>Dashboard - Bank Sampah</title>
<link rel="stylesheet" href="dashboard.css">
</head>
<body>
<div class="app">
  <aside class="sidebar">
    <div class="sidebar-brand">
      <div class="logo-box"><svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="white" stroke-width="2"><path d="M7 3 3 7l4 4"/><path d="M3 7h11a5 5 0 0 1 5 5v1"/><path d="m17 21 4-4-4-4"/><path d="M21 17H10a5 5 0 0 1-5-5v-1"/></svg></div>
      <div class="brand-text">Admin<br>Dashboard</div>
    </div>
    <ul class="sidebar-nav">
        <li><a href="dashboard.html" class="nav-link active"><span class="nav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg></span>Dashboard</a></li>
        <li><a href="nasabah.html" class="nav-link"><span class="nav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="8" r="3.2"/><path d="M2.5 19c0-3.3 2.8-5.5 6.5-5.5s6.5 2.2 6.5 5.5"/><circle cx="17" cy="8.5" r="2.6"/><path d="M15.5 13.7c2.7.4 4.5 2.3 4.5 5.3"/></svg></span>Kelola Nasabah</a></li>
        <li><a href="input-sampah.html" class="nav-link"><span class="nav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="20" r="1.3"/><circle cx="18" cy="20" r="1.3"/><path d="M2.5 3h2.4l2.4 12.2a2 2 0 0 0 2 1.6h8.4a2 2 0 0 0 2-1.6L21.5 7H6"/></svg></span>Input Sampah</a></li>
        <li><a href="riwayat-transaksi.html" class="nav-link"><span class="nav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3.5 2"/></svg></span>Riwayat Transaksi</a></li>
        <li><a href="saldo-tabungan.html" class="nav-link"><span class="nav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2.5" y="6" width="19" height="13" rx="2"/><path d="M2.5 10h19"/><path d="M16 14.2h2.5"/></svg></span>Saldo Tabungan</a></li>
        <li><a href="laporan.html" class="nav-link"><span class="nav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2.5h8l4.5 4.5V21a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1Z"/><path d="M14 2.5V7h4.5"/></svg></span>Laporan</a></li>
        <li><a href="jenis-sampah.html" class="nav-link"><span class="nav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2.5 21 8l-9 5.5L3 8l9-5.5Z"/><path d="m3 12.5 9 5.5 9-5.5"/><path d="m3 16.7 9 5.5 9-5.5"/></svg></span>Kelola Jenis Sampah</a></li>
    </ul>
    <div class="sidebar-footer">
      <ul>
        <li><a href="#" class="nav-link"><span class="nav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 13a7.7 7.7 0 0 0 0-2l2-1.6-2-3.4-2.4 1a7.6 7.6 0 0 0-1.7-1L15 3h-6l-.3 2.6a7.6 7.6 0 0 0-1.7 1l-2.4-1-2 3.4L4.6 11a7.7 7.7 0 0 0 0 2l-2 1.6 2 3.4 2.4-1a7.6 7.6 0 0 0 1.7 1L9 21h6l.3-2.6a7.6 7.6 0 0 0 1.7-1l2.4 1 2-3.4-2-1.6Z"/></svg></span>Settings</a></li>
        <li><a href="login.html" class="nav-link logout"><span class="nav-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><path d="m16 17 5-5-5-5"/><path d="M21 12H9"/></svg></span>Logout</a></li>
      </ul>
    </div>
  </aside>
  <header class="topbar">
    <div class="topbar-search">
      <span class="icon-search" style="width:18px;height:18px;display:flex"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m20.5 20.5-4-4"/></svg></span>
      <input type="text" placeholder="Cari data">
    </div>
    <div class="topbar-icons">
      <span class="icon-btn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8a6 6 0 1 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.7 21a2 2 0 0 1-3.4 0"/></svg></span>
      <span class="icon-btn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M9.5 9a2.5 2.5 0 1 1 3.3 2.4c-.9.4-1.3 1-1.3 1.9"/><path d="M12 17.2h.01"/></svg></span>
      <div class="avatar"></div>
    </div>
  </header>
  <main class="main-content">
    <div class="breadcrumb">Beranda / <span class="current">Dashboard</span></div>
    <div class="page-header">
      <div>
        <h1>Ringkasan Statistik</h1>
      </div>
      <button class="btn btn-primary">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5"><path d="M12 5v14M5 12h14"/></svg>
        Input Baru
      </button>
    </div>

    <div class="stat-grid">
      <div class="stat-card">
        <div class="stat-top">
          <div class="stat-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="8" r="3.2"/><path d="M2.5 19c0-3.3 2.8-5.5 6.5-5.5s6.5 2.2 6.5 5.5"/><circle cx="17" cy="8.5" r="2.6"/><path d="M15.5 13.7c2.7.4 4.5 2.3 4.5 5.3"/></svg></div>
          <span class="badge-up">+12%</span>
        </div>
        <div class="stat-label">Total Nasabah</div>
        <div class="stat-value">1,284</div>
      </div>
      <div class="stat-card">
        <div class="stat-top">
          <div class="stat-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 3 21 7l-4 4"/><path d="M3 11V9a2 2 0 0 1 2-2h16"/><path d="M7 21 3 17l4-4"/><path d="M21 13v2a2 2 0 0 1-2 2H3"/></svg></div>
          <span class="badge-up">+5.4%</span>
        </div>
        <div class="stat-label">Total Transaksi</div>
        <div class="stat-value">452</div>
      </div>
      <div class="stat-card">
        <div class="stat-top">
          <div class="stat-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="5" rx="1"/><path d="M4 9v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9"/><path d="M10 13h4"/></svg></div>
          <span class="badge-up">+21%</span>
        </div>
        <div class="stat-label">Total Sampah (kg)</div>
        <div class="stat-value">8,420.5</div>
      </div>
      <div class="stat-card">
        <div class="stat-top">
          <div class="stat-icon"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2.5" y="6" width="19" height="13" rx="2"/><path d="M2.5 10h19"/></svg></div>
          <span class="badge-up">+8%</span>
        </div>
        <div class="stat-label">Total Saldo</div>
        <div class="stat-value">Rp 12.5M</div>
      </div>
    </div>

    <div class="card table-card">
      <div class="table-card-header">
        <h3>Transaksi Terbaru</h3>
        <div class="actions">
          <button class="btn btn-outline">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 5h18M6 12h12M10 19h4"/></svg>
            Filter
          </button>
          <a href="riwayat-transaksi.html" class="link-green">Lihat Semua</a>
        </div>
      </div>
      <table>
        <thead>
          <tr><th>Tanggal</th><th>Nasabah</th><th>Jenis Sampah</th><th>Berat</th><th>Status</th><th>Aksi</th></tr>
        </thead>
        <tbody>
          <tr>
            <td>24 Mei 2026, 10:20</td>
            <td><span class="avatar-chip" style="background:#cbd5e1;color:#334155">AS</span>Andi Setiawan</td>
            <td>Plastik PET</td><td>4.5 kg</td>
            <td><span class="status-pill status-success">Berhasil</span></td>
            <td>&#8942;</td>
          </tr>
          <tr>
            <td>24 Mei 2026, 09:45</td>
            <td><span class="avatar-chip" style="background:#f5c451;color:#5c4400">BR</span>Budi Raharjo</td>
            <td>Kertas Karton</td><td>12.0 kg</td>
            <td><span class="status-pill status-success">Berhasil</span></td>
            <td>&#8942;</td>
          </tr>
          <tr>
            <td>24 Mei 2026, 09:15</td>
            <td><span class="avatar-chip" style="background:#93e5c7;color:#065f34">CM</span>Citra Maudy</td>
            <td>Logam Besi</td><td>2.2 kg</td>
            <td><span class="status-pill status-warning">Diproses</span></td>
            <td>&#8942;</td>
          </tr>
          <tr>
            <td>24 Mei 2026, 08:30</td>
            <td><span class="avatar-chip" style="background:#4ade80;color:#06331d">DN</span>Deni Nugraha</td>
            <td>Plastik Campur</td><td>7.8 kg</td>
            <td><span class="status-pill status-success">Berhasil</span></td>
            <td>&#8942;</td>
          </tr>
          <tr>
            <td>23 Mei 2026, 16:50</td>
            <td><span class="avatar-chip" style="background:#fca5a5;color:#7f1d1d">EP</span>Eka Putri</td>
            <td>Kaca Bening</td><td>1.5 kg</td>
            <td><span class="status-pill status-danger">Dibatalkan</span></td>
            <td>&#8942;</td>
          </tr>
        </tbody>
      </table>
      <div class="table-footer">
        <span>Menampilkan 5 dari 452 transaksi</span>
        <div class="pagination">
          <button>&lt;</button><button class="active">1</button><button>2</button><button>3</button><button>&gt;</button>
        </div>
      </div>
    </div>

    <div class="dashboard-grid">
      <div class="card chart-card">
        <div class="chart-card-header">
          <h3>Grafik Pengumpulan Sampah</h3>
          <select class="select-range"><option>7 Hari Terakhir</option><option>30 Hari Terakhir</option></select>
        </div>
        <div class="bar-chart">
          <div class="bar-col"><div class="bar" style="height:60%"></div><span>Sen</span></div>
          <div class="bar-col"><div class="bar" style="height:40%"></div><span>Sel</span></div>
          <div class="bar-col"><div class="bar" style="height:78%"></div><span>Rab</span></div>
          <div class="bar-col"><div class="bar" style="height:65%"></div><span>Kam</span></div>
          <div class="bar-col"><div class="bar" style="height:95%"></div><span>Jum</span></div>
          <div class="bar-col"><div class="bar" style="height:48%"></div><span>Sab</span></div>
          <div class="bar-col"><div class="bar peak" style="height:82%"></div><span>Min</span></div>
        </div>
      </div>

      <div class="card quick-actions-card">
        <h3>Aksi Cepat</h3>
        <a href="nasabah.html" class="quick-action-btn">
          <span class="left"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="8" r="3.2"/><path d="M2.5 19c0-3.3 2.8-5.5 6.5-5.5"/><path d="M16 8h5M18.5 5.5v5"/></svg>Daftar Nasabah Baru</span>&rsaquo;
        </a>
        <a href="laporan.html" class="quick-action-btn">
          <span class="left"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9V3h9l3 3v3"/><rect x="4" y="9" width="16" height="8" rx="1"/><path d="M7 21h10v-4H7z"/></svg>Cetak Laporan Hari Ini</span>&rsaquo;
        </a>
        <a href="saldo-tabungan.html" class="quick-action-btn">
          <span class="left"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21V8l9-5 9 5v13"/><path d="M9 21v-6h6v6"/></svg>Rekap Kas Sampah</span>&rsaquo;
        </a>
        <div class="tips-box">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 8h.01"/><path d="M11 12h1v5h1"/></svg>
          <span><strong>Tips Admin:</strong> Pastikan timbangan dikalibrasi setiap pagi sebelum memulai operasional bank sampah.</span>
        </div>
      </div>
    </div>

  </main>
</div>
</body>
</html>
