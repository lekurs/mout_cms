$(document).ready(function () {
    const nav = $('nav.desktop-nav');
    const header= $('.header-container');

    $(document).on('scroll', function () {

        if (window.pageYOffset > $(header).offset().top) {
            $(nav).addClass('sticky');
        } else {
            $(nav).removeClass('sticky');
        }
    });
});