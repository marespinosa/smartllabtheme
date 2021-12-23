$(document).ready(function () {
    if ($('.slider_wrapper').length) {
        $('.slider_wrapper').slick(
            {
                dots: true,
                speed: 500,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 10000,
            }
        );
    }
});

$(document).ready(function () {
    if ($('.wp-block-gallery.is-style-slider').length) {
        $('.wp-block-gallery.is-style-slider .blocks-gallery-grid').slick(
            {
                dots: true,
                speed: 500,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 10000,
            }
        );
    }
});
