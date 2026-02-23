export function initToggleImage() {
  const toggleBtn = document.querySelector(".js-light-toggle");
  const toggleText = toggleBtn?.querySelector("span") || toggleBtn;
  const img = document.querySelector(".product__image, .hero__image");

  if (!toggleBtn || !toggleText || !img) return;

  const originalSrc = img.src;
  const originalAlt = img.alt;
  const originalSrcset = img.srcset || null;

  // src
  const lightOffSrc = originalSrc.replace(/(\.[a-z]+)$/i, "--light-off$1");

  // srcset
  let lightOffSrcset = null;
  if (originalSrcset) {
    lightOffSrcset = originalSrcset
      .split(",")
      .map((s) => s.trim().replace(/(\.[a-z]+)(@2x)?/i, "--light-off$1$2"))
      .join(", ");
  }

  let lightOn = true;

  toggleBtn.addEventListener("click", () => {
    lightOn = !lightOn;

    // btn
    toggleText.textContent = lightOn ? "💡 Вимкнути" : "💡 Увімкнути";

    // image change
    img.src = lightOn ? originalSrc : lightOffSrc;
    if (originalSrcset) img.srcset = lightOn ? originalSrcset : lightOffSrcset;
    img.alt = lightOn ? originalAlt : originalAlt + " (без підсвітки)";
  });
}
