export function initBurgerMenu() {
  const burger = document.querySelector(".burger");
  const mobileMenu = document.getElementById("mobile-menu");
  const navLinks = mobileMenu?.querySelectorAll(".nav__link");

  if (!burger || !mobileMenu) return;

  const toggleMenu = () => {
    const isOpen = burger.getAttribute("aria-expanded") === "true";
    burger.setAttribute("aria-expanded", !isOpen);
    mobileMenu.classList.toggle("is-open");
    document.body.classList.toggle("no-scroll");
  };

  // Клік по бургеру
  burger.addEventListener("click", toggleMenu);

  // Клік по пункту меню - закрити меню
  navLinks?.forEach((link) => {
    link.addEventListener("click", () => {
      burger.setAttribute("aria-expanded", false);
      mobileMenu.classList.remove("is-open");
      document.body.classList.remove("no-scroll");
    });
  });

  // Закрити модалку при ресайзі
  window.matchMedia("(min-width: 768px)").addEventListener("change", (e) => {
    if (!e.matches) return;
    burger.setAttribute("aria-expanded", false);
    mobileMenu.classList.remove("is-open");
    document.body.classList.remove("no-scroll");
  });
}
