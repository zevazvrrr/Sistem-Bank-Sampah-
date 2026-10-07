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

    {{-- Notifikasi Sukses --}}
        @if (session('success'))
            <div style="background-color: #d1e7dd; color: #0f5132; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-weight: 500;">
                {{ session('success') }}
            </div>
        @endif
        <div class="breadcrumb">
            Beranda / <span class="current">Kelola Nasabah</span>
        </div>

        <div class="page-header">
            <div>
                <h1>Kelola Nasabah</h1>
            </div>

            <button class="btn btn-primary" onclick="document.getElementById('modalTambah').style.display='flex'">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5">
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
                    <form action="{{ route('nasabah.index') }}" method="GET" style="display: flex; gap: 8px;">
                        <select name="status" onchange="this.form.submit()" class="btn btn-outline" style="padding: 6px 12px; cursor: pointer;">
                            <option value="">Semua Status</option>
                            <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="tidak_aktif" {{ request('status') == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                    </form>
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
                    @forelse ($nasabah as $index => $item)
                        <tr>
                            <td>{{ $nasabah->firstItem() + $index }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->no_telp ?? '-' }}</td>
                            <td>{{ $item->alamat ?? '-' }}</td>
                            <td>{{ $item->created_at ? $item->created_at->translatedFormat('d M Y') : '-' }}</td>
                            <td>
                                <span class="status-pill {{ $item->status == 'aktif' ? 'status-success' : 'status-warning' }}">
                                    {{ $item->status == 'aktif' ? 'Aktif' : 'Tidak Aktif' }}
                                </span>
                            </td>
                            <td>
                                {{-- Dropdown Aksi Titik 3 --}}
                                <div style="position: relative; display: inline-block;">
                                    <button onclick="toggleDropdown({{ $item->id_nasabah }})" style="background: none; border: none; cursor: pointer; font-size: 18px; font-weight: bold;">&#8942;</button>
                                    
                                    <div id="dropdown-{{ $item->id_nasabah }}" style="display: none; position: absolute; right: 0; top: 100%; background: #fff; box-shadow: 0 4px 12px rgba(0,0,0,0.15); border-radius: 8px; z-index: 100; min-width: 150px; padding: 6px 0; text-align: left;">
                                        @if($item->status != 'aktif')
                                            <form action="{{ route('nasabah.updateStatus', ['id' => $item->id_nasabah, 'status' => 'aktif']) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" style="width: 100%; text-align: left; padding: 8px 16px; background: none; border: none; color: #198754; cursor: pointer;">Ubah ke Aktif</button>
                                            </form>
                                        @endif

                                        @if($item->status != 'tidak_aktif')
                                            <form action="{{ route('nasabah.updateStatus', ['id' => $item->id_nasabah, 'status' => 'tidak_aktif']) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" style="width: 100%; text-align: left; padding: 8px 16px; background: none; border: none; color: #ffc107; cursor: pointer;">Ubah ke Tidak Aktif</button>
                                            </form>
                                        @endif

                                        <hr style="margin: 4px 0; border: none; border-top: 1px solid #eee;">

                                        <form action="{{ route('nasabah.destroy', $item->id_nasabah) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus nasabah ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="width: 100%; text-align: left; padding: 8px 16px; background: none; border: none; color: #dc3545; cursor: pointer;">Hapus Nasabah</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align: center; padding: 20px;">Data nasabah belum tersedia.</td>
                        </tr>
                    @endforelse

                </tbody>

            </table>


            <div class="table-footer">

                <span>
                    Menampilkan {{ $nasabah->firstItem() ?? 0 }} dari {{ $nasabah->total() }} nasabah
                </span>

                <div>
                    {{ $nasabah->links() }}
                </div>

            </div>

        </div>

    </main>

</div>
    <!-- Pop-up Modal Tambah Nasabah -->
    <div id="modalTambah" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); justify-content: center; align-items: center; z-index: 1000;">
        <div style="background: white; padding: 24px; border-radius: 12px; width: 400px; box-shadow: 0 4px 20px rgba(0,0,0,0.2);">
            <h3 style="margin-top: 0; margin-bottom: 16px;">Tambah Nasabah Baru</h3>
            
            <form action="{{ route('nasabah.store') }}" method="POST">
                @csrf
                <div style="margin-bottom: 12px;">
                    <label style="display: block; margin-bottom: 4px; font-weight: 500;">Nama Nasabah</label>
                    <input type="text" name="nama" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;" required>
                </div>

                <div style="margin-bottom: 12px;">
                    <label style="display: block; margin-bottom: 4px; font-weight: 500;">No. Telepon</label>
                    <input type="text" name="no_telp" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;" required>
                </div>

                <div style="margin-bottom: 16px;">
                    <label style="display: block; margin-bottom: 4px; font-weight: 500;">Alamat</label>
                    <textarea name="alamat" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;" rows="3"></textarea>
                </div>

                <div style="display: flex; justify-content: flex-end; gap: 8px;">
                    <button type="button" class="btn btn-outline" onclick="document.getElementById('modalTambah').style.display='none'">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleDropdown(id) {
            var el = document.getElementById('dropdown-' + id);
            var isVisible = el.style.display === 'block';
            
            // Sembunyikan dropdown lain yang terbuka
            document.querySelectorAll('[id^="dropdown-"]').forEach(d => d.style.display = 'none');
            
            if (!isVisible) {
                el.style.display = 'block';
            }
        }

        // Tutup dropdown jika klik di luar area
        window.onclick = function(event) {
            if (!event.target.matches('button') || event.target.innerHTML !== '⋮') {
                document.querySelectorAll('[id^="dropdown-"]').forEach(d => d.style.display = 'none');
            }
        }
    </script>
</body>
</html>
```
