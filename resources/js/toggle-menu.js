
window.addEventListener('click', function (event) {
    const menu = document.querySelector('.menu');
    if (event.target.classList.contains('menu-toggle')) {
        menu.classList.add('menu_visible')
        menu.addEventListener("animationend", showMenu);
        document.querySelector('body').classList.add('scroll-hidden');
    } else if (event.target.classList.contains('menu__close') || event.target.classList.contains('menu') || event.target.classList.contains('menu__link') || event.target.classList.contains('menu__btn')) {
        menu.removeEventListener("animationend", showMenu);
        hideMenu()
        menu.classList.remove('menu_visible')
        document.querySelector('body').classList.remove('scroll-hidden');
    }
})

function showMenu() {
    const menuContent = document.querySelector('.menu__container');
    menuContent.classList.add('menu__container_active');
}
function hideMenu() {
    const menuContent = document.querySelector('.menu__container');
    menuContent.classList.remove('menu__container_active');
}

