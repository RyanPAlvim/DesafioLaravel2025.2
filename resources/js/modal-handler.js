document.addEventListener("DOMContentLoaded", () => {

    const openModalButtons = document.querySelectorAll("[data-modal]");

    openModalButtons.forEach((button) => {
        button.addEventListener("click", () => {

            const modalId = button.dataset.modal;
            const modal = document.getElementById(modalId);

            if(!modal) return;

            modal.classList.remove("hidden");

            Object.keys(button.dataset).forEach((key) => {

                if(key === "modal") return;
                const targetEl = modal.querySelector(`[data-target="${key}"]`);
                if (targetEl){
                    if(key === "photopath"){
                        targetEl.src = button.dataset[key]
                            ? "/storage/images/" + button.dataset[key]
                            : "/images/placeholder.png";
                        return;
                    }
                    if(targetEl.tagName === "SELECT"){
                        targetEl.value = button.dataset[key];
                        return;
                    }
                    if(targetEl.tagName === "INPUT"){
                        targetEl.value = button.dataset[key];
                        return;
                    }
                    if(key === "price"){
                        targetEl.textContent = "R$" + button.dataset[key].replace(".",",");
                        return;
                    }
                    targetEl.textContent = button.dataset[key];
                }
            });

            const sendForm = modal.querySelector("form");
            if(sendForm && button.dataset.id){
                sendForm.action = `/admin/products/${button.dataset.id}`;
            }

            const closeButtons = modal.querySelectorAll("[data-close]")
            closeButtons.forEach((closeButton) => {
                closeButton.addEventListener("click", () => {
                    modal.classList.add("hidden");
                });
            });

            modal.addEventListener("mousedown", (event) => {
                if(event.target === modal) {
                    modal.classList.add("hidden");
                }
            });

            const imagePreview = modal.querySelector('.imagePreview');
            const photoInput = modal.querySelector('.photoInput');

            // Adiciona o listener apenas uma vez
            if (imagePreview && photoInput && !imagePreview.dataset.listenerAdded) {
                imagePreview.addEventListener('click', () => {
                    photoInput.click();
                });
                imagePreview.dataset.listenerAdded = "true";
            }

            if (photoInput && !photoInput.dataset.listenerAdded) {
                photoInput.addEventListener('change', (event) => {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            imagePreview.src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                });
                photoInput.dataset.listenerAdded = "true";
            }
        });
    });
});