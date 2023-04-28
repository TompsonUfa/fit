document.addEventListener('DOMContentLoaded', function () {
    const file = document.querySelector('.file-input');
    if (file != null) {
        let prevText = file.querySelector('.prev-name'),
            filePrev = file.querySelector('.prev-img');
        file.querySelector("input").addEventListener("change", function () {
            if (this.files[0]) {
                let fileType = this.files[0].type,
                    fileName = this.files[0].name,
                    fr = new FileReader();
                fr.addEventListener("load", function () {
                    if (fileType.indexOf('video') > -1) {
                        filePrev.src = "";
                        prevText.innerText = fileName;
                        prevText.classList.remove('d-none');
                        filePrev.classList.add('d-none');
                    } else {
                        filePrev.src = fr.result;
                        prevText.classList.add('d-none');
                        filePrev.classList.remove('d-none');
                    }

                }, false);
                fr.readAsDataURL(this.files[0]);
            }
        });
    }
})

