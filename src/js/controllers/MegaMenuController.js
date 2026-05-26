export default class MegaMenuController {
  constructor(selector = "[data-mega-menu]") {
    this.container = document.querySelector(selector);
    if (!this.container) return;

    this.menuButton = this.container.querySelector('button[aria-controls="mega-menu"]');
    this.mobileMenuHeader = this.container.querySelector("#mobile-menu-header");
    this.items = this.container.querySelectorAll('li[aria-haspopup="true"]');
    this.lgBreakpoint = getComputedStyle(document.documentElement).getPropertyValue("--tw-lg").trim();
    this.isDesktop = window.matchMedia(`(min-width: ${this.lgBreakpoint})`).matches;
    this.defaultTitle = this.mobileMenuHeader.querySelector("span").textContent;
    this.resizeTimeout = null;

    this.init();
  }

  init() {
    if (this.isDesktop && this.items.length) {
      this.activateItem(this.items[0]);
    }
    this.bindEvents();
  }

  setMobileMenuTitle(item) {
    const titleElement = this.mobileMenuHeader.querySelector("span");
    if (!item) {
      titleElement.textContent = this.defaultTitle;
      return;
    }
    titleElement.textContent = item.querySelector("[data-sub-title]").textContent;
  }

  deactivateItem(item) {
    item.setAttribute("aria-expanded", "false");
    const submenu = item.querySelector("#" + item.getAttribute("aria-controls"));
    if (submenu) submenu.setAttribute("aria-hidden", "true");
  }

  deactivateAll() {
    this.items.forEach((item) => this.deactivateItem(item));
  }

  activateItem(item) {
    this.deactivateAll();
    if (!item) return;

    item.setAttribute("aria-expanded", "true");
    const submenu = item.querySelector("#" + item.getAttribute("aria-controls"));
    if (submenu) submenu.setAttribute("aria-hidden", "false");
  }

  resetMenus() {
    this.menuButton.setAttribute("aria-expanded", "false");
    document.querySelector("main")?.classList.remove("menu-overlay");
    document.body.classList.remove("overflow-hidden");
    this.deactivateAll();
    this.setMobileMenuTitle(null);
  }

  closeMenu() {
    this.menuButton.setAttribute("aria-expanded", "false");
    document.querySelector("main")?.classList.remove("menu-overlay");
    document.body.classList.remove("overflow-hidden");
  }

  toggleMenu() {
    const isOpen = this.menuButton.getAttribute("aria-expanded") === "true";
    this.menuButton.setAttribute("aria-expanded", String(!isOpen));
    document.querySelector("main")?.classList.toggle("menu-overlay", !isOpen);
    document.body.classList.toggle("overflow-hidden", !isOpen);
  }

  bindEvents() {
    // Menu Button
    this.menuButton.addEventListener("click", () => this.toggleMenu());

    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape" || e.key === "Esc") {
        if (this.menuButton.getAttribute("aria-expanded") === "true") {
          this.closeMenu();
        }
      }
    });

    // Mobile Header Button
    this.mobileMenuHeader.querySelector("button").addEventListener("click", () => {
      if (this.isDesktop) return;
      const activeItem = this.container.querySelector('li[aria-haspopup="true"][aria-expanded="true"]');
      if (activeItem) {
        this.deactivateAll();
        this.setMobileMenuTitle(null);
      } else {
        this.menuButton.click();
      }
    });

    // Menu Items
    this.items.forEach((item) => {
      const link = item.querySelector("a");
      const button = item.querySelector("button");

      if (link) {
        link.addEventListener("mouseover", () => {
          if (!this.isDesktop) return;
          this.activateItem(item);
        });
      }

      if (button) {
        button.addEventListener("click", () => {
          if (this.isDesktop) return;
          this.activateItem(item);
          this.setMobileMenuTitle(item);
        });
      }
    });

    // Resize
    window.addEventListener("resize", () => {
      if (this.resizeTimeout) return;
      this.resizeTimeout = setTimeout(() => {
        const nowDesktop = window.matchMedia(`(min-width: ${this.lgBreakpoint})`).matches;
        if (nowDesktop !== this.isDesktop) {
          this.resetMenus();
          if (nowDesktop && this.items.length) this.activateItem(this.items[0]);
        }
        this.isDesktop = nowDesktop;
        this.resizeTimeout = null;
      }, 150);
    });
  }
}
