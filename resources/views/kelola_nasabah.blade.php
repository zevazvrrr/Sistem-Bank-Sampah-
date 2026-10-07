```blade
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelola Nasabah - Bank Sampah</title>

    <link rel="stylesheet" href="{{ asset('kelola_nasabah.css') }}">
</head>

<body>

<div class="app">

    {{-- NAV --}}
    @include('partials.nav')

    {{-- HEADER --}}
    @include('partials.header')


    {{-- CONTENT NASABAH --}}
    <main class="main-content">

        <div class="breadcrumb">
            Beranda / <span class="current">Kelola Nasabah</span>
        </div>

        <div class="page-header">
            <div>
                <h1>Kelola Nasabah</h1>
            </div>

            <button class="btn btn-primary">
                <svg width="16" height="16"
                     viewBox="0 0 24 24"
                     fill="none"
                     stroke="white"
                     stroke-width="2.5">
                    <path d="M12 5v14"/>
                    <path d="M5 12h14"/>
                </svg>
                Tambah Nasabah
            </button>
        </div>


        <div class="card table-card">

            <div class="table-card-header">
                <h3>Data Nasabah</h3>

                <div class="actions">
                    <button class="btn btn-outline">
                        <svg width="15" height="15"
                             viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2">
                            <path d="M3 5h18"/>
                            <path d="M6 12h12"/>
                            <path d="M10 19h4"/>
                        </svg>
                        Filter
                    </button>
                </div>
            </div>


            <table>

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Nasabah</th>
                        <th>No. Telepon</th>
                        <th>Alamat</th>
                        <th>Tanggal Daftar</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td>1</td>
                        <td>Andi Setiawan</td>
                        <td>081234567890</td>
                        <td>Jl. Mawar No. 10</td>
                        <td>20 Mei 2026</td>
                        <td>
                            <span class="status-pill status-success">
                                Aktif
                            </span>
                        </td>
                        <td>&#8942;</td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>Budi Raharjo</td>
                        <td>081234567891</td>
                        <td>Jl. Melati No. 15</td>
                        <td>21 Mei 2026</td>
                        <td>
                            <span class="status-pill status-success">
                                Aktif
                            </span>
                        </td>
                        <td>&#8942;</td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>Citra Maudy</td>
                        <td>081234567892</td>
                        <td>Jl. Kenanga No. 8</td>
                        <td>22 Mei 2026</td>
                        <td>
                            <span class="status-pill status-success">
                                Aktif
                            </span>
                        </td>
                        <td>&#8942;</td>
                    </tr>

                    <tr>
                        <td>4</td>
                        <td>Deni Nugraha</td>
                        <td>081234567893</td>
                        <td>Jl. Anggrek No. 12</td>
                        <td>23 Mei 2026</td>
                        <td>
                            <span class="status-pill status-success">
                                Aktif
                            </span>
                        </td>
                        <td>&#8942;</td>
                    </tr>

                    <tr>
                        <td>5</td>
                        <td>Eka Putri</td>
                        <td>081234567894</td>
                        <td>Jl. Dahlia No. 5</td>
                        <td>24 Mei 2026</td>
                        <td>
                            <span class="status-pill status-warning">
                                Tidak Aktif
                            </span>
                        </td>
                        <td>&#8942;</td>
                    </tr>

                </tbody>

            </table>


            <div class="table-footer">

                <span>
                    Menampilkan 5 dari 284 nasabah
                </span>

                <div class="pagination">
                    <button>&lt;</button>
                    <button class="active">1</button>
                    <button>2</button>
                    <button>3</button>
                    <button>&gt;</button>
                </div>

            </div>

        </div>

    </main>

</div>

</body>
</html>
```
