document.addEventListener('DOMContentLoaded', function () {
    function showModal() {
        let modal = document.querySelector('#exampleModal2');
        if (modal != null) {
            let btnOpenModal = document.querySelector('.panel-btns__item_open');
            modal = bootstrap.Modal.getOrCreateInstance(modal);
            modal.show();
            btnOpenModal.classList.add('panel-btns__item_visible');
        }

    };
    setTimeout(showModal, 15000);
});
