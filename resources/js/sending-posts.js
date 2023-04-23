document.addEventListener("DOMContentLoaded", function () {
    var loader = document.querySelector(".loader"),
        bar = document.querySelector(".loader__bar");
    $("form").ajaxForm({
        beforeSend: function () {
            let percentage = "0%";
            bar.innerHTML = percentage;
            loader.classList.add("loader_visible");
            document.querySelector("body").classList.add("overflow-hidden");
        },
        uploadProgress: function (event, position, total, percentComplete) {
            let percentage = percentComplete + "%";
            bar.innerHTML = percentage;
        },
        success: function (response) {
            loader.classList.remove("loader_visible");
            document.querySelector("body").classList.remove("overflow-hidden");
            if (response.url) {
                window.location = response.url;
            } else {
                const alert = document.querySelector(".alert");
                alert.classList.add("d-block");
                alert.textContent = response.success;
                setTimeout(() => alert.classList.remove("d-block"), 5000);
            }
        },
        error: function (response) {
            loader.classList.remove("loader_visible");
            document.querySelector("body").classList.remove("overflow-hidden");
            let modal = document.querySelector(".modal"),
                modalText = modal.querySelector(".modal-body");
            const errors = response.responseJSON.errors,
                div = document.createElement("div"),
                ul = document.createElement("ul");
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
});
