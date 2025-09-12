document.addEventListener("DOMContentLoaded", function () {
  const isFront = document.querySelector(".bottom-header").classList.contains("is-front");

  function toggleBodyClass() {
    if (window.scrollY > 50) {
      document.body.classList.add("scrolled");
    } else {
      if (!isFront) {
        document.body.classList.remove("scrolled");
      }
    }
  }

  // 初期状態を反映
  toggleBodyClass();

  // スクロール時に更新
  window.addEventListener("scroll", toggleBodyClass);
});
