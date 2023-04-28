document.addEventListener('DOMContentLoaded', function () {
    let modal = document.querySelector('#exampleModal');
    if (modal != null) {
    let modalText = modal.querySelector('.modal-desc');

        let btnRemove = modal.querySelector('.btn_remove');
        modal = bootstrap.Modal.getOrCreateInstance(modal);

        function deleteItem(id) {
            modal.hide();
            const loader = document.querySelector('.loader');
            loader.classList.add('loader_visible')
            document.querySelector('body').classList.add('overflow-hidden');
            $.ajax({
                url: "",
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                type: "POST",
                data: {
                    id: id,
                },
                success: function (response) {
                    location.reload();
                },
            });
        }

        function openDeleteWindow(event) {
            const itemId = this.item.id,
                itemTitle = this.item.title;
            modalText.innerHTML = `Вы точно хотите удалить запись  <br> «${itemTitle}» ?`;
            btnRemove.onclick = function () {
                deleteItem(itemId);
            }
            modal.show();
        }

        const btnsRemove = document.querySelectorAll('.table__btn_remove');
        for (let i = 0; i < btnsRemove.length; i++) {
            const btn = btnsRemove[i],
                itemId = btn.closest('[data-item-id]'),
                itemTitle = itemId.querySelector('.table__title').textContent;
            const item = {
                id: itemId.dataset.itemId,
                title: itemTitle,
            }
            btn.addEventListener('click', {handleEvent: openDeleteWindow, item});
        }
    }

})

