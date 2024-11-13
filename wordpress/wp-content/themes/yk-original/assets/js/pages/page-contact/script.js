document.addEventListener("DOMContentLoaded", async () => {
  // ルートURLを取得
  const url = new URL(window.location.href);
  const rootUrl = url.hostname;
  console.log(rootUrl);

  // 本番環境以外の場合、formの値を自動入力
  if (!rootUrl.includes("yk-rm.co.jp")) {
    document.querySelector(".firstview").addEventListener("click", function () {
      const inputs = document.querySelectorAll("input");
      inputs.forEach((input) => {
        if (input.type === "date") {
          input.value = "2024-11-22";
        } else if (input.name === "user_tel") {
          input.value = "00000000000";
        } else if (input.name === "user_email") {
          input.value = "x.yusuke.x@icloud.com";
        } else if (input.type === "checkbox") {
          input.checked = true;
        } else {
          input.value = "自動入力された値";
        }
      });

      const selectElements = document.querySelectorAll("select");
      selectElements.forEach((selectElement) => {
        selectElement.selectedIndex = 1;
      });
    });
  }
});
