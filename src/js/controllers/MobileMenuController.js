export default class MobileMenuController {
  constructor(selector = 'nav[role="navigation"]') {
    this.navigation = document.querySelector(selector);
    if (!this.navigation) return;

    this.hamburger = this.navigation.querySelector("#hamburger");
    this.menu = this.navigation.querySelector("#primary-menu");
    this.resizeTimeout = null;

    this.init();
  }

  init() {
    if (!this.hamburger || !this.menu) return;

    this.hamburger.addEventListener("click", () => {
      const isOpen = this.hamburger.getAttribute("aria-expanded") === "true";
      document.body.classList.toggle("overflow-hidden", !isOpen);

      this.hamburger.setAttribute("aria-expanded", String(!isOpen));
      this.hamburger.setAttribute("aria-label", isOpen ? "Open menu" : "Close menu");

      this.menu.setAttribute("aria-expanded", String(!isOpen));
      this.navigation.setAttribute("aria-expanded", String(!isOpen));
    });

    window.addEventListener("resize", () => {
      if (this.resizeTimeout) return;

      this.resizeTimeout = setTimeout(() => {
        this.hamburger.setAttribute("aria-expanded", "false");
        this.hamburger.setAttribute("aria-label", "Open menu");
        this.menu.setAttribute("aria-expanded", "false");
        this.navigation.setAttribute("aria-expanded", "false");

        document.body.classList.remove("overflow-hidden");
        this.resizeTimeout = null;
      }, 150);
    });
  }
}
