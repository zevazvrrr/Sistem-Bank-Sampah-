<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        return view('home');
    }

    public function about() {
        return view('about');
    }

    public function service() {
        return view('service');
    }

    // Cara I, Langkah A
    public function setoran()
    {
        $dataSetoran = [
            ['id' => 'BS01', 'nasabah' => 'Budi Santoso', 'jenis' => 'Plastik PET', 'berat' => 12.5, 'status' => 'Terverifikasi'],
            ['id' => 'BS02', 'nasabah' => 'Siti Aminah', 'jenis' => 'Kertas Kardus', 'berat' => 8, 'status' => 'Menunggu'],
            ['id' => 'BS03', 'nasabah' => 'Andi Wijaya', 'jenis' => 'Kaleng Alumunium', 'berat' => 5.2, 'status' => 'Terverifikasi'],
        ];

        return view('setoran', compact('dataSetoran'));
    }

    // Cara I, Langkah E
    public function setoran_master()
    {
        $title = 'Setoran Bank Sampah';

        $dataSetoran = [
            ['id' => 'BS01', 'nasabah' => 'Budi Santoso', 'jenis' => 'Plastik PET', 'berat' => 12.5, 'status' => 'Terverifikasi'],
            ['id' => 'BS02', 'nasabah' => 'Siti Aminah', 'jenis' => 'Kertas Kardus', 'berat' => 8, 'status' => 'Menunggu'],
            ['id' => 'BS03', 'nasabah' => 'Andi Wijaya', 'jenis' => 'Kaleng Alumunium', 'berat' => 5.2, 'status' => 'Terverifikasi'],
        ];

        $content = view('setoran', compact('dataSetoran'))->render();

        return view('layouts.master', compact('title', 'content'));
    }

    // Cara II, Langkah B
    public function setoran2()
    {
        $title = 'Data Setoran Bank Sampah';

        $dataSetoran = [
            [
                'id' => 'BS01',
                'nasabah' => 'Budi Santoso',
                'status' => 'Terverifikasi',
                'item' => ['Botol Plastik', 'Gelas Plastik', 'Tutup Botol']
            ],
            [
                'id' => 'BS02',
                'nasabah' => 'Siti Aminah',
                'status' => 'Menunggu',
                'item' => ['Kardus']
            ],
            [
                'id' => 'BS03',
                'nasabah' => 'Andi Wijaya',
                'status' => 'Ditolak',
                'item' => ['Kaleng Aluminium', 'Besi Tua']
            ],
        ];

        return view('setoran2', compact('dataSetoran', 'title'));
    }
}