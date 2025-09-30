document.addEventListener("DOMContentLoaded", () => {
    const openModalButtons = document.querySelectorAll("[data-modal]");

    openModalButtons.forEach((button) => {
        button.addEventListener("click", () => {
            const modalId = button.dataset.modal;
            const modal = document.getElementById(modalId);

            if (!modal) return;

            modal.classList.remove("hidden");

            Object.keys(button.dataset).forEach((key) => {
                if (key === "modal") return;
                const targetEl = modal.querySelector(`[data-target="${key}"]`);
                if (targetEl) {
                    if (key === "photopath") {
                        if (
                            button.dataset[key] &&
                            button.dataset[key] !== "null"
                        ) {
                            let path = button.dataset[key];
                            if (!path.startsWith("/")) path = "/" + path;
                            targetEl.src = "/storage" + path;
                        } else {
                            targetEl.src = "/images/placeholder.png";
                        }
                        return;
                    }
                    if (targetEl.tagName === "SELECT") {
                        targetEl.value = button.dataset[key];
                        return;
                    }
                    if (targetEl.tagName === "INPUT") {
                        if (targetEl.type === "date") {
                            let val = button.dataset[key];
                            if (val && val.length > 10)
                                val = val.substring(0, 10);
                            targetEl.value = val;
                            return;
                        }
                        targetEl.value = button.dataset[key];
                        return;
                    }
                    if (key === "price") {
                        targetEl.textContent =
                            "R$" + button.dataset[key].replace(".", ",");
                        return;
                    }
                    targetEl.textContent = button.dataset[key];
                }
            });
            // Integração ViaCEP para modal de edição de usuário
            if (modalId === "user-edit-modal") {
                const cepInput = modal.querySelector('[name="cep"]');
                let errorMsg = modal.querySelector("#cep-error-msg");
                if (!errorMsg) {
                    errorMsg = document.createElement("div");
                    errorMsg.id = "cep-error-msg";
                    errorMsg.textContent = "CEP não encontrado.";
                    errorMsg.style.display = "none";
                    errorMsg.style.color = "#e53e3e";
                    errorMsg.style.fontWeight = "bold";
                    errorMsg.style.textAlign = "center";
                    errorMsg.style.margin = "10px auto";
                    modal.querySelector("form").prepend(errorMsg);
                }
                if (cepInput && !cepInput.dataset.cepListenerAdded) {
                    cepInput.addEventListener("input", async function () {
                        const cep = cepInput.value.replace(/\D/g, "");
                        if (cep.length === 8) {
                            try {
                                const res = await fetch(
                                    `https://viacep.com.br/ws/${cep}/json/`
                                );
                                const data = await res.json();
                                if (!data.erro) {
                                    errorMsg.style.display = "none";
                                    const rua =
                                        modal.querySelector('[name="rua"]');
                                    const bairro =
                                        modal.querySelector('[name="bairro"]');
                                    const cidade =
                                        modal.querySelector('[name="cidade"]');
                                    const estado =
                                        modal.querySelector('[name="estado"]');
                                    if (rua) rua.value = data.logradouro || "";
                                    if (bairro)
                                        bairro.value = data.bairro || "";
                                    if (cidade)
                                        cidade.value = data.localidade || "";
                                    if (estado) estado.value = data.uf || "";
                                } else {
                                    errorMsg.style.display = "block";
                                }
                            } catch (e) {
                                errorMsg.style.display = "block";
                            }
                        } else {
                            errorMsg.style.display = "none";
                        }
                    });
                    cepInput.dataset.cepListenerAdded = "true";
                }
            }

            const sendForm = modal.querySelector("form");
            if (sendForm) {
                // Produto
                if (modalId === "product-edit-modal" && button.dataset.id) {
                    sendForm.action = `/admin/products/${button.dataset.id}`;
                    sendForm.method = "POST";
                    let methodInput = sendForm.querySelector(
                        'input[name="_method"]'
                    );
                    if (methodInput) methodInput.value = "PATCH";
                } else if (modalId === "product-create-modal") {
                    sendForm.action = `/admin/products`;
                    sendForm.method = "POST";
                    let methodInput = sendForm.querySelector(
                        'input[name="_method"]'
                    );
                    if (methodInput) methodInput.value = "POST";
                } else if (
                    modalId === "product-delete-modal" &&
                    button.dataset.id
                ) {
                    sendForm.action = `/admin/products/${button.dataset.id}`;
                    sendForm.method = "POST";
                    let methodInput = sendForm.querySelector(
                        'input[name="_method"]'
                    );
                    if (methodInput) methodInput.value = "DELETE";
                }
                // Usuário
                else if (modalId === "user-edit-modal" && button.dataset.id) {
                    sendForm.action = `/admin/users/${button.dataset.id}`;
                    sendForm.method = "POST";
                    let methodInput = sendForm.querySelector(
                        'input[name="_method"]'
                    );
                    if (methodInput) methodInput.value = "PUT";
                } else if (modalId === "user-create-modal") {
                    sendForm.action = `/admin/users`;
                    sendForm.method = "POST";
                    let methodInput = sendForm.querySelector(
                        'input[name="_method"]'
                    );
                    if (methodInput) methodInput.value = "POST";
                } else if (
                    modalId === "user-delete-modal" &&
                    button.dataset.id
                ) {
                    sendForm.action = `/admin/users/${button.dataset.id}`;
                    sendForm.method = "POST";
                    let methodInput = sendForm.querySelector(
                        'input[name="_method"]'
                    );
                    if (methodInput) methodInput.value = "DELETE";
                }
            }
            // Atualiza o botão "Ver Página" com o link correto
            const viewPageBtn = modal.querySelector("#viewProductPageBtn");
            if (viewPageBtn && button.dataset.id) {
                viewPageBtn.href = `/produto/${button.dataset.id}`;
            }

            const closeButtons = modal.querySelectorAll("[data-close]");
            closeButtons.forEach((closeButton) => {
                closeButton.addEventListener("click", () => {
                    modal.classList.add("hidden");
                });
            });

            modal.addEventListener("mousedown", (event) => {
                if (event.target === modal) {
                    modal.classList.add("hidden");
                }
            });

            const imagePreview = modal.querySelector(".imagePreview");
            const photoInput = modal.querySelector(".photoInput");

            // Adiciona o listener apenas uma vez
            if (
                imagePreview &&
                photoInput &&
                !imagePreview.dataset.listenerAdded
            ) {
                imagePreview.addEventListener("click", () => {
                    photoInput.click();
                });
                imagePreview.dataset.listenerAdded = "true";
            }

            if (photoInput && !photoInput.dataset.listenerAdded) {
                photoInput.addEventListener("change", (event) => {
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
