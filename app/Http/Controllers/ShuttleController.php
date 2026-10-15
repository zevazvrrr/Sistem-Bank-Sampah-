<?php

namespace App\Http\Controllers;

use App\Models\Shuttle;
use Illuminate\Http\Request;

class ShuttleController extends Controller
{
    public function index(Request $request)
    {
        $shuttles = Shuttle::when($request->search, function ($query, $search) {
            return $query->where('nama_armada', 'like', "%{$search}%");
        })->get();

        return view('shuttles.index', compact('shuttles'));
    }

    public function create()
    {
        return view('shuttles.create');
    }

    /**
     * Menyimpan data armada shuttle baru ke dalam pangkalan data.
     * Memvalidasi input sebelum operasi penyimpanan dilakukan.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_armada' => 'required|string|max:50',
            'kapasitas' => 'required|numeric|min:10|max:60',
            'rute_operasional' => 'required|string'
        ]);

        Shuttle::create($request->all());
        
        return redirect()->route('shuttles.index')->with('success', 'Data armada berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $shuttle = Shuttle::findOrFail($id);
        return view('shuttles.edit', compact('shuttle'));
    }

    /**
     * Memperbarui data armada shuttle di dalam pangkalan data.
     * Memvalidasi input sebelum operasi pembaruan dilakukan.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_armada' => 'required|string|max:50',
            'kapasitas' => 'required|numeric|min:10|max:60',
            'rute_operasional' => 'required|string'
        ]);

        $shuttle = Shuttle::findOrFail($id);
        $shuttle->update($request->all());
        
        return redirect()->route('shuttles.index')->with('success', 'Data armada berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $shuttle = Shuttle::findOrFail($id);
        $shuttle->delete();
        return redirect()->route('shuttles.index');
    }
}