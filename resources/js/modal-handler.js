// resources/js/modal-handler.js

// Pega o modal e o botão de cancelar
const deleteModal = document.getElementById("deleteModal");
const viewModal = document.getElementById("viewModal");

if (viewModal){
    const closeButton = getElementById("closeButton");
}

// Checa se o modal realmente existe nesta página antes de continuar
if (deleteModal) {
    const cancelButton = document.getElementById("cancelButton");
    const itemNameSpan = document.getElementById("itemName");
    const deleteForm = document.getElementById("deleteForm");
    const openModalButtons = document.querySelectorAll(".open-delete-modal");

    openModalButtons.forEach((button) => {
        button.addEventListener("click", () => {
            const itemId = button.dataset.id;
            const itemName = button.dataset.name;

            itemNameSpan.textContent = itemName;
            // Lembre-se de ajustar a sua rota aqui!
            deleteForm.action = `/admin/products/${itemId}`;

            deleteModal.classList.remove("hidden");
        });
    });

    const closeModal = () => {
        deleteModal.classList.add("hidden");
    };

    cancelButton.addEventListener("click", closeModal);

    deleteModal.addEventListener("click", (event) => {
        if (event.target === deleteModal) {
            closeModal();
        }
    });
}
