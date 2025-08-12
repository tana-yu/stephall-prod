document.addEventListener('DOMContentLoaded', function () {
    new Splide('#splide-slider', {
    type       : 'loop',
    perPage    : 4,
    arrows     : false,
    pagination : false,
    padding    : "1rem",
    gap        : 1,
    drag       : true,
    autoScroll: {
        speed: 0.5,
        pauseOnHover: true,
    },
    breakpoints: {
        1024: { // 1024px以下
            perPage: 3,
            gap: '0.75rem',
        },
        800: { // 1024px以下
            perPage: 2,
            gap: '0.75rem',
        },
        450: { // 768px以下
            perPage: 1,
            gap: '0.5rem',
        },
    },
  }).mount(window.splide.Extensions);
});
