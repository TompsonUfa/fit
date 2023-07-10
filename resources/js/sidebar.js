document.addEventListener('DOMContentLoaded', function () {
    var sidebar = document.querySelector('.sidebar');
    
    function openSidebar() {
        sidebar.classList.add('sidebar_visible');
    }

    function closeSidebar() {
        sidebar.classList.remove('sidebar_visible');
    }

    const burger = document.querySelector('.burger');
    if (burger != null) {
        const  btnClose = document.querySelector('.sidebar__btn_close');
    
        burger.addEventListener('click', openSidebar);
        btnClose.addEventListener('click', closeSidebar);
        
    }

})
