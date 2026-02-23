/**
 * DenZal Construction — Main JS
 * Kapeesh Enterprises · v2.0
 */
(function () {
  'use strict';

  /* ── STICKY HEADER ── */
  const header = document.getElementById('site-header');
  if (header) {
    window.addEventListener('scroll', () => {
      header.classList.toggle('scrolled', window.scrollY > 40);
    }, { passive: true });
  }

  /* ── MOBILE NAV TOGGLE ── */
  const toggle    = document.getElementById('nav-toggle');
  const mobileNav = document.getElementById('mobile-nav');
  if (toggle && mobileNav) {
    toggle.addEventListener('click', () => {
      const open = mobileNav.classList.toggle('open');
      toggle.setAttribute('aria-expanded', open);
      const spans = toggle.querySelectorAll('span');
      if (open) {
        spans[0].style.transform = 'translateY(7px) rotate(45deg)';
        spans[1].style.opacity   = '0';
        spans[2].style.transform = 'translateY(-7px) rotate(-45deg)';
      } else {
        spans.forEach(s => { s.style.transform = ''; s.style.opacity = ''; });
      }
    });
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
        if (mobileNav && mobileNav.classList.contains('open')) {
          mobileNav.classList.remove('open');
          toggle && toggle.setAttribute('aria-expanded', 'false');
        }
      }
    });
  });

  /* ── INTERSECTION OBSERVER — FADE IN ON SCROLL ── */
  const fadeEls = document.querySelectorAll(
    '.process-step, .testimonial-card, .testimonial-card-light, .portfolio-card, .home-card, .about-grid > *'
  );
  if ('IntersectionObserver' in window && fadeEls.length) {
    fadeEls.forEach((el, i) => {
      el.style.opacity   = '0';
      el.style.transform = 'translateY(24px)';
      el.style.transition = `opacity 0.5s ease ${(i % 4) * 0.08}s, transform 0.5s ease ${(i % 4) * 0.08}s`;
    });
    const obs = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.style.opacity   = '1';
          entry.target.style.transform = 'none';
          obs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1 });
    fadeEls.forEach(el => obs.observe(el));
  }

  /* ── AJAX CONTACT FORM ── */
  const forms = document.querySelectorAll('#denzal-contact-form, #denzal-hero-form');
  forms.forEach(form => {
    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      const btn      = form.querySelector('[type="submit"]');
      const feedback = form.querySelector('#form-feedback') || form.querySelector('.form-feedback');
      const origText = btn.textContent;
      btn.textContent = 'Sending…';
      btn.disabled = true;

      const data = new FormData(form);
      data.set('action', 'denzal_contact');
      data.set('nonce', typeof denzalAjax !== 'undefined' ? denzalAjax.nonce : '');

      // Merge first/last name fields if they exist
      const first = form.querySelector('[name="first_name"]')?.value || form.querySelector('[name="fname"]')?.value || '';
      const last  = form.querySelector('[name="last_name"]')?.value  || form.querySelector('[name="lname"]')?.value  || '';
      if ( first || last ) data.set('name', `${first} ${last}`.trim());

      try {
        const resp = await fetch(
          typeof denzalAjax !== 'undefined' ? denzalAjax.ajaxurl : '/wp-admin/admin-ajax.php',
          { method: 'POST', body: data }
        );
        const json = await resp.json();
        if (feedback) {
          feedback.style.display = 'block';
          if (json.success) {
            feedback.style.cssText += ';background:rgba(34,197,94,.15);border:1px solid rgba(34,197,94,.3);color:#4ade80;';
            feedback.textContent = json.data;
            form.reset();
          } else {
            feedback.style.cssText += ';background:rgba(239,68,68,.15);border:1px solid rgba(239,68,68,.3);color:#f87171;';
            feedback.textContent = json.data || 'Something went wrong. Please try again or call us directly.';
          }
        }
      } catch (err) {
        if (feedback) {
          feedback.style.display = 'block';
          feedback.style.color   = '#f87171';
          feedback.textContent   = 'Network error. Please call us at (570) 876-4663.';
        }
      } finally {
        btn.textContent = origText;
        btn.disabled    = false;
      }
    });
  });

})();
