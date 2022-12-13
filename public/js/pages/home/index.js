new Swiper('.tournaments__swiper', {
  spaceBetween: 16,
  slidesPerView: 1,
  draggable: true,
  scrollbar: {
    el: '.tournaments__swiper-scrollbar',
    draggable: true,
    dragSize: 64
  },
  breakpoints: {
    576: {
      slidesPerView: 2,
      spaceBetween: 16,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 24,
    },
    992: {
      slidesPerView: 3,
      spaceBetween: 24,
    },
    1200: {
      slidesPerView: 3,
      spaceBetween: 24,
    },
    1400: {
      slidesPerView: 4,
      spaceBetween: 32,
    },
  }
});

new Swiper('.players__swiper', {
  spaceBetween: 16,
  slidesPerView: 1,
  draggable: true,
  scrollbar: {
    el: '.players__swiper-scrollbar',
    draggable: true,
    dragSize: 64
  },
  breakpoints: {
    576: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 24,
    },
    1200: {
      slidesPerView: 3,
      spaceBetween: 24,
    },
    1400: {
      slidesPerView: 3,
      spaceBetween: 32,
    },
  }
});

new Swiper('.news__swiper', {
  spaceBetween: 16,
  slidesPerView: 1,
  draggable: true,
  scrollbar: {
    el: '.news__swiper-scrollbar',
    draggable: true,
    dragSize: 64
  },
  breakpoints: {
    576: {
      slidesPerView: 2,
      spaceBetween: 16,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 24,
    },
    992: {
      slidesPerView: 3,
      spaceBetween: 24,
    },
    1200: {
      slidesPerView: 3,
      spaceBetween: 24,
    },
    1400: {
      slidesPerView: 4,
      spaceBetween: 32,
    },
  }
});
