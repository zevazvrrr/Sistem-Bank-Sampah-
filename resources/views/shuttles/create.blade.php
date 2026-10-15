    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <title>Tambah Shuttle</title>
    </head>
    <body>
        <h1>Tambah Armada Shuttle</h1>

        <!-- Form Tambah Data -->
        <form action="{{ route('shuttles.store') }}" method="POST" novalidate>
            @csrf {{-- Wajib: Proteksi CSRF --}}

            <div>
                <label for="nama_armada">Nama Armada:</label><br>
                <input type="text" name="nama_armada" id="nama_armada" required>
                @error('nama_armada') <span style="color: red;">{{ $message }}</span> @enderror
            </div>
            <br>
            <div>
                <label for="kapasitas">Kapasitas (Orang):</label><br>
                <input type="number" name="kapasitas" id="kapasitas" min="1" required>
                @error('kapasitas') <span style="color: red;">{{ $message }}</span> @enderror
            </div>
            <br>
            <div>
                <label for="rute_operasional">Rute Operasional:</label><br>
                <input type="text" name="rute_operasional" id="rute_operasional" placeholder="Contoh: Kampus A - Kampus B">
                @error('rute_operasional') <span style="color: red;">{{ $message }}</span> @enderror
            </div>
            <br>
            <div>
                <label for="status_aktif">Status Aktif:</label><br>
                <select name="status_aktif" id="status_aktif" required>
                    <option value="1" {{ old('status_aktif') == '1' ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ old('status_aktif') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>
            <br>
            <button type="submit">Simpan</button>
        </form>
        <br>
        <a href="{{ route('shuttles.index') }}">&larr; Kembali ke Daftar</a>
    </body>
    </html>