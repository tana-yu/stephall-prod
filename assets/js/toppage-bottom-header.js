document.addEventListener("DOMContentLoaded", function () {
  const bottomHeader = document.querySelector(".bottom-header.is-front");
  if (!bottomHeader) return;

  const transition = document.getElementById("page-transition");

  setTimeout(() => {
    if (transition) {
      transition.classList.add("animate");
      setTimeout(() => {
        transition.classList.add("hidden");
        bottomHeader.classList.add("show");
      }, 1000);
    } else {
      bottomHeader.classList.add("show");
    }
  }, 500);
});
s
