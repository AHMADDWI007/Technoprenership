<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Menampilkan semua data barang dengan pagination 10 per halaman
     */
    public function index()
    {
        $barang = Barang::latest()->paginate(10);
        return view('Menu.data-barang', compact('barang'));
    }

    /**
     * Menampilkan form untuk menambahkan barang baru
     */
    public function create()
    {
        $kategori = Kategori::all(); // ambil semua data kategori
        return view('Menu.create-barang', compact('kategori'));
    }

    /**
     * Menyimpan barang baru ke database
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga'       => 'required|numeric',
            'deskripsi'   => 'nullable|string',
            'kategori_id' => 'required|exists:kategori,id', // ✅
            'stok'        => 'required|integer',
            'gambar'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Upload gambar jika ada
        $gambarPath = $request->hasFile('gambar') 
            ? $request->file('gambar')->store('uploads', 'public') 
            : null;

        // Simpan data barang
        Barang::create([
            'nama_produk' => $request->nama_produk,
            'harga'       => $request->harga,
            'deskripsi'   => $request->deskripsi,
            'kategori_id' => $request->kategori_id, // ✅
            'stok'        => $request->stok,
            'gambar'      => $gambarPath
        ]);

        return redirect()->route('data-barang')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit barang
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategori = Kategori::all(); // ✅
        return view('Menu.edit-barang', compact('barang', 'kategori'));
    }

    /**
     * Memperbarui data barang
     */
    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        // Validasi input
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga'       => 'required|numeric',
            'deskripsi'   => 'nullable|string',
            'kategori_id' => 'required|exists:kategori,id', // ✅ konsisten
            'stok'        => 'required|integer',
            'gambar'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $gambarPath = $barang->gambar;

        // Jika ada gambar baru, hapus gambar lama dan upload gambar baru
        if ($request->hasFile('gambar')) {
            if ($gambarPath && Storage::disk('public')->exists($gambarPath)) {
                Storage::disk('public')->delete($gambarPath);
            }
            $gambarPath = $request->file('gambar')->store('uploads', 'public');
        }

        // Update data barang
        $barang->update([
            'nama_produk' => $request->nama_produk,
            'harga'       => $request->harga,
            'deskripsi'   => $request->deskripsi,
            'kategori_id' => $request->kategori_id, // ✅
            'stok'        => $request->stok,
            'gambar'      => $gambarPath
        ]);

        return redirect()->route('data-barang')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Menghapus barang beserta gambarnya dari storage
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);

        // Hapus gambar jika ada
        if ($barang->gambar && Storage::disk('public')->exists($barang->gambar)) {
            Storage::disk('public')->delete($barang->gambar);
        }

        $barang->delete();

        return redirect()->route('data-barang')->with('success', 'Produk berhasil dihapus.');
    }
}
