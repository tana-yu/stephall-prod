document.addEventListener('DOMContentLoaded', function () {
  var sliders = document.querySelectorAll('.splide-slider');

  sliders.forEach(function (slider) {
    try {
      new Splide(slider, {
        type       : 'loop',
        perPage    : 4,
        arrows     : false,
        pagination : false,
        padding    : "1rem",
        gap        : 1,
        drag       : true,
        autoScroll : {
          speed       : 0.5,
          pauseOnHover: false,
        },
        breakpoints: {
          1024: { perPage: 3, gap: '0.75rem' },
          800 : { perPage: 2, gap: '0.75rem' },
          450 : { perPage: 1, gap: '0.5rem' },
        },
      }).mount({ AutoScroll: window.splide.Extensions?.AutoScroll });
    } catch (e) {
      console.error('Splide init failed:', e, slider);
    }
  });
});
