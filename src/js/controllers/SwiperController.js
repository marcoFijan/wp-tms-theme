import Swiper from "swiper";
import { Autoplay, EffectFade, Navigation, Pagination } from "swiper/modules";

export default class SwiperController {
  constructor(selector = ".swiper-container") {
    this.selector = selector;
    this.sliders = [];
    this.init();
  }

  init() {
    const containers = document.querySelectorAll(this.selector);
    if (!containers.length) return;

    const defaultSettings = {
      modules: [Navigation, Pagination, EffectFade, Autoplay],
      slidesPerView: 1,
      spaceBetween: 16,
      speed: 1000,
      loop: true,
      grabCursor: true,
      effect: "slide",
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        prevEl: ".swiper-button-prev",
        nextEl: ".swiper-button-next",
      },
    };

    containers.forEach((container) => {
      let settings = { ...defaultSettings };
      let isGallery = container.classList.contains("gallery");

      if (isGallery) {
        settings = {
          ...settings,
          slidesPerView: 3,
          spaceBetween: 0,
          centeredSlides: true,
          loop: true,
          grabCursor: true,
          speed: 800,
          effect: "coverflow",
          coverflowEffect: {
            rotate: 35,
            stretch: 0,
            depth: 200,
            modifier: 1,
            slideShadows: false,
          },
        };
      }

      const swiper = new Swiper(container, settings);

      if (isGallery) {
        const updateFarSlides = () => {
          const active = swiper.activeIndex;
          swiper.slides.forEach((slide, index) => {
            slide.classList.remove("is-far-left", "is-far-right");
            if (index < active - 1) {
              slide.classList.add("is-far-left");
            } else if (index > active + 1) {
              slide.classList.add("is-far-right");
            }
          });
        };

        updateFarSlides();
        swiper.on("slideChangeTransitionStart", updateFarSlides);
      }

      this.sliders.push(swiper);
    });
  }
}
