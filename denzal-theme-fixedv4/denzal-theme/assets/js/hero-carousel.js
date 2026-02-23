/**
 * DenZal Construction — Hero Background Carousel
 * File: /assets/js/hero-carousel.js
 * Depends on: Swiper 11 (enqueued via functions.php)
 */
(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {

        const heroSwiper = document.querySelector('.hero-swiper');
        if (!heroSwiper) return;

        new Swiper('.hero-swiper', {
            // ── Behaviour ──────────────────────────────────────
            loop:            true,   // infinite loop
            speed:           1200,   // crossfade duration in ms (matches CSS)
            autoplay: {
                delay:            5000, // 5 seconds per slide
                disableOnInteraction: false, // keep going after user interaction
            },

            // ── Transition ─────────────────────────────────────
            effect:    'fade',
            fadeEffect: {
                crossFade: true,    // true = previous slide fades OUT as new one fades IN
            },

            // ── Accessibility ───────────────────────────────────
            a11y: {
                prevSlideMessage: 'Previous home photo',
                nextSlideMessage: 'Next home photo',
            },

            // ── No pagination dots or arrows needed ─────────────
            // (they would sit on top of the hero content)
            pagination:  false,
            navigation:  false,
            scrollbar:   false,
        });

    });

})();
