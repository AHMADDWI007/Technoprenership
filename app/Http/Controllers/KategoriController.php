<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $kategori = Kategori::when($request->search, function($query) use ($request) {
            return $query->where('nama', 'like', '%'.$request->search.'%');
        })->paginate(10); // Menambahkan paginasi untuk mempercepat pencarian data

        return view('Kategori.data-kategori', compact('kategori'));
    }

    public function create()
    {
        return view('Kategori.create-kategori');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Kategori::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('data-kategori')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('Kategori.edit-kategori', compact('kategori'));
    }

    // Memperbarui kategori
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('data-kategori')->with('success', 'Kategori berhasil diperbarui.');
    }

    // Menghapus kategori
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('data-kategori')->with('success', 'Kategori berhasil dihapus.');
    }
}
