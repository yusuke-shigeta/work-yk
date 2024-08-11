document.addEventListener("DOMContentLoaded", function () {
  const images = document.querySelectorAll(".frontPage-firstview-bg img");
  let currentIndex = 0;

  function showNextImage() {
    images.forEach((img, index) => {
      img.classList.remove("active");
      if (index === currentIndex) {
        img.classList.add("active");
      }
    });
    currentIndex = (currentIndex + 1) % images.length;
  }

  // 初期表示
  images[0].classList.add("active");

  // 3秒ごとに次の画像を表示
  setInterval(showNextImage, 5000);
});
