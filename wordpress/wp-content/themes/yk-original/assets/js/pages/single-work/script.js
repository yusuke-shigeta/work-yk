document.addEventListener("DOMContentLoaded", function () {
  let isAnimating = false;

  function fadeIn(element, duration) {
    element.style.opacity = 0;

    let start = performance.now();

    function animate(time) {
      let progress = (time - start) / duration;
      if (progress > 1) progress = 1;

      element.style.opacity = progress;

      if (progress < 1) {
        requestAnimationFrame(animate);
      }
    }

    requestAnimationFrame(animate);
  }

  function fadeOut(element, duration) {
    element.style.opacity = 1;

    let start = performance.now();

    function animate(time) {
      let progress = (time - start) / duration;
      if (progress > 1) progress = 1;

      element.style.opacity = 1 - progress;

      if (progress < 1) {
        requestAnimationFrame(animate);
      } else {
        element.style.display = "none";
      }
    }

    requestAnimationFrame(animate);
  }
  const btnBefore = document.getElementById("btn-work-image-before");
  const btnAfter = document.getElementById("btn-work-image-after");
  const imgBefore = document.getElementById("work-image-before");
  const imgAfter = document.getElementById("work-image-after");

  btnBefore.addEventListener("click", function () {
    if (isAnimating) return;
    isAnimating = true;
    btnBefore.classList.add("is-active");
    btnAfter.classList.remove("is-active");
    imgBefore.style.display = "block";
    imgAfter.style.display = "none";
    fadeIn(imgBefore, 500);
    fadeOut(imgAfter, 500);

    setTimeout(() => (isAnimating = false), 500);
  });

  btnAfter.addEventListener("click", function () {
    if (isAnimating) return;
    isAnimating = true;
    btnAfter.classList.add("is-active");
    btnBefore.classList.remove("is-active");
    imgBefore.style.display = "none";
    imgAfter.style.display = "block";
    fadeIn(imgAfter, 500);
    fadeOut(imgBefore, 500);

    setTimeout(() => (isAnimating = false), 500);
  });

  document.querySelectorAll(".slider").forEach((slideContainer) => {
    const slides = slideContainer.querySelectorAll(".slide");
    const paginationButtons = slideContainer.querySelectorAll(".pagination-btn");
    let currentIndex = 0;

    function showSlide(index) {
      slides.forEach((slide, i) => {
        if (i === index) {
          slide.style.display = "block";
          fadeIn(slide, 500);
          slide.classList.add("is-active");
        } else {
          slide.style.display = "none";
          fadeOut(slide, 500);
          slide.classList.remove("is-active");
        }
      });
      currentIndex = index;
    }

    paginationButtons.forEach((button) => {
      button.addEventListener("click", function () {
        if (isAnimating) return;
        isAnimating = true;

        paginationButtons.forEach((btn) => btn.classList.remove("is-active"));
        this.classList.add("is-active");

        const index = parseInt(this.getAttribute("data-index"));
        showSlide(index);
        setTimeout(() => (isAnimating = false), 500);
      });
    });

    // Initialize the slider
    showSlide(currentIndex);
  });
});
