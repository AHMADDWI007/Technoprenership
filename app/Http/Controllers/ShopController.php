<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $kategori = Kategori::all();
        $query = Barang::with('kategori');

        if ($request->kategori) {
            $query->where('kategori_id', $request->kategori);
        }

        $produk = $query->paginate(9);

        if ($request->ajax()) {
            return response()->json([
                'products'   => view('HalamanUser.partials.product-list', compact('produk'))->render(),
                'pagination' => $produk->withQueryString()->links('pagination::bootstrap-4')->toHtml(),
            ]);
        }

        return view('HalamanUser.shop-user', compact('produk', 'kategori'));
    }

    public function filter(Request $request)
    {
        $query = Barang::query();

        if ($request->kategori) {
            $query->where('kategori_id', $request->kategori);
        }

        $produk = $query->paginate(9);

        return response()->json([
            'products'   => view('HalamanUser.partials.product-list', compact('produk'))->render(),
            'pagination' => $produk->withQueryString()->links('pagination::bootstrap-4')->toHtml(),
        ]);
    }
}