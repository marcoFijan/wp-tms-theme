export default class NavScroller {
  constructor(selector) {
    this.nav = document.querySelector(selector);
    this.menuToggle = document.getElementById("mobile-menu-toggle");
    this.threshold = 160;
    this.lastScrollY = 0;

    if (this.nav) {
      this.init();
    }
  }

  init() {
    if (this.menuToggle) {
      this.menuToggle.addEventListener("change", () => this.toggleMenu());
    }

    window.addEventListener(
      "resize",
      this.throttle(() => this.closeMenu(), 100),
    );
    window.addEventListener(
      "scroll",
      this.throttle(() => this.handleScroll(), 100),
    );
    window.addEventListener("keydown", (e) => {
      if (e.key === "Escape") this.closeMenu();
    });
  }

  toggleMenu() {
    if (this.menuToggle.checked) {
      document.body.style.overflow = "hidden";
    } else {
      document.body.style.overflow = "";
    }
  }

  closeMenu() {
    if (this.menuToggle && this.menuToggle.checked) {
      this.menuToggle.checked = false;
      document.body.style.overflow = "";
    }
  }

  handleScroll() {
    const currentScrollY = window.scrollY;

    if (currentScrollY !== this.lastScrollY) {
      this.closeMenu();
    }

    if (currentScrollY > this.threshold) {
      this.nav.setAttribute("data-scrolled", "true");
    } else {
      this.nav.setAttribute("data-scrolled", "false");
    }

    if (currentScrollY > this.lastScrollY && currentScrollY > this.threshold) {
      this.nav.setAttribute("aria-expanded", "false");
    } else {
      this.nav.setAttribute("aria-expanded", "true");
    }

    this.lastScrollY = currentScrollY;
  }

  throttle(func, limit) {
    let inThrottle;
    return function (...args) {
      const context = this;
      if (!inThrottle) {
        func.apply(context, args);
        inThrottle = true;
        setTimeout(() => (inThrottle = false), limit);
      }
    };
  }
}
