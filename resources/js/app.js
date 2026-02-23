import "./bootstrap";
import { initFooterYear } from "./footer-year.js";
import { initBurgerMenu } from "./burger.js";
import { initToggleImage } from "./toggle-image.js";
import { initProductOptions } from "./product-options.js";

async function initPage() {
    initBurgerMenu();
    initToggleImage();
    initFooterYear();

    initProductOptions();
}

initPage();
