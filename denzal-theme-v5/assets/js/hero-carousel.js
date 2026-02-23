/**
 * DenZal Construction — Hero Background Carousel
 * File: assets/js/hero-carousel.js
 * Depends on: Swiper 11
 */
(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        var heroSwiper = document.querySelector('.hero-swiper');
        if (!heroSwiper) return;

        new Swiper('.hero-swiper', {
            loop:     true,
            speed:    1200,           // crossfade duration ms
            autoplay: {
                delay:                5000,
                disableOnInteraction: false,
            },
            effect:     'fade',
            fadeEffect: { crossFade: true },
            a11y: {
                prevSlideMessage: 'Previous home photo',
                nextSlideMessage: 'Next home photo',
            },
            pagination:  false,
            navigation:  false,
            scrollbar:   false,
        });
    });

})();
