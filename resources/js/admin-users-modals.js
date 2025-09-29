function closeModal(id) {
    document.getElementById(id).classList.add("hidden");
}

document.addEventListener("DOMContentLoaded", function () {
    // View Modal
    document
        .querySelectorAll('button[data-modal="viewModal"]')
        .forEach((btn) => {
            btn.onclick = function () {
                const modal = document.getElementById("viewModal");
                [
                    "id",
                    "name",
                    "email",
                    "cpf",
                    "birth_date",
                    "phone",
                    "is_admin",
                    "rua",
                    "numero",
                    "bairro",
                    "cidade",
                    "estado",
                    "cep",
                    "complemento",
                    "created_at",
                ].forEach((field) => {
                    document.getElementById("view-" + field).textContent =
                        btn.getAttribute("data-" + field) || "";
                });
                modal.classList.remove("hidden");
            };
        });

    // Edit Modal
    document
        .querySelectorAll('button[data-modal="editModal"]')
        .forEach((btn) => {
            btn.onclick = function () {
                const modal = document.getElementById("editModal");
                const form = document.getElementById("editUserForm");
                form.action = `/admin/users/${btn.getAttribute("data-id")}`;
                [
                    "name",
                    "email",
                    "cpf",
                    "birth_date",
                    "phone",
                    "is_admin",
                    "rua",
                    "numero",
                    "bairro",
                    "cidade",
                    "estado",
                    "cep",
                    "complemento",
                ].forEach((field) => {
                    const el = document.getElementById("edit-" + field);
                    if (el) {
                        if (el.tagName === "SELECT") {
                            el.value =
                                btn.getAttribute("data-" + field) == "1"
                                    ? "1"
                                    : "0";
                        } else {
                            el.value = btn.getAttribute("data-" + field) || "";
                        }
                    }
                });
                modal.classList.remove("hidden");
            };
        });

    // Delete Modal
    document
        .querySelectorAll('button[data-modal="deleteModal"]')
        .forEach((btn) => {
            btn.onclick = function () {
                const modal = document.getElementById("deleteModal");
                document.getElementById("delete-name").textContent =
                    btn.getAttribute("data-name");
                const form = document.getElementById("deleteUserForm");
                form.action = `/admin/users/${btn.getAttribute("data-id")}`;
                modal.classList.remove("hidden");
            };
        });

    // Create Modal (opcional: abrir via botão se quiser)
    if (document.querySelectorAll('a[href="/admin/users/create"]').length) {
        document
            .querySelectorAll('a[href="/admin/users/create"]')
            .forEach((btn) => {
                btn.onclick = function (e) {
                    e.preventDefault();
                    document
                        .getElementById("createModal")
                        .classList.remove("hidden");
                };
            });
    }

    // Fechar modais (todos os botões com atributo data-close ou classe .close-modal)
    document.querySelectorAll("[data-close], .close-modal").forEach((btn) => {
        btn.addEventListener("click", function () {
            const target = btn.getAttribute("data-close") || btn.dataset.close;
            if (target) {
                closeModal(target);
            } else {
                // fallback: fecha o modal pai
                btn.closest(".fixed").classList.add("hidden");
            }
        });
    });
});
