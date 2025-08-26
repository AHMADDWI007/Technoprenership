$(document).ready(function () {
  const filterUrl = $('meta[name="shop-filter-url"]').attr('content');

  function animateChange(callback) {
    // Animasi keluar (zoom out + fade)
    $('#product-container, #pagination-container').css({
      transform: 'scale(0.95) translateY(20px)',
      opacity: 0,
      transition: 'all 0.4s ease'
    });

    setTimeout(() => {
      callback(); // ganti konten
      // Animasi masuk (zoom in + fade)
      $('#product-container, #pagination-container').css({
        transform: 'scale(1) translateY(0)',
        opacity: 1,
        transition: 'all 0.4s ease'
      });
    }, 400); // tunggu keluar selesai
  }

  // klik kategori
  $('#kategori-filter').on('click', 'li', function () {
    let kategoriId = $(this).data('kategori');

    $('#kategori-filter li').removeClass('active');
    $(this).addClass('active');

    animateChange(function () {
      $.ajax({
        url: filterUrl,
        type: 'GET',
        data: { kategori: kategoriId },
        success: function (response) {
          $('#product-container').html(response.products);
          $('#pagination-container').html(response.pagination);
          window.history.replaceState({}, '', kategoriId ? '?kategori=' + kategoriId : window.location.pathname);
        },
        error: function () {
          alert('Gagal memuat produk!');
        }
      });
    });
  });

  // pagination ajax
  $(document).on('click', '#pagination-container a', function (e) {
    e.preventDefault();
    const url = $(this).attr('href');

    animateChange(function () {
      $.ajax({
        url: url,
        type: 'GET',
        success: function (response) {
          $('#product-container').html(response.products);
          $('#pagination-container').html(response.pagination);
          window.history.replaceState({}, '', url);
        },
        error: function () {
          alert('Gagal memuat halaman!');
        }
      });
    });
  });
});
