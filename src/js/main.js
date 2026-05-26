import ConsentController from "./controllers/ConsentController";
import AccordionController from "./controllers/AccordionController";
import MegaMenuController from "./controllers/MegaMenuController";
import StripeAnimationController from "./controllers/StripeAnimationController";
import NewsFilterController from "./controllers/NewsFilterController";
import VideoController from "./controllers/VideoController";
import SwiperController from "./controllers/SwiperController";
import TabsController from "./controllers/TabsController";
import MobileMenuController from "./controllers/MobileMenuController";

class App {
  constructor() {
    window.app = this;

    window.cookieConsent = new ConsentController();

    this.initControllers([
      {
        name: "accordionController",
        class: AccordionController,
        selector: "[data-accordion]",
      },
      {
        name: "megaMenuController",
        class: MegaMenuController,
        selector: "[data-mega-menu]",
      },
      {
        name: "stripeAnimationController",
        class: StripeAnimationController,
        selector: ".gradient-canvas",
      },
      {
        name: "newsFilterController",
        class: NewsFilterController,
        selector: "#news-category-filters",
      },
      {
        name: "videoController",
        class: VideoController,
        selector: "[data-media-video]",
      },
      {
        name: "swiperController",
        class: SwiperController,
        selector: ".swiper-container",
      },
      {
        name: "tabsController",
        class: TabsController,
        selector: ".tabs-wrapper",
      },
      {
        name: "mobileMenuController",
        class: MobileMenuController,
        selector: "nav[role='navigation']",
      },
    ]);
  }

  initController(name, ControllerClass, selector, options = {}) {
    if (this[name]) {
      return this[name];
    }

    const element = document.querySelector(selector);
    if (!element) {
      return null;
    }

    this[name] = new ControllerClass(selector, options);
    return this[name];
  }

  initControllers(controllers) {
    controllers.forEach(({ name, class: ControllerClass, selector, options }) => {
      this.initController(name, ControllerClass, selector, options);
    });
  }
}

document.addEventListener("DOMContentLoaded", () => {
  new App();
});
