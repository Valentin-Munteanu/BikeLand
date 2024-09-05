const swiper = new Swiper('.swiper', {
    direction: 'horizontal',
    loop: false,
    preloadImages: true,
    lazy: {
      loadPrevNext: true,

    },
    pagination: {
      el: '.swiper-pagination',
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    autoplay: {
      delay: 4000,
      disableOnInteraction: false
    }
  });


