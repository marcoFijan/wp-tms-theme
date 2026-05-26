export default class VideoController {
  constructor(selector = "[data-media-video]") {
    this.selector = selector;
    this.consentType = "optional";
    this.init();
  }

  init() {
    document.querySelectorAll(this.selector).forEach((videoContainer) => {
      this.initVideo(videoContainer);
    });

    document.addEventListener("cookieConsentGranted", (e) => {
      if (e.detail.type !== this.consentType) return;

      document.querySelectorAll(this.selector).forEach((videoContainer) => {
        const embedContainer = videoContainer.querySelector(".video-embed");
        const videoUrl = embedContainer?.dataset.videoUrl;
        if (embedContainer && embedContainer.dataset.videoLoaded !== "true" && videoUrl) {
          this.loadVideo(embedContainer, videoUrl);
        }
      });
    });
  }

  initVideo(videoContainer) {
    const thumbnail = videoContainer.querySelector(".video-thumbnail");
    const videoElement = videoContainer.querySelector("video");
    const embedContainer = videoContainer.querySelector(".video-embed");
    const consentButton = embedContainer?.querySelector(".video-consent button");
    const videoUrl = embedContainer?.dataset.videoUrl;

    if (videoElement && thumbnail) {
      const playButton = thumbnail.querySelector("[data-play]") || thumbnail;
      playButton.addEventListener("click", () => {
        videoElement.play();
        thumbnail.classList.add("hidden");
      });
    } else if (embedContainer && videoUrl && consentButton) {
      if (window.cookieConsent && window.cookieConsent.hasConsent(this.consentType)) {
        embedContainer?.querySelector(".video-consent")?.remove();
      }

      consentButton.addEventListener("click", () => {
        if (embedContainer.dataset.videoLoaded === "true") return;
        window.cookieConsent?.grantConsent(this.consentType);
      });

      if (thumbnail) {
        const playButton = thumbnail.querySelector("[data-play]") || thumbnail;
        playButton.addEventListener("click", () => {
          this.loadVideo(embedContainer, videoUrl);
          thumbnail.classList.add("hidden");
        });
      }
    }
  }

  loadVideo(container, url) {
    if (container.dataset.videoLoaded === "true") return;

    const iframe = document.createElement("iframe");
    iframe.src = this.getEmbedUrl(url);
    iframe.setAttribute("frameborder", "0");
    iframe.setAttribute("allowfullscreen", "");
    iframe.classList.add("w-full", "h-full");
    iframe.setAttribute("allow", "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture");

    container?.querySelector(".video-consent")?.remove();
    container.appendChild(iframe);
    container.dataset.videoLoaded = "true";
  }

  getEmbedUrl(url) {
    if (url.includes("youtube.com") || url.includes("youtu.be")) {
      return `https://www.youtube-nocookie.com/embed/${this.extractYouTubeId(url)}?autoplay=1`;
    }
    if (url.includes("vimeo.com")) {
      return `https://player.vimeo.com/video/${this.extractVimeoId(url)}?autoplay=1`;
    }
    return url;
  }

  extractYouTubeId(url) {
    const match = url.match(/(?:youtube(?:-nocookie)?\.com\/(?:.*v=|v\/|embed\/)|youtu\.be\/)([^"&?/ ]{11})/);
    return match ? match[1] : "";
  }

  extractVimeoId(url) {
    const match = url.match(/vimeo\.com\/(\d+)/);
    return match ? match[1] : "";
  }
}
