document.addEventListener('DOMContentLoaded', function() {
  const hamburger = document.querySelector('.hamburger-menu');
  const sidebar = document.querySelector('.sidebar-menu');
  const closeBtn = document.querySelector('.close-btn');
  const overlay = document.querySelector('.overlay') || document.createElement('div');
  
  if (!document.querySelector('.overlay')) {
    overlay.classList.add('overlay');
    document.body.appendChild(overlay);
  }

  if (hamburger) {
    hamburger.addEventListener('click', () => {
      if (sidebar) sidebar.classList.add('active');
      if (overlay) overlay.classList.add('active');
    });
  }

  function closeMenu() {
    if (sidebar) sidebar.classList.remove('active');
    if (overlay) overlay.classList.remove('active');
  }

  if (closeBtn) closeBtn.addEventListener('click', closeMenu);
  if (overlay) overlay.addEventListener('click', closeMenu);
});