$(document).ready(function () {
    const navigationList = $('a.nav-item-link');
    const close = $('.close-navigation');
    const subNav = $('div.submenu');

    $(navigationList).each(function () {

        $(this).on('click', function () {
            $(subNav).removeClass('active');

            if (!$(this).closest('li.navigation-menu').find(subNav).hasClass('active')) {
                $(this).closest('li.navigation-menu').find(subNav).addClass('active');
                $(this).closest('li.navigation-menu').find(subNav).addClass('active');
            } else {
                $(this).closest('li.navigation-menu').find(subNav).removeClass('active');
            }
        });
    });

    $(close).each(function () {
        $(this).on('click', function () {
            console.log($(this).closest('ul.navigation-submenu'));
            $(this).closest('li.navigation-menu').find(subNav).removeClass('active');
        });
    });
});