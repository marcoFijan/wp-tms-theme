export default class AccordionController {
  constructor(selector = "[data-accordion]") {
    this.selector = selector;
    this.init();
  }

  init() {
    const accordions = document.querySelectorAll(this.selector);
    if (!accordions.length) return;

    accordions.forEach((root) => this.initAccordion(root));
  }

  initAccordion(root) {
    const single = root.dataset.single === "true";
    const triggers = [...root.querySelectorAll('[role="button"][data-panel]')];

    triggers.forEach((trigger, index) => {
      const panel = trigger.nextElementSibling;
      trigger.setAttribute("aria-expanded", "false");
      panel.style.maxHeight = "0px";

      trigger.addEventListener("click", () => {
        const isOpen = trigger.getAttribute("aria-expanded") === "true";

        if (single) {
          triggers.forEach((other) => {
            if (other !== trigger) {
              const otherPanel = other.nextElementSibling;
              other.setAttribute("aria-expanded", "false");
              otherPanel.style.maxHeight = "0px";
            }
          });
        }

        if (isOpen) {
          trigger.setAttribute("aria-expanded", "false");
          panel.style.maxHeight = "0px";
        } else {
          trigger.setAttribute("aria-expanded", "true");
          panel.style.maxHeight = panel.scrollHeight + "px";
        }
      });

      // Optionally open first item
      if (index === 0) {
        trigger.setAttribute("aria-expanded", "true");
        panel.style.maxHeight = panel.scrollHeight + "px";
      }
    });
  }
}
