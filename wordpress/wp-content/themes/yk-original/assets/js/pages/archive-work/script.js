document.addEventListener("DOMContentLoaded", async () => {
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
