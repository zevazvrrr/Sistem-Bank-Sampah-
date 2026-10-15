@extends('layouts.master2')

@section('title', $title)

@section('content')
    <h3>{{ $title }}</h3>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Setoran</th>
                <th>Nama Nasabah</th>
                <th>Item Sampah (Nested Loop)</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dataSetoran as $setoran)
            <tr>
                <!-- Menggunakan built-in variable $loop -->
                <td>{{ $loop->iteration }}</td>
                <td>{{ $setoran['id'] }}</td>
                <td>{{ $setoran['nasabah'] }}</td>

                <!-- Nested Loop untuk Sub-Array -->
                <td>
                    <ul>
                    @foreach($setoran['item'] as $barang)
                        <li>{{ $barang }}</li>
                    @endforeach
                    </ul>
                </td>

                <td>
                    <!-- Kondisional Bertingkat menggunakan Switch -->
                    @switch($setoran['status'])
                        @case('Terverifikasi')
                            <span style="color: green;">✔ {{ $setoran['status'] }}</span>
                            @break
                        @case('Menunggu')
                            <span style="color: orange;">⚙ {{ $setoran['status'] }}</span>
                            @break
                        @default
                            <span style="color: red;">✖ {{ $setoran['status'] }} (Ditolak)</span>
                    @endswitch
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center;">Tidak ada data setoran saat ini.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection