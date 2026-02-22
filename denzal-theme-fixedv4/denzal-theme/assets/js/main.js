/**
 * DenZal Construction — Main JS
 * Kapeesh Enterprises
 */
(function () {
  'use strict';

  /* ── STICKY HEADER ── */
  const header = document.getElementById('site-header');
  if (header) {
    const onScroll = () => {
      header.classList.toggle('scrolled', window.scrollY > 40);
    };
    window.addEventListener('scroll', onScroll, { passive: true });
  }

  /* ── MOBILE NAV TOGGLE ── */
  const toggle = document.getElementById('nav-toggle');
  const mobileNav = document.getElementById('mobile-nav');
  if (toggle && mobileNav) {
    toggle.addEventListener('click', () => {
      const open = mobileNav.classList.toggle('open');
      toggle.setAttribute('aria-expanded', open);
      // Animate hamburger → X
      const spans = toggle.querySelectorAll('span');
      if (open) {
        spans[0].style.transform = 'translateY(7px) rotate(45deg)';
        spans[1].style.opacity = '0';
        spans[2].style.transform = 'translateY(-7px) rotate(-45deg)';
      } else {
        spans.forEach(s => { s.style.transform = ''; s.style.opacity = ''; });
      }
    });
  }

  /* ── HERO PARALLAX LOAD ── */
  const hero = document.querySelector('.hero');
  if (hero) {
    setTimeout(() => hero.classList.add('loaded'), 100);
  }

  /* ── SMOOTH SCROLL FOR ANCHOR LINKS ── */
  document.querySelectorAll('a[href^="#"]').forEach(link => {
    link.addEventListener('click', e => {
      const target = document.querySelector(link.getAttribute('href'));
      if (target) {
        e.preventDefault();
        const headerH = header ? header.offsetHeight : 0;
        const top = target.getBoundingClientRect().top + window.scrollY - headerH - 16;
        window.scrollTo({ top, behavior: 'smooth' });
        // Close mobile nav if open
        if (mobileNav && mobileNav.classList.contains('open')) {
          mobileNav.classList.remove('open');
          toggle.setAttribute('aria-expanded', 'false');
        }
      }
    });
  });

  /* ── INTERSECTION OBSERVER — FADE IN ON SCROLL ── */
  const fadeEls = document.querySelectorAll(
    '.feature-card, .process-step, .testimonial-card, .testimonial-card-light, .portfolio-card, .home-card'
  );
  if ('IntersectionObserver' in window && fadeEls.length) {
    fadeEls.forEach((el, i) => {
      el.style.opacity = '0';
      el.style.transform = 'translateY(24px)';
      el.style.transition = `opacity 0.5s ease ${(i % 4) * 0.08}s, transform 0.5s ease ${(i % 4) * 0.08}s`;
    });
    const obs = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.style.opacity = '1';
          entry.target.style.transform = 'none';
          obs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1 });
    fadeEls.forEach(el => obs.observe(el));
  }

  /* ── AJAX CONTACT FORM ── */
  const form = document.getElementById('denzal-contact-form');
  if (form) {
    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      const btn = document.getElementById('form-submit');
      const feedback = document.getElementById('form-feedback');
      btn.textContent = 'Sending…';
      btn.disabled = true;

      const data = new FormData(form);
      // Combine first + last name
      const first = form.querySelector('[name="first_name"]')?.value || '';
      const last  = form.querySelector('[name="last_name"]')?.value || '';
      data.set('name', `${first} ${last}`.trim());
      data.set('action', 'denzal_contact');
      data.set('nonce', denzalAjax?.nonce || '');

      try {
        const resp = await fetch(denzalAjax.ajaxurl, { method: 'POST', body: data });
        const json = await resp.json();
        feedback.style.display = 'block';
        if (json.success) {
          feedback.style.background = 'rgba(34,197,94,0.15)';
          feedback.style.border = '1px solid rgba(34,197,94,0.3)';
          feedback.style.color = '#4ade80';
          feedback.textContent = json.data;
          form.reset();
        } else {
          feedback.style.background = 'rgba(239,68,68,0.15)';
          feedback.style.border = '1px solid rgba(239,68,68,0.3)';
          feedback.style.color = '#f87171';
          feedback.textContent = json.data || 'Something went wrong. Please try again.';
        }
      } catch (err) {
        feedback.style.display = 'block';
        feedback.style.color = '#f87171';
        feedback.textContent = 'Network error. Please call us directly at (570) 876-4663.';
      }

      btn.textContent = 'Send Message →';
      btn.disabled = false;
      feedback.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    });
  }

  /* ── COUNTER ANIMATION (hero stats) ── */
  const counters = document.querySelectorAll('.hero-stat-value');
  if ('IntersectionObserver' in window && counters.length) {
    const countObs = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        const el = entry.target;
        const target = parseInt(el.textContent) || 0;
        const suffix = el.textContent.replace(/[0-9]/g, '');
        if (!target) return;
        let current = 0;
        const step = Math.ceil(target / 40);
        const timer = setInterval(() => {
          current = Math.min(current + step, target);
          el.textContent = current + suffix;
          if (current >= target) clearInterval(timer);
        }, 30);
        countObs.unobserve(el);
      });
    }, { threshold: 0.5 });
    counters.forEach(c => countObs.observe(c));
  }

})();
