export default class ConsentController {
  constructor() {
    this.keys = {
      essential: "cookie-consent-essential",
      functional: "cookie-consent-functional",
      optional: "cookie-consent-optional",
    };
  }

  hasConsent(type) {
    return localStorage.getItem(this.keys[type]) === "true";
  }

  grantConsent(type) {
    if (!this.keys[type]) return;
    localStorage.setItem(this.keys[type], "true");
    document.dispatchEvent(new CustomEvent("cookieConsentGranted", { detail: { type } }));
  }

  revokeConsent(type) {
    if (!this.keys[type]) return;
    localStorage.removeItem(this.keys[type]);
    document.dispatchEvent(new CustomEvent("cookieConsentRevoked", { detail: { type } }));
  }

  grantMultiple(types = []) {
    types.forEach((type) => this.grantConsent(type));
  }

  getKeys() {
    return { ...this.keys };
  }
}
