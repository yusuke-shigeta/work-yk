document.addEventListener("DOMContentLoaded", async () => {
  const url = new URL(window.location.href);
  const rootUrl = url.hostname;
  console.log(rootUrl);

  if (!rootUrl.includes("yk-rm.co.jp")) {
    document.querySelector(".firstview").addEventListener("click", function () {
      const inputs = document.querySelectorAll("input");
      inputs.forEach((input) => {
        if (input.type === "date") {
          input.value = "2024-11-22";
        } else if (input.name === "user_tel") {
          input.value = "00000000000";
        } else {
          input.value = "自動入力された値";
        }
      });
    });
  }
});
