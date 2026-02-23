export function initFooterYear() {
  const year = document.getElementById("year");

  year.textContent = new Date().getFullYear();
}
