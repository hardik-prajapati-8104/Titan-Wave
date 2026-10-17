/* TITAN WAVE — site scripts (vanilla JS, no dependencies) */
(function () {
  'use strict';
  var $ = function (s, c) { return (c || document).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };

  // Preloader
  function hidePre() { var p = $('.preloader'); if (p) p.classList.add('done'); }
  window.addEventListener('load', hidePre);
  setTimeout(hidePre, 2500);

  // Sticky header shadow + back to top
  var header = $('.header'), totop = $('.totop');
  function onScroll() {
    var y = window.pageYOffset;
    if (header) header.classList.toggle('scrolled', y > 40);
    if (totop) totop.classList.toggle('show', y > 500);
  }
  window.addEventListener('scroll', onScroll, { passive: true }); onScroll();
  if (totop) totop.addEventListener('click', function () { window.scrollTo({ top: 0, behavior: 'smooth' }); });

  // Mobile menu (burger, backdrop, Pages accordion, scroll-lock, Esc / outside-click / resize close)
  var burger = $('.burger'), nav = $('.nav'), MQ = 991;
  if (burger && nav) {
    var backdrop = document.createElement('div');
    backdrop.className = 'nav-backdrop';
    document.body.appendChild(backdrop);

    var setSub = function (li, open) {
      var link = $('a', li);
      li.classList.toggle('sub-open', open);
      if (link) link.setAttribute('aria-expanded', open ? 'true' : 'false');
    };
    var closeSubs = function () { $$('.nav>li.sub-open').forEach(function (li) { setSub(li, false); }); };
    var fit = function () {
      // size the panel to the space actually left under the header, so it scrolls inside itself on short screens
      var h = header ? header.getBoundingClientRect().bottom : 72;
      nav.style.setProperty('--nav-max', Math.max(window.innerHeight - Math.max(h, 0), 200) + 'px');
    };
    var openMenu = function () {
      fit();
      nav.classList.add('open'); backdrop.classList.add('show');
      document.body.classList.add('menu-open');
      burger.setAttribute('aria-expanded', 'true');
    };
    var closeMenu = function (focusBurger) {
      nav.classList.remove('open'); backdrop.classList.remove('show');
      document.body.classList.remove('menu-open');
      burger.setAttribute('aria-expanded', 'false');
      closeSubs();
      if (focusBurger) burger.focus();
    };
    var isOpen = function () { return nav.classList.contains('open'); };

    burger.addEventListener('click', function () { isOpen() ? closeMenu() : openMenu(); });
    backdrop.addEventListener('click', function () { closeMenu(); });

    // "Pages" opens/closes its sub-menu on small screens; any other link closes the menu
    $$('.nav>li').forEach(function (li) {
      if (!$('.sub', li)) return;
      li.classList.add('has-sub');
      $('a', li).addEventListener('click', function (e) {
        if (window.innerWidth > MQ) return;
        e.preventDefault();
        var willOpen = !li.classList.contains('sub-open');
        closeSubs(); setSub(li, willOpen);
      });
    });
    nav.addEventListener('click', function (e) {
      var a = e.target.closest ? e.target.closest('a') : null;
      if (!a || window.innerWidth > MQ) return;
      if (a.parentNode.classList.contains('has-sub') && a.parentNode.firstElementChild === a) return;
      closeMenu();
    });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && isOpen()) closeMenu(true); });
    window.addEventListener('resize', function () { if (window.innerWidth > MQ) closeMenu(); else if (isOpen()) fit(); });
    window.addEventListener('orientationchange', function () { if (isOpen()) setTimeout(fit, 250); });
  }

  // Hero slider
  var slides = $$('.hero-slide'), dots = $$('.hero-dots button'), cur = 0, timer;
  function go(i) {
    slides[cur].classList.remove('on'); if (dots[cur]) dots[cur].classList.remove('on');
    cur = (i + slides.length) % slides.length;
    slides[cur].classList.add('on'); if (dots[cur]) dots[cur].classList.add('on');
  }
  if (slides.length) {
    slides[0].classList.add('on'); if (dots[0]) dots[0].classList.add('on');
    dots.forEach(function (d, i) { d.addEventListener('click', function () { go(i); restart(); }); });
    var restart = function () { clearInterval(timer); timer = setInterval(function () { go(cur + 1); }, 6500); };
    restart();
  }

  // Reveal on scroll
  var rv = $$('.rv');
  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (es) {
      es.forEach(function (e) { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } });
    }, { threshold: .12 });
    rv.forEach(function (el) { io.observe(el); });
  } else { rv.forEach(function (el) { el.classList.add('in'); }); }

  // Counters
  var counters = $$('[data-count]');
  function runCount(el) {
    var end = parseFloat(el.getAttribute('data-count')), suf = el.getAttribute('data-suffix') || '', t0 = null, dur = 1800;
    function step(t) {
      if (!t0) t0 = t;
      var p = Math.min((t - t0) / dur, 1), v = Math.floor(end * (1 - Math.pow(1 - p, 3)));
      el.textContent = v.toLocaleString() + suf;
      if (p < 1) requestAnimationFrame(step); else el.textContent = end.toLocaleString() + suf;
    }
    requestAnimationFrame(step);
  }
  if ('IntersectionObserver' in window) {
    var co = new IntersectionObserver(function (es) {
      es.forEach(function (e) { if (e.isIntersecting) { runCount(e.target); co.unobserve(e.target); } });
    }, { threshold: .5 });
    counters.forEach(function (c) { co.observe(c); });
  } else { counters.forEach(runCount); }

  // Gallery filter + lightbox
  var fbtn = $$('.filters button'), works = $$('.work[data-cat]');
  fbtn.forEach(function (b) {
    b.addEventListener('click', function () {
      fbtn.forEach(function (x) { x.classList.remove('on'); }); b.classList.add('on');
      var f = b.getAttribute('data-filter');
      works.forEach(function (w) { w.classList.toggle('hide', f !== 'all' && w.getAttribute('data-cat') !== f); });
    });
  });
  var lb = $('.lightbox');
  if (lb) {
    var lbi = $('img', lb);
    $$('.work[data-full]').forEach(function (w) {
      w.addEventListener('click', function (e) { e.preventDefault(); lbi.src = w.getAttribute('data-full'); lb.classList.add('open'); });
    });
    lb.addEventListener('click', function () { lb.classList.remove('open'); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') lb.classList.remove('open'); });
  }

  // Testimonial slider
  var sl = $('.slider');
  if (sl) {
    var track = $('.slider-track', sl), items = $$('.slider-slide', sl), idx = 0;
    var per = function () { return window.innerWidth > 991 ? 3 : window.innerWidth > 640 ? 2 : 1; };
    var apply = function () {
      var n = per(), max = Math.max(items.length - n, 0);
      idx = Math.min(idx, max);
      items.forEach(function (i) { i.style.flexBasis = (100 / n) + '%'; });
      track.style.transform = 'translateX(' + (-idx * (100 / n)) + '%)';
    };
    $('.prev', sl).addEventListener('click', function () { idx = Math.max(idx - 1, 0); apply(); });
    $('.next', sl).addEventListener('click', function () {
      var max = Math.max(items.length - per(), 0); idx = idx >= max ? 0 : idx + 1; apply();
    });
    window.addEventListener('resize', apply); apply();
  }

  // Forms (front-end only — connect to your backend / form service via the form's action)
  $$('form[data-demo]').forEach(function (f) {
    f.addEventListener('submit', function (e) {
      e.preventDefault();
      if (!f.checkValidity()) { f.reportValidity(); return; }
      var m = $('.form-msg', f.parentNode) || $('.form-msg', f);
      if (m) m.classList.add('show');
      f.reset();
    });
  });
})();
