document.addEventListener("DOMContentLoaded", function () {
  const hamburger = document.querySelector(".hamburger-icon");
  const bar = hamburger.querySelector(".bar");
  const nav = document.querySelector("header.bottom-header nav");
  const overlay = document.querySelector(".hamburger-overlay");

  function openMenu() {
    nav.classList.add("hm-visible");
    overlay.style.display = "block";
    bar.classList.add("hm-close");
  }

  function closeMenu() {
    nav.classList.remove("hm-visible");
    overlay.style.display = "none";
    bar.classList.remove("hm-close");
  }

  function toggleMenu() {
    const isOpen = nav.classList.contains("hm-visible");
    if (isOpen) {
      closeMenu();
    } else {
      openMenu();
    }
  }

  hamburger.addEventListener("click", toggleMenu);
  overlay.addEventListener("click", closeMenu);

  window.addEventListener("resize", function () {
    if (window.innerWidth >= 800) {
      closeMenu();
    }
  });
});
