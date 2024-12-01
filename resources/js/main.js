(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // Initiate the wowjs
    new WOW().init();
    
    
    // Dropdown on mouse hover
    const $dropdown = $(".dropdown");
    const $dropdownToggle = $(".dropdown-toggle");
    const $dropdownMenu = $(".dropdown-menu");
    const showClass = "show";
    
    $(window).on("load resize", function() {
        if (this.matchMedia("(min-width: 992px)").matches) {
            $dropdown.hover(
            function() {
                const $this = $(this);
                $this.addClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "true");
                $this.find($dropdownMenu).addClass(showClass);
            },
            function() {
                const $this = $(this);
                $this.removeClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "false");
                $this.find($dropdownMenu).removeClass(showClass);
            }
            );
        } else {
            $dropdown.off("mouseenter mouseleave");
        }
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Modal Video
    $(document).ready(function () {
        var $videoSrc;
        $('.btn-play').click(function () {
            $videoSrc = $(this).data("src");
        });
        console.log($videoSrc);

        $('#videoModal').on('shown.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        })

        $('#videoModal').on('hide.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc);
        })
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 25,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            768:{
                items:2
            }
        }
    });
    
})(jQuery);


document.addEventListener('DOMContentLoaded', () => {
    const baseHarga = 183929; // Harga kamar awal
    let totalHarga = baseHarga;

    const rincianHargaContainer = document.getElementById('rincianHargaContainer');
    const totalHargaElement = document.getElementById('totalHarga');

    // Update rincian harga berdasarkan checkbox yang dipilih
    const updateRincianHarga = () => {
        rincianHargaContainer.innerHTML = ''; // Reset rincian
        totalHarga = baseHarga;

        document.querySelectorAll('.form-check-input:checked').forEach(input => {
            const name = input.getAttribute('data-name');
            const harga = parseInt(input.getAttribute('data-harga'));

            // Tambahkan rincian ke tampilan
            const item = document.createElement('div');
            item.className = 'd-flex justify-content-between';
            item.innerHTML = `
                <p class="mb-0">${name}</p>
                <p class="mb-0" style="font-weight: bold;">IDR ${harga.toLocaleString()}</p>
            `;
            rincianHargaContainer.appendChild(item);

            // Tambahkan ke total harga
            totalHarga += harga;
        });

        // Update total harga di tampilan
        totalHargaElement.textContent = `IDR ${totalHarga.toLocaleString()}`;
    };

    // Tambahkan event listener ke semua checkbox
    document.querySelectorAll('.form-check-input').forEach(input => {
        input.addEventListener('change', updateRincianHarga);
    });

    // Inisialisasi tampilan awal
    updateRincianHarga();
});
