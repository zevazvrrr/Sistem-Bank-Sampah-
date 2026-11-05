<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Armada Shuttle</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #333;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h2>Laporan Data Armada Shuttle</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Armada</th>
                <th>Kapasitas</th>
                <th>Rute Operasional</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shuttles as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->nama_armada }}</td>
                <td>{{ $item->kapasitas }} Kursi</td>
                <td>{{ $item->rute_operasional }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>