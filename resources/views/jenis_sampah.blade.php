
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Jenis Sampah - Bank Sampah</title>

    <link rel="stylesheet" href="{{ asset('jenis_sampah.css') }}">
</head>
<body>

<div class="app">

    @include('partials.nav')

    @include('partials.header')

    <main class="main-content">

        <div class="breadcrumb">
            Admin / <span class="current">Kelola Jenis Sampah</span>
        </div>

        <div class="page-header">
            <div>
                <h1>Kelola Jenis Sampah</h1>
                <p class="subtitle">Manage waste categories and their respective market values per kilogram.</p>
            </div>

            <button class="btn btn-primary">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5">
                    <path d="M12 5v14M5 12h14"/>
                </svg>
                Tambah Jenis
            </button>
        </div>

        <div class="stat-grid">

            <div class="stat-card">
                <div class="stat-label">Total Kategori</div>
                <div class="stat-value">12 Jenis</div>
                <div class="stat-sub-line green">&#8599; 2 baru ditambahkan bulan ini</div>
            </div>

            <div class="stat-card">
                <div class="stat-label">Harga Rata-rata/kg</div>
                <div class="stat-value">Rp 4.250</div>
                <div class="stat-sub-line">&#128337; Update terakhir: 2 hari lalu</div>
            </div>

            <div class="stat-card">
                <div class="stat-label">Komoditas Terpopuler</div>
                <div class="stat-value">Botol PET</div>
                <div class="stat-sub-line">34% dari total volume sampah</div>
            </div>

        </div>

        <div class="card table-card">

            <div class="jenis-header">
                <span>DAFTAR JENIS SAMPAH</span>

                <div class="header-icons">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 5h18M6 12h12M10 19h4"/>
                    </svg>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 3v12"/>
                        <path d="m7 10 5 5 5-5"/>
                        <path d="M4 21h16"/>
                    </svg>
                </div>
            </div>

            <div class="jenis-row">
                <div class="jenis-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M7 3 3 7l4 4"/>
                        <path d="M3 7h11a5 5 0 0 1 5 5v1"/>
                        <path d="m17 21 4-4-4-4"/>
                        <path d="M21 17H10a5 5 0 0 1-5-5v-1"/>
                    </svg>
                </div>
                <div class="jenis-name-col">Plastik (PET)</div>
                <div class="jenis-kat-col"><span class="kategori-badge">Plastik</span></div>
                <div class="jenis-harga-col">Rp 3.500</div>
                <div class="jenis-aksi-col">
                    <button class="icon-action edit">✎</button>
                    <button class="icon-action delete">⌫</button>
                </div>
            </div>

            <div class="jenis-row">
                <div class="jenis-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 2.5h8l4.5 4.5V21a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1Z"/>
                        <path d="M9 13h6M9 17h6"/>
                    </svg>
                </div>
                <div class="jenis-name-col">Kertas Karton / Kardus</div>
                <div class="jenis-kat-col"><span class="kategori-badge">Kertas</span></div>
                <div class="jenis-harga-col">Rp 2.200</div>
                <div class="jenis-aksi-col">
                    <button class="icon-action edit">✎</button>
                    <button class="icon-action delete">⌫</button>
                </div>
            </div>

            <div class="jenis-row">
                <div class="jenis-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="6" y="3" width="12" height="18" rx="2"/>
                        <path d="M9 8h6M9 12h6"/>
                    </svg>
                </div>
                <div class="jenis-name-col">Logam Aluminium</div>
                <div class="jenis-kat-col"><span class="kategori-badge">Logam</span></div>
                <div class="jenis-harga-col">Rp 12.000</div>
                <div class="jenis-aksi-col">
                    <button class="icon-action edit">✎</button>
                    <button class="icon-action delete">⌫</button>
                </div>
            </div>

            <div class="jenis-row">
                <div class="jenis-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 2h6l1 6-3 3v9a1 1 0 0 1-2 0v-9L8 8Z"/>
                    </svg>
                </div>
                <div class="jenis-name-col">Kaca Botol (Bening)</div>
                <div class="jenis-kat-col"><span class="kategori-badge">Kaca</span></div>
                <div class="jenis-harga-col">Rp 800</div>
                <div class="jenis-aksi-col">
                    <button class="icon-action edit">✎</button>
                    <button class="icon-action delete">⌫</button>
                </div>
            </div>

            <div class="table-footer">
                <span>Showing 4 of 12 waste types</span>

                <div class="pagination">
                    <span style="margin-right:8px">Previous</span>
                    <button class="active">1</button>
                    <button>2</button>
                    <button>3</button>
                    <span style="margin-left:8px">Next</span>
                </div>
            </div>

        </div>

    </main>

</div>

</body>
</html>
