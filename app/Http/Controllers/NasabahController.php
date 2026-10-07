<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use Illuminate\Http\Request;

class NasabahController extends Controller
{
    // 1. Tampilkan data nasabah + Fitur Filter & Search
    public function index(Request $request)
    {
        $query = Nasabah::query();

        // Filter berdasarkan Status (Aktif / Tidak Aktif)
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Search berdasarkan Nama atau No Telp
        if ($request->has('search') && $request->search != '') {
            $query->where(function($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('no_telp', 'like', '%' . $request->search . '%');
            });
        }

        // Paginasi 5 data per halaman
        $nasabah = $query->orderBy('id_nasabah', 'desc')->paginate(5);

        return view('kelola_nasabah', compact('nasabah'));
    }

    // 2. Tambah Nasabah Baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'no_telp' => 'required|string|max:20',
            'alamat' => 'nullable|string|max:255',
        ]);

        Nasabah::create([
            'nama' => $request->nama,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'status' => 'aktif',
        ]);

        return redirect()->back()->with('success', 'Nasabah berhasil ditambahkan!');
    }

    // 3. Ubah Status Nasabah (Aktif / Tidak Aktif)
    public function updateStatus($id, $status)
    {
        $nasabah = Nasabah::findOrFail($id);
        $nasabah->update(['status' => $status]);

        return redirect()->back()->with('success', 'Status nasabah berhasil diperbarui!');
    }

    // 4. Hapus Nasabah
    public function destroy($id)
    {
        $nasabah = Nasabah::findOrFail($id);
        $nasabah->delete();

        return redirect()->back()->with('success', 'Data nasabah berhasil dihapus!');
    }
}