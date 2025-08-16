document.querySelectorAll("dl > div > dt").forEach(dt => {
  dt.addEventListener("click", () => {
    const dd = dt.nextElementSibling;
    const icon = dt.querySelector(".accordion-icon");

    // 開閉処理
    if (dd.style.display === "block") {
      dd.style.display = "none";
      icon.classList.remove("open");  // ＋に戻す
    } else {
      dd.style.display = "block";
      icon.classList.add("open");     // －にする
    }
  });
});
