window.addEventListener("DOMContentLoaded", function () {
    const boxUsers = document.querySelector(".adding-users");
    if (boxUsers != null) {
        const input = boxUsers.querySelector(".adding-users__input");
        const btnAdd = boxUsers.querySelector(".adding-users__add");
        const listUsers = boxUsers.querySelector(".adding-users__list");
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        var valueInput = [];
        var emailList = [];

        const renderList = (listUsers, emailList) => {
            listUsers.innerHTML = "";
            emailList.forEach((email, i) => {
                let item = `
            <div class="adding-users__item" data-user-id=${i} >
                <input class="adding-users__email form-control" type="text" value="${email}">
                <div class="adding-users__controls">
                    <div class="adding-users__remove">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-x-square"
                            viewBox="0 0 16 16">
                            <path
                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                            <path
                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </div>
                </div>
            </div>
            `;
                listUsers.insertAdjacentHTML("beforeend", item);
            });
            checkList(emailList);
        };

        const checkList = (emailList) => {
            const listUsers = document.querySelector(".adding-users__result");
            const btnSubmit = this.document.querySelector(".btn-submit");
            if (emailList.length == 0) {
                listUsers.style.display = "none";
                btnSubmit.style.display = "none";
            } else {
                listUsers.style.display = "block";
                btnSubmit.style.display = "block";
            }
        };

        window.addEventListener("click", (event) => {
            if (event.target === btnAdd) {
                input.value = "";
                valueInput.forEach((object) => {
                    if (emailRegex.test(object)) {
                        if (emailList.indexOf(object) < 0) {
                            emailList.push(object);
                        }
                    }
                });
                valueInput = [];
                renderList(listUsers, emailList);
            }
            if (event.target.classList.contains("adding-users__remove")) {
                const user = event.target.closest(".adding-users__item");
                const userId = user.dataset.userId;
                emailList.splice(userId, 1);
                user.remove();
                renderList(listUsers, emailList);
            }
            if (event.target.classList.contains("btn-submit")) {
                const loader = document.querySelector(".loader");
                loader.classList.add("loader_visible");
                $.ajax({
                    url: "",
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    data: {
                        emailList: emailList,
                    },
                    success: function (response) {
                        loader.classList.remove("loader_visible");
                        emailList = [];
                        checkList(emailList);
                        const alert = document.querySelector(".alert");
                        alert.classList.add("d-block");
                        alert.textContent = response.message;
                        setTimeout(() => alert.classList.remove("d-block"), 5000);
                    },
                    error: function (response) {
                        loader.classList.remove("loader_visible");

                        let modal = document.querySelector(".modal"),
                            modalText = modal.querySelector(".modal-body");

                        const errors = response.responseJSON.errors;
                        const div = document.createElement("div");
                        const ul = document.createElement("ul");
                        div.className = "alert alert-danger text-danger";

                        for (let key in errors) {
                            const li = document.createElement("li");
                            li.append(errors[key]);
                            ul.append(li);
                        }
                        div.append(ul);

                        modalText.replaceChild(div, modalText.childNodes[0]);
                        modal = bootstrap.Modal.getOrCreateInstance(modal);
                        modal.show();
                    },
                });
            }
        });

        window.addEventListener("input", (event) => {
            if (event.target.classList.contains("adding-users__email")) {
                const user = event.target.closest(".adding-users__item");
                const userId = user.dataset.userId;
                emailList[userId] = event.target.value;
            } else {
                const text = event.target.value;
                valueInput = text.split(/[ ,;]+/);
            }
        });

        checkList(emailList);
    }
});
