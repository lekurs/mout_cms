$(document).ready(function () {
    const mobileNav = $('nav#mobile-nav');
    const burger = $('.burger');

    burger.on('click', function () {
        const menu = $('.nav-mobile-content');

        $(this).toggleClass('active');
        $(menu).toggleClass('show');
    });
});