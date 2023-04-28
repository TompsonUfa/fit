let header = document.querySelector('.wrapper-header')
if (header != null) {
    let heightHeader = header.offsetHeight ?? 0
    let btnScrollToTop = document.querySelector('.panel-btns__item_scroll');
    window.addEventListener('scroll', function () {
        if (this.scrollY >= heightHeader) {
            if (!header.classList.contains('wrapper-header_fixed')) {
                header.classList.add('wrapper-header_fixed');
            }
            if (!btnScrollToTop.classList.contains('panel-btns__item_visible')) {
                btnScrollToTop.classList.add('panel-btns__item_visible');
            }
        } else {
            header.classList.remove('wrapper-header_fixed');
            btnScrollToTop.classList.remove('panel-btns__item_visible');
        };
    });


}
