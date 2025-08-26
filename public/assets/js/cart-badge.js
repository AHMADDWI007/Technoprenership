$(document).ready(function () {
    // Handle Add to Cart via AJAX
    $(document).on("submit", ".add-to-cart-form", function (e) {
        e.preventDefault();
        let form = $(this);
        let url = form.attr("action");
        let button = form.find("button");
        let productImage = form.closest(".single-product-item").find("img");

        $.ajax({
            url: url,
            type: "POST",
            data: form.serialize(),
            success: function (response) {
                if (response.success) {
                    // Update badge
                    if ($(".cart-badge").length) {
                        $(".cart-badge").text(response.count);
                    } else {
                        $(".shopping-cart").append('<span class="cart-badge">'+ response.count +'</span>');
                    }

                    // Animasi fly-to-cart
                    flyToCart(productImage, $(".shopping-cart i"));
                }
            },
            error: function () {
                alert("Gagal menambahkan ke keranjang!");
            }
        });
    });

    // Fungsi animasi fly-to-cart
    function flyToCart(image, cartIcon) {
        let imgClone = image.clone()
            .offset({
                top: image.offset().top,
                left: image.offset().left
            })
            .css({
                'opacity': '0.8',
                'position': 'absolute',
                'height': '150px',
                'width': '150px',
                'z-index': '1000'
            })
            .appendTo($('body'))
            .animate({
                'top': cartIcon.offset().top + 10,
                'left': cartIcon.offset().left + 10,
                'width': 50,
                'height': 50
            }, 1000, 'easeInOutExpo', function () {
                $(this).detach();
            });
    }
});