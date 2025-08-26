<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Models\DetailPesanan;

class PesananController extends Controller
{
    // Tampilkan semua pesanan
    public function index()
    {
        // Ambil semua pesanan + detail + barang
        $pesanan = Pesanan::with('detail.barang')->orderBy('created_at', 'desc')->get();
        return view('Pesanan.data-pesanan', compact('pesanan'));
    }

    // Form tambah pesanan
    public function create()
    {
        $barang = Barang::all(); // ambil semua barang
        return view('Pesanan.tambah-pesanan', compact('barang'));
    }

    // Simpan pesanan baru
    public function store(Request $request)
    {
        // Simpan pesanan utama
        $pesanan = Pesanan::create([
            'nama_pembeli' => $request->nama_pembeli,
            'total_harga'  => 0, // nanti dihitung ulang
            'status'       => 'menunggu',
        ]);

        $total = 0;

        // Simpan detail pesanan
        foreach ($request->barang_id as $i => $barangId) {
            $barang = Barang::find($barangId);
            $jumlah = $request->jumlah[$i];
            $subtotal = $barang->harga * $jumlah;

            DetailPesanan::create([
                'pesanan_id'       => $pesanan->id,
                'barang_id'        => $barangId,
                'jumlah'           => $jumlah,
                'harga_satuan'     => $barang->harga,
                'subtotal'         => $subtotal,
                'deskripsi_request'=> $request->deskripsi_request[$i] ?? null,
                'foto_request'     => $request->foto_request[$i] ?? null,
            ]);

            $total += $subtotal;
        }

        // Update total harga
        $pesanan->update(['total_harga' => $total]);

        return redirect()->route('data-pesanan')->with('success', 'Pesanan berhasil ditambahkan');
    }

    // Form edit pesanan
    public function edit($id)
    {
        $pesanan = Pesanan::with('detail')->findOrFail($id); // Ambil pesanan dengan detail
        $barang = Barang::all(); // Ambil semua barang

        return view('Pesanan.edit-pesanan', compact('pesanan', 'barang'));
    }

    // Update pesanan
    public function update(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);

        // Update data utama pesanan
        $pesanan->update([
            'nama_pembeli' => $request->nama_pembeli,
            'status'       => $request->status,
        ]);

        // Hapus detail lama
        DetailPesanan::where('pesanan_id', $id)->delete();

        $total = 0;

        // Simpan ulang detail
        foreach ($request->barang_id as $i => $barangId) {
            $barang = Barang::find($barangId);
            $jumlah = $request->jumlah[$i];
            $subtotal = $barang->harga * $jumlah;

            DetailPesanan::create([
                'pesanan_id'       => $id,
                'barang_id'        => $barangId,
                'jumlah'           => $jumlah,
                'harga_satuan'     => $barang->harga,
                'subtotal'         => $subtotal,
                'deskripsi_request'=> $request->deskripsi_request[$i] ?? null,
                'foto_request'     => $request->foto_request[$i] ?? null,
            ]);

            $total += $subtotal;
        }

        // Update total harga
        $pesanan->update(['total_harga' => $total]);

        return redirect()->route('data-barang')->with('success', 'Pesanan berhasil diupdate');
    }

    // Hapus pesanan
    public function destroy($id)
    {
        Pesanan::findOrFail($id)->delete();

        return redirect()->route('data-barang')->with('success', 'Pesanan berhasil dihapus');
    }

    // Update status pesanan (via AJAX / API)
    public function updateStatus(Request $request, $id)
    {
        try {
            $pesanan = Pesanan::findOrFail($id);
            $pesanan->status = $request->status;
            $pesanan->save();

            // Jika status selesai, stok barang dikurangi
            if ($request->status == 'selesai') {
                foreach ($pesanan->detail as $detail) {
                    $barang = $detail->barang;
                    if ($barang) {
                        $barang->stok -= $detail->jumlah;
                        $barang->save();
                    }
                }
            }

            return response()->json(['message' => 'Status pesanan berhasil diperbarui']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }
}
