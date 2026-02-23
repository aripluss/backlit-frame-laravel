export function getCategoryFromURL() {
  const params = new URLSearchParams(window.location.search);
  return params.get("category") || "";
}

export function getPageFromURL() {
  const params = new URLSearchParams(window.location.search);
  return params.get("page") || "1";
}
