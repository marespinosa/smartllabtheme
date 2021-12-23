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