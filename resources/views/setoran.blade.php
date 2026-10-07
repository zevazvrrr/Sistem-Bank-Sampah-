<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID Setoran</th>
            <th>Nama Nasabah</th>
            <th>Jenis Sampah</th>
            <th>Berat (kg)</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <!-- Menggunakan Blade Foreach -->
        @foreach ($dataSetoran as $setoran)
        <tr>
            <td>{{ $setoran['id'] }}</td>
            <td>{{ $setoran['nasabah'] }}</td>
            <td>{{ $setoran['jenis'] }}</td>
            <td>{{ $setoran['berat'] }}</td>
            <td>
                <!-- Menggunakan Blade If-Else untuk kondisional -->
                @if($setoran['status'] == 'Terverifikasi')
                    <span style="color: green; font-weight: bold;">{{ $setoran['status'] }}</span>
                @else
                    <span style="color: red; text-decoration: line-through;">{{ $setoran['status'] }}</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>