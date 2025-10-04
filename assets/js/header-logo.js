document.addEventListener("DOMContentLoaded", function () {
  const bottomHeader = document.querySelector(".bottom-header");
  const isFront = bottomHeader && bottomHeader.classList.contains("is-front");

  function toggleBodyClass() {
    if (window.scrollY > 50) {
      document.body.classList.add("scrolled");
    } else {
      document.body.classList.remove("scrolled");
    }
  }

  toggleBodyClass();
  window.addEventListener("scroll", toggleBodyClass);
});
