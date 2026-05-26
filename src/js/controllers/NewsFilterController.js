export default class NewsFilterController {
  constructor(selector = "#news-category-filters") {
    this.selector = selector;
    this.checkboxes = document.querySelectorAll(".category-filter-checkbox");
    this.allCheckbox = document.getElementById("filter-all");
    this.newsContainer = document.getElementById("news-grid-container");
    this.loadingIndicator = document.getElementById("news-loading");
    this.selectedCategories = [];

    this.init();
  }

  init() {
    if (!this.newsContainer) return;

    const urlParams = new URLSearchParams(window.location.search);
    const catParam = urlParams.get("cat_news");
    if (catParam) {
      this.selectedCategories = catParam.split(",");
    }

    this.updateCheckboxStates();
    this.bindEvents();
  }

  bindEvents() {
    this.checkboxes.forEach((cb) => {
      cb.addEventListener("change", (e) => {
        const target = e.currentTarget;
        if (target.value === "all") {
          this.selectedCategories = [];
        } else {
          if (target.checked) {
            this.selectedCategories.push(target.value);
          } else {
            this.selectedCategories = this.selectedCategories.filter((id) => id !== target.value);
          }
        }
        this.updateCheckboxStates();
        this.loadNews(1);
      });
    });

    document.addEventListener("click", (e) => {
      const link = e.target.closest(".page-numbers");
      if (!link) return;

      e.preventDefault();
      if (link.classList.contains("current")) return;

      const url = new URL(link.href);
      let page = 1;
      const pathMatch = url.pathname.match(/\/page\/(\d+)\/?$/);
      if (pathMatch) {
        page = parseInt(pathMatch[1], 10);
      } else {
        page = url.searchParams.get("paged") || 1;
      }
      this.loadNews(page);
    });
  }

  updateCheckboxStates() {
    const isAll = this.selectedCategories.length === 0;
    if (this.allCheckbox) this.allCheckbox.checked = isAll;

    this.checkboxes.forEach((cb) => {
      if (cb.value !== "all") {
        cb.checked = this.selectedCategories.includes(cb.value);
      }
    });
  }

  loadNews(page = 1) {
    this.newsContainer.style.opacity = "0.5";
    this.loadingIndicator.classList.remove("hidden");

    const formData = new FormData();
    formData.append("action", "filter_news");
    formData.append("categories", this.selectedCategories.join(","));
    formData.append("paged", page);
    formData.append("nonce", window.newsArchiveData?.nonce || "");

    fetch(window.newsArchiveData?.ajaxUrl || "/wp-admin/admin-ajax.php", {
      method: "POST",
      body: formData,
    })
      .then((res) => res.json())
      .then((data) => {
        if (!data.success) return;

        this.newsContainer.innerHTML = data.data.html;

        const baseUrl = window.location.origin + window.location.pathname.replace(/\/page\/\d+\/?$/, "");
        const url = new URL(baseUrl);

        if (this.selectedCategories.length) {
          url.searchParams.set("cat_news", this.selectedCategories.join(","));
        }
        if (page > 1) {
          url.searchParams.set("paged", page);
        }

        window.history.pushState({}, "", url);
      })
      .catch(console.error)
      .finally(() => {
        this.newsContainer.style.opacity = "1";
        this.loadingIndicator.classList.add("hidden");
      });
  }
}
