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