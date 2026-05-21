document.addEventListener('DOMContentLoaded', function () {
  const current = window.location.pathname.replace(/\/$/, '');
  document.querySelectorAll('.primary-nav a, .site-footer a').forEach((link) => {
    const href = new URL(link.href, window.location.origin).pathname.replace(/\/$/, '');
    if (href === current) {
      link.setAttribute('aria-current', 'page');
    }
  });
});
