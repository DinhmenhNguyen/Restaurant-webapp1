// ── HAMBURGER MENU — index.html ──────────────────────
var hamburger = document.querySelector('.header__hamburger');
var navMenu = document.querySelector('.header__nav');

if (hamburger && navMenu) {
  hamburger.addEventListener('click', function () {
    var isOpen = navMenu.classList.toggle('header__nav--open');
    hamburger.setAttribute('aria-expanded', String(isOpen));
    hamburger.textContent = isOpen ? '✕' : '☰';
  });

  // Sluit menu bij klik buiten header
  document.addEventListener('click', function (e) {
    if (!hamburger.contains(e.target) && !navMenu.contains(e.target)) {
      navMenu.classList.remove('header__nav--open');
      hamburger.setAttribute('aria-expanded', 'false');
      hamburger.textContent = '☰';
    }
  });
}
