document.addEventListener("DOMContentLoaded", function () {
  const accordions = document.querySelectorAll(".comment-btn");

  accordions.forEach((accordion) => {
    accordion.addEventListener("click", function () {
      const li = this.closest("li");
      const comment = li.querySelector(".comment");
      const icon = this.querySelector(".accordion-icon");

      // すでに開いている要素があれば閉じる
      document.querySelectorAll("ul li").forEach((otherLi) => {
        if (otherLi !== li) {
          otherLi.classList.remove("open");
          const otherComment = otherLi.querySelector(".comment");
          const otherIcon = otherLi.querySelector(".accordion-icon");
          if (otherComment) otherComment.style.display = "none";
          if (otherIcon) otherIcon.classList.remove("open");
        }
      });

      // 開閉処理
      const isOpen = li.classList.contains("open");
      if (isOpen) {
        li.classList.remove("open");
        comment.style.display = "none";
        icon.classList.remove("open");
      } else {
        li.classList.add("open");
        comment.style.display = "block";
        icon.classList.add("open");
      }
    });
  });
});
