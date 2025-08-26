<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    // Menampilkan daftar kategori dengan fitur pencarian + paginasi
    public function index(Request $request)
    {
        $kategori = Kategori::when($request->search, function($query) use ($request) {
            return $query->where('nama', 'like', '%'.$request->search.'%');
        })->paginate(10); // Menambahkan paginasi untuk mempercepat pencarian data

        return view('Kategori.data-kategori', compact('kategori'));
    }

    // Menampilkan form untuk membuat kategori baru
    public function create()
    {
        return view('Kategori.create-kategori');
    }

    // Menyimpan kategori baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        // Simpan data kategori
        Kategori::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('data-kategori')->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Menampilkan form edit kategori
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id); // Cari kategori berdasarkan ID
        return view('Kategori.edit-kategori', compact('kategori'));
    }

    // Memperbarui kategori
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $kategori = Kategori::findOrFail($id); // Cari kategori berdasarkan ID

        // Update data kategori
        $kategori->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('data-kategori')->with('success', 'Kategori berhasil diperbarui.');
    }

    // Menghapus kategori
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id); // Cari kategori berdasarkan ID
        $kategori->delete(); // Hapus kategori

        return redirect()->route('data-kategori')->with('success', 'Kategori berhasil dihapus.');
    }
}
