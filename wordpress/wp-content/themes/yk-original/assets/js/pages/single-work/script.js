document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("btn-work-image-before").addEventListener("click", function () {
    document.getElementById("work-image-before").style.display = "block";
    document.getElementById("work-image-after").style.display = "none";
  });

  document.getElementById("btn-work-image-after").addEventListener("click", function () {
    document.getElementById("work-image-before").style.display = "none";
    document.getElementById("work-image-after").style.display = "block";
  });

  document.querySelectorAll(".slider").forEach((slideContainer) => {
    const slides = slideContainer.querySelectorAll(".slide");
    const paginationButtons = slideContainer.querySelectorAll(".pagination-btn");
    let currentIndex = 0;

    function showSlide(index) {
      slides.forEach((slide, i) => {
        slide.style.display = i === index ? "block" : "none";
      });
      currentIndex = index;
    }

    paginationButtons.forEach((button) => {
      button.addEventListener("click", function () {
        const index = parseInt(this.getAttribute("data-index"));
        showSlide(index);
      });
    });

    // Initialize the slider
    showSlide(currentIndex);
  });
});
