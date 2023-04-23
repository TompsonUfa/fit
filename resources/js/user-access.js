window.addEventListener("DOMContentLoaded", () => {
    let modal = document.querySelector(".modal-extend"),
        modalUser = modal.querySelector(".modal-extend__user"),
        modalDate = modal.querySelector(".modal-extend__date"),
        modalInput = modal.querySelector(".modal-extend__input"),
        modalBtn = modal.querySelector(".modal-extend__btn");
    modal = bootstrap.Modal.getOrCreateInstance(modal);
    const newAccess = { userId: "", user: "", date: "", addDays: 0 };

    const updateTable = (id, status, date) => {
        const table = document.querySelector(".table-users"),
            users = table.querySelectorAll("tr");
        for (let i = 0; i < users.length; i++) {
            if (users[i].dataset.itemId == id) {
                if (date != null) {
                    let userDate = users[i].querySelector(".table-users__date");
                    userDate.textContent = date;
                }
                let userStatus = users[i].querySelector(".table-users__status");
                userStatus.textContent = status;
            }
        }
    };

    modalInput.addEventListener("input", (event) => {
        const text = event.target.value;
        event.target.value = text.replace(/\D/g, "");
        newAccess.addDays = event.target.value;
        if (event.target.value.length > 0) {
            modalBtn.disabled = false;
        } else {
            modalBtn.disabled = true;
        }
    });

    window.addEventListener("click", (event) => {
        const target = event.target;
        if (target.classList.contains("table__btn_remove")) {
            const user = target.closest("tr"),
                userId = user.dataset.itemId;
            $.ajax({
                url: "/admin/users/blocked",
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: {
                    id: userId,
                },
                success: function (response) {
                    updateTable(userId, "Закрыт", response.newDate);
                    const alert = document.querySelector(".alert");
                    alert.classList.add("d-block");
                    alert.textContent = response.message;
                    setTimeout(() => alert.classList.remove("d-block"), 5000);
                },
                error: function (response) {
                    console.log(response);
                },
            });
        }
        if (target.classList.contains("table__btn_edit")) {
            const user = target.closest("tr"),
                userEmail = user.querySelector(
                    ".table-users__email"
                ).textContent,
                userDate = user.querySelector(".table-users__date").textContent;

            newAccess.userId = user.dataset.itemId;
            newAccess.user = userEmail;
            newAccess.date = userDate;

            modalUser.textContent = "Пользователь: " + newAccess.user.trim();
            modalDate.textContent = "Срок доступа: " + newAccess.date.trim();
            modal.show();
        }
        if (target.classList.contains("modal-extend__btn")) {
            $.ajax({
                url: "/admin/users/extend",
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: {
                    newAccess: newAccess,
                },
                success: function (response) {
                    modal.hide();
                    modalInput.value = "";
                    updateTable(newAccess.userId, "Открыт", response.newDate);
                    const alert = document.querySelector(".alert");
                    alert.classList.add("d-block");
                    alert.textContent = response.message;
                    setTimeout(() => alert.classList.remove("d-block"), 5000);
                },
                error: function (response) {
                    console.log(response);
                },
            });
        }
    });
});
