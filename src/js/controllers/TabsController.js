export default class TabsController {
  constructor(selector = ".tabs-wrapper") {
    this.selector = selector;
    this.init();
  }

  init() {
    document.querySelectorAll(this.selector).forEach((tab) => {
      const buttons = tab.querySelectorAll(".tab-button");
      const contents = tab.querySelectorAll(".tab-content");

      buttons.forEach((button) => {
        button.addEventListener("click", (e) => {
          const target = e.currentTarget;
          const tabId = target.getAttribute("data-tab");

          buttons.forEach((btn) => btn.setAttribute("aria-selected", "false"));
          target.setAttribute("aria-selected", "true");

          contents.forEach((content) => content.classList.add("hidden"));
          tab.querySelector(`.tab-content[data-tab='${tabId}']`).classList.remove("hidden");
        });
      });
    });
  }
}
