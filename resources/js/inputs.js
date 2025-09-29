document.addEventListener("DOMContentLoaded", () => {
    const inputs = document.querySelectorAll(".placeholder-input");

    inputs.forEach((input) => {
        input.addEventListener("focus", () => {
            input.setAttribute("data-old-placeholder", input.placeholder);
            input.placeholder = "";
        });
        input.addEventListener("blur", () => {
            if (!input.value) {
                input.placeholder = input.getAttribute("data-old-placeholder") || "🔍 Buscar...";
            }
        });
    });
});