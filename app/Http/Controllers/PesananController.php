<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Models\DetailPesanan;
use Illuminate\Support\Facades\DB; // Untuk database transaction

class PesananController extends Controller
{
    // ⭐ FUNGSI 1: TAMPILKAN SEMUA PESANAN (INDEX) ⭐
    // Digunakan untuk menampilkan daftar pesanan (biasanya di sisi Admin)
    public function index()
    {
        // Ambil semua pesanan, termasuk detail pesanan dan informasi barang terkait
        $pesanan = Pesanan::with('detail.barang')->orderBy('created_at', 'desc')->get();
        // Ganti 'Pesanan.data-pesanan' dengan nama view yang sesuai di project Anda
        return view('Pesanan.data-pesanan', compact('pesanan'));
    }

    // FUNGSI CRUD ADMIN LAINNYA (create, store, edit, update, destroy) DIHAPUS

    // ⭐ FUNGSI 2: PROSES CHECKOUT PENGGUNA (MEMBUAT PESANAN BARU) ⭐
    public function processCheckout(Request $request)
    {
        // 1. Ambil data dari request & session
        $nama_pembeli = $request->input('name');
        $nomor_hp = $request->input('phone');
        $metode_bayar = $request->input('payment');
        
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart-user')->with('error', 'Keranjang Anda kosong, tidak dapat membuat pesanan.');
        }

        $total_harga = collect($cart)->sum(fn($c) => (float)$c['price'] * (int)$c['quantity']);

        DB::beginTransaction();

        try {
            // 2. Simpan ke tabel 'pesanan' (Data Header)
            $pesanan = Pesanan::create([
                'nama_pembeli'     => $nama_pembeli,
                'nomor_hp'         => $nomor_hp,       
                'metode_bayar'     => $metode_bayar,   
                'catatan_opsional' => "Pesanan dibuat melalui website.", 
                'total_harga'      => $total_harga,
                'status'           => 'menunggu',     
            ]);

            // 3. Simpan detail pesanan (Data Baris Item)
            foreach ($cart as $barang_id => $item) {
                // ⭐ PERBAIKAN PENGAMBILAN DATA CUSTOM DARI ARRAY $item ⭐
                
                $deskripsi = $item['description'] ?? null;
                // Pastikan $item['uploads'] adalah array, lalu encode menjadi string JSON
                $uploads = $item['uploads'] ?? [];
                $foto_request_path = json_encode($uploads); 

                DetailPesanan::create([
                    'pesanan_id'        => $pesanan->id,
                    'barang_id'         => $barang_id, 
                    'jumlah'            => $item['quantity'],
                    'harga_satuan'      => $item['price'],
                    'subtotal'          => (float)$item['price'] * (int)$item['quantity'],
                    
                    // ⭐ Menggunakan variabel yang sudah dipastikan ketersediaannya (null jika kosong)
                    'deskripsi_request' => $deskripsi, 
                    'foto_request'      => $foto_request_path,
                ]);
            }
            // ... (lanjutan logika commit dan redirect)
            session()->forget('cart');
            DB::commit();

            return redirect()->route('konfirmasi-pembayaran')->with([
                'success' => 'Pesanan Anda berhasil dibuat! Segera lakukan pembayaran.',
                'nama' => $nama_pembeli,
                'phone' => $nomor_hp,
                'payment' => $metode_bayar,
                'pesanan_id' => $pesanan->id
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('cart-user')->with('error', 'Gagal memproses pesanan: ' . $e->getMessage());
        }
    }
    
    // ⭐ FUNGSI 3: UPDATE STATUS PESANAN (Fungsi Admin) ⭐
    public function updateStatus(Request $request, $id)
    {
        try {
            $pesanan = Pesanan::findOrFail($id);
            $pesanan->status = $request->status;
            $pesanan->save();

            // Logika opsional: Jika status selesai, stok barang dikurangi
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