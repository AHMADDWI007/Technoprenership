<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('HalamanUser.cart-user', compact('cart'));
    }

    public function add($id, Request $request)
    {
        $barang = Barang::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $barang->nama_produk,
                "price" => (float) $barang->harga,
                "quantity" => 1,
                "image" => $barang->gambar,
                "uploads" => [],
                "description" => ""
            ];
        }

        session()->put('cart', $cart);

    // Hitung total item (jumlah semua quantity)
    $count = collect($cart)->sum('quantity');

    // 👉 Kalau AJAX, balikin JSON
    if ($request->ajax()) {
        return response()->json([
            'success' => true,
            'count' => $count
        ]);
    }

    // 👉 Kalau bukan AJAX, redirect biasa
    return redirect()->route('cart-user')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function update($id, Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            // ✅ Update Quantity (Jika ini adalah request AJAX dari input quantity)
            // Logika ini hanya akan dijalankan jika ada field 'quantity' di request, biasanya via AJAX
            if ($request->has('quantity')) {
                 $cart[$id]['quantity'] = max(1, intval($request->quantity));
            }


            // ✅ Upload Foto (hanya kalau bukan AJAX, karena form ini menangani file upload)
            if (!$request->ajax() && $request->hasFile('uploads')) {
                foreach ($request->file('uploads') as $file) {
                    $path = $file->store('cart_uploads', 'public');
                    $cart[$id]['uploads'][] = $path;
                }
            }

            // ⭐ PERBAIKAN INTI: Update Deskripsi (hanya kalau bukan AJAX) ⭐
            // Kita gunakan $request->has('description') untuk memastikan field dikirim
            // dan kita simpan nilainya, baik itu terisi (string) atau kosong ('').
            if (!$request->ajax() && $request->has('description')) {
                $cart[$id]['description'] = $request->description;
            }
        }

        session()->put('cart', $cart);

        // ✅ Hitung ulang total (logika ini harus dieksekusi baik dari AJAX quantity atau POST form)
        $itemTotal = (float)$cart[$id]['price'] * (int)$cart[$id]['quantity'];
        $subtotal = collect($cart)->sum(fn($c) => (float)$c['price'] * (int)$c['quantity']);

        // ✅ Kalau request dari AJAX (biasanya hanya untuk update quantity) → kirim JSON
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'itemTotal' => $itemTotal,
                'subtotal' => $subtotal
            ]);
        }

        // ✅ Kalau bukan AJAX → redirect biasa (setelah update deskripsi/foto)
        return redirect()->route('cart-user')->with('success', 'Keranjang berhasil diperbarui!');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart-user')->with('success', 'Produk berhasil dihapus dari keranjang!');
    }

    public function checkout()
{
    $cart = session()->get('cart', []);
    $subtotal = collect($cart)->sum(fn($c) => (float)$c['price'] * (int)$c['quantity']);
    
    return view('HalamanUser.checkout-user', compact('cart', 'subtotal'));
}

}