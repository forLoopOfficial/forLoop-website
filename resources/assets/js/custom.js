(function ($) {
    'use strict';

    //-------------------------------------------
    // Solution Tabs
    //-------------------------------------------

    $('.mobile-toggle').click(function() {
        $('.mobile-toggle').toggleClass('hide');
        $('.sidebar-nav').toggleClass('active');
        $('body').toggleClass('no-overflow');
    });

    //-------------------------------------------
    // Animate Click to Scroll on body
    //-------------------------------------------

    $('a[href*=\\#]:not([href=\\#], .tab-nav__link)').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });

    //-------------------------------------------
    // Make Navbar fixed after body scrolls
    //-------------------------------------------

    var windowElem = $(window);

    windowElem.on('scroll', function() {
        if (windowElem.scrollTop() > 40) {
            $('.navbar').addClass('navbar--fixed');
            $('body').addClass('header--fixed');
            $('.mobile-toggle').addClass('mobile-toggle--fixed');
        }
        else if (windowElem.scrollTop() < 40) {
            $('.navbar').removeClass('navbar--fixed');
            $('body').removeClass('header--fixed');
            $('.mobile-toggle').removeClass('mobile-toggle--fixed');
        }
    });

}(jQuery));