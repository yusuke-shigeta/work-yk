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

  // firstviewをクリックで次の画像を表示
  document.querySelector(".firstview").addEventListener("click", showNextImage);

  function isMobile() {
    return /Mobi|Android/i.test(navigator.userAgent);
  }

  const PostLinks = document.querySelectorAll(".js-post-link");
  if (isMobile()) {
    console.log("Accessed from a mobile device");
    PostLinks.forEach((link) => {
      link.addEventListener("click", (event) => {
        event.preventDefault();
        PostLinks.forEach((otherLink) => {
          otherLink.parentElement.classList.remove("is-active");
        });
        link.parentElement.classList.add("is-active");
      });
    });
  } else {
    console.log("Accessed from a PC");
  }
});
