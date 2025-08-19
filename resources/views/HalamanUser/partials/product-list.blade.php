@forelse($produk as $p)
<div class="col-lg-4 col-md-6 text-center">
  <div class="single-product-item">
    <div class="product-image">
      <a href="#"><img src="{{ asset('storage/'.$p->gambar) }}" alt="{{ $p->nama }}"></a>
    </div>
    <h3>{{ $p->nama }}</h3>
    <p class="product-price"><span>Per Pcs</span> Rp {{ number_format($p->harga,0,',','.') }}</p>
    <form action="{{ route('cart.add', $p->id) }}" method="POST" class="add-to-cart-form">
    @csrf
    <button type="submit" class="cart-btn-custom">
        <i class="fas fa-shopping-cart"></i> Add to Cart
    </button>
    </form>
  </div>
</div>
@empty
<div class="col-12 text-center">
  <p>Produk belum tersedia.</p>
</div>
@endforelse