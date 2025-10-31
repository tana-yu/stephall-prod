document.addEventListener("DOMContentLoaded", function () {
    const transition = document.getElementById("page-transition");
    if (!transition) return;

    setTimeout(() => {
        transition.classList.add("animate");
        setTimeout(() => {
        transition.classList.add("hidden");
        }, 1800);
    }, 500);
});