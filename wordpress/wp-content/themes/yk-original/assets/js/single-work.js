document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("btn-work-image-before").addEventListener("click", function () {
    document.getElementById("work-image-before").style.display = "block";
    document.getElementById("work-image-after").style.display = "none";
  });

  document.getElementById("btn-work-image-after").addEventListener("click", function () {
    document.getElementById("work-image-before").style.display = "none";
    document.getElementById("work-image-after").style.display = "block";
  });

  // Function to initialize Swiper
  function initializeSwiper(swiperClass1, swiperClass2) {
    if (document.querySelector(swiperClass1) && document.querySelector(swiperClass2)) {
      var swiper = new Swiper(swiperClass1, {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
      });
      var swiper2 = new Swiper(swiperClass2, {
        thumbs: {
          swiper: swiper,
        },
      });
    }
  }

  // Initialize Swipers
  initializeSwiper(".mySwiper", ".mySwiper2");
  initializeSwiper(".mySwiper3", ".mySwiper4");
});
