document.addEventListener("DOMContentLoaded", async () => {
  const images = Array.from(document.querySelectorAll(".firstview-bg img"));
  const fadeNumber = Array.from(document.querySelectorAll(".firstview-bgIndex-number"));
  let currentIndex = 0;

  function showNextImage() {
    for (const [index, img] of images.entries()) {
      img.classList.toggle("active", index === currentIndex);
    }

    for (const [index, fade] of fadeNumber.entries()) {
      fade.classList.toggle("active", index === currentIndex);
    }

    currentIndex = (currentIndex + 1) % images.length;
  }

  // 初期表示
  images[0].classList.add("active");
  fadeNumber[0].classList.add("active");

  // 5秒ごとに次の画像を表示
  setInterval(showNextImage, 5000);
});
