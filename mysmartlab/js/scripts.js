// Passive event listeners
jQuery.event.special.touchstart = {
    setup: function( _, ns, handle ) {
        this.addEventListener("touchstart", handle, { passive: !ns.includes("noPreventDefault") });
    }
};
jQuery.event.special.touchmove = {
    setup: function( _, ns, handle ) {
        this.addEventListener("touchmove", handle, { passive: !ns.includes("noPreventDefault") });
    }
};

$(document).ready(function () {
});

$(document).ready(function () {
    if ($('.popup').length) {
        $('.popup_button').click(function() {
            $(this).next('.popup_panel').css('display', 'grid')
        });
        $('.popup_panel').click(function(e) {
            if (e.target === e.currentTarget) {
                $(this).find('video').trigger('pause');
                $(this).css('display', 'none');
            }
        });
    }
});
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

$(document).ready(function(){

    if($('.slide_down').length){
        $('.hamburger').click(function(){
            if(!$(this).hasClass('active')){
                $(this).removeClass('dormant');
                $(this).addClass('active');

                $('.page-nav > ul').slideDown();
                $('nav').addClass('active');
                $('body').css('overflow', 'hidden');
                $('body').css('height', '100vh');
            }else{
                $(this).removeClass('active');
                $(this).addClass('dormant');

                $('.page-nav > ul').slideUp();
                $('nav').removeClass('active');
                $('body').css('overflow', 'unset');
                $('body').css('height', 'auto');
            }
        });

        $('.menu > .menu-item-has-children > a, .menu > .menu-item-has-children > .sub-menu > .menu-item-has-children > a').click(function(e) {
            e.preventDefault();
            if(!$(this).hasClass('active')){
                $(this).removeClass('dormant');
                $(this).addClass('active');

                $(this).next('.sub-menu').slideDown();
            }else{
                $(this).removeClass('active');
                $(this).addClass('dormant');

                $(this).next('.sub-menu').slideUp();
            }
        })
    }

});