document.addEventListener('DOMContentLoaded', function () {

  // Select the hamburger menu toggle button inside .navigation
  const toggle   = document.querySelector('.navigation .menu-toggle');

  // Select the nav links container inside .navigation
  const navLinks = document.querySelector('.navigation .nav-links');

  // Select the icon element inside the toggle button (if toggle exists)
  const icon     = toggle ? toggle.querySelector('i') : null;

  // Select the back-to-top button by its ID
  const backToTopButton = document.getElementById('back-to-top');

  // Guard clause: exit early if required elements are missing
  if (!toggle || !navLinks) {
    console.warn('Navbar: .menu-toggle or .nav-links not found.');
    return;
  }

  /*Open/Close helpers*/

  // Opens the mobile menu by adding active/open classes,
  // updating aria-expanded for accessibility, and switching
  // the icon from hamburger (fa-bars) to close (fa-xmark)
  function openMenu() {
    navLinks.classList.add('active');
    toggle.classList.add('open');
    toggle.setAttribute('aria-expanded', 'true');
    if (icon) {
      icon.classList.replace('fa-bars', 'fa-xmark');
    }
  }

  // Closes the mobile menu by removing active/open classes,
  // resetting aria-expanded, and switching the icon back
  // from close (fa-xmark) to hamburger (fa-bars)
  function closeMenu() {
    navLinks.classList.remove('active');
    toggle.classList.remove('open');
    toggle.setAttribute('aria-expanded', 'false');
    if (icon) {
      icon.classList.replace('fa-xmark', 'fa-bars');
    }
  }

  // Toggles the menu open or closed depending on its current state
  function toggleMenu() {
    navLinks.classList.contains('active') ? closeMenu() : openMenu();
  }

  /*Toggle on hamburger click*/

  // Listens for a click on the toggle button and calls toggleMenu
  toggle.addEventListener('click', toggleMenu);

  /*Keyboard: Enter/Space*/

  // Allows keyboard users to open/close the menu using Enter or Space,
  // preventing default behavior (e.g. page scroll on Space)
  toggle.addEventListener('keydown', function (e) {
    if (e.key === 'Enter' || e.key === ' ') {
      e.preventDefault();
      toggleMenu();
    }
  });

  /*Close when a nav link is clicked*/

  // Attaches a click listener to every anchor inside nav-links
  // so the menu closes automatically after navigating to a section
  navLinks.querySelectorAll('a').forEach(function (link) {
    link.addEventListener('click', closeMenu);
  });

  /*Close when clicking outside the nav*/

  // Listens for clicks anywhere on the document and closes the menu
  // if the click target is outside both the toggle and nav-links
  document.addEventListener('click', function (e) {
    if (!toggle.contains(e.target) && !navLinks.contains(e.target)) {
      closeMenu();
    }
  });

  /*Close on Escape key*/

  // Closes the menu when the Escape key is pressed anywhere on the page
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') closeMenu();
  });

  /*Reset on resize back to desktop*/

  // Closes the mobile menu when the viewport is resized above 900px
  // (desktop breakpoint), preventing the open menu from persisting
  window.addEventListener('resize', function () {
    if (window.innerWidth > 900) closeMenu();
  });

  /*Back to top button*/

  if (backToTopButton) {

    // Shows or hides the back-to-top button based on scroll position;
    // the button becomes visible after the user scrolls down 300px
    // passive: true improves scroll performance
    window.addEventListener('scroll', function () {
      backToTopButton.classList.toggle('visible', window.scrollY > 300);
    }, { passive: true });

    // Smoothly scrolls the page back to the top when the button is clicked
    backToTopButton.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }
});