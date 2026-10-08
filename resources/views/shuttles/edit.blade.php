<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Shuttle</title>
</head>
<body>
    <h1>Edit Armada Shuttle</h1>

    <!-- Form Edit Data -->
    <form action="{{ route('shuttles.update', $shuttle->id) }}" method="POST">
        @csrf
        @method('PUT') {{-- Method Spoofing untuk HTTP PUT --}}

        <div>
            <label for="nama_armada">Nama Armada:</label><br>
            <input type="text" name="nama_armada" id="nama_armada" value="{{ $shuttle->nama_armada }}" required>
        </div>
        <br>
        <div>
            <label for="kapasitas">Kapasitas (Orang):</label><br>
            <input type="number" name="kapasitas" id="kapasitas" value="{{ $shuttle->kapasitas }}" min="1" required>
        </div>
        <br>
        <div>
            <label for="rute_operasional">Rute Operasional:</label><br>
            <input type="text" name="rute_operasional" id="rute_operasional" value="{{ $shuttle->rute_operasional }}">
        </div>
        <br>
        <div>
            <label for="status_aktif">Status Aktif:</label><br>
            <select name="status_aktif" id="status_aktif" required>
                <option value="1" {{ $shuttle->status_aktif == 1 ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ $shuttle->status_aktif == 0 ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>
        <br>
        <button type="submit">Update</button>
    </form>
    <br>
    <a href="{{ route('shuttles.index') }}">&larr; Batal & Kembali</a>
</body>
</html>