export function initProductOptions() {
    const sizeButtons = document.querySelectorAll(".product__size");
    const checkbox = document.querySelector(".product__checkbox");
    const priceElement = document.querySelector(".product__price-value");
    const sizeNote = document.querySelector(".product__price-note");

    const content = document.querySelector(".product__content");
    const productId = content.dataset.id;
    let selectedSize = content.dataset.size;
    let customDesign = content.dataset.custom === "1";

    async function calculatePrice() {
        try {
            const url = `/backlit-frame-laravel/public/product/${productId}?size=${selectedSize}&custom=${customDesign ? 1 : 0}&ajax=1`;

            const response = await fetch(url);
            const data = await response.json();

            priceElement.textContent = `${data.price} грн`;
            sizeNote.textContent = `обраний розмір ${data.selectedSize}`;
        } catch (err) {
            console.error("Error from calculatePrice()", err);
        }
    }

    // SIZE
    sizeButtons.forEach((btn) => {
        btn.addEventListener("click", async () => {
            sizeButtons.forEach((b) =>
                b.classList.remove("product__size--active"),
            );
            btn.classList.add("product__size--active");

            selectedSize = btn.dataset.size;
            await calculatePrice();
            updateURL();
        });
    });

    // CHECKBOX
    checkbox.addEventListener("change", async () => {
        customDesign = checkbox.checked;
        await calculatePrice();
        updateURL();
    });

    // URL UPDATE
    function updateURL() {
        const url = new URL(window.location);
        url.searchParams.set("size", selectedSize);
        if (customDesign) {
            url.searchParams.set("custom", "1");
        } else {
            url.searchParams.delete("custom");
        }
        window.history.replaceState({}, "", url);
    }

    calculatePrice();
}
