document.addEventListener('DOMContentLoaded', function(){
    const screenWidth = window.screen.width,
     slider = document.querySelector('.slider'),
     sliderItems = slider.querySelector('.slider__items'),
     btnNext = slider.querySelector('.slider__btn_next'),
     btnPrev = slider.querySelector('.slider__btn_prev');
    
    let viewSlide = 0,
    countSlide = 0;
    if (screenWidth > 770){
         countSlide = Math.ceil(sliderItems.children.length / 2) - 1;
    } else {
         countSlide = sliderItems.children.length - 1;
    }

    btnNext.addEventListener('click', function(){
        
        if (viewSlide < countSlide){
            viewSlide++;
        } else {
            viewSlide = 0;
        }
        sliderItems.style.transform = `translate(${-viewSlide * sliderItems.offsetWidth}px)`;
        sliderItems.style.webkitTransform = `translate(${-viewSlide * sliderItems.offsetWidth}px)`;
        sliderItems.style.MozTransform = `translate(${-viewSlide * sliderItems.offsetWidth}px)`;
    })
    btnPrev.addEventListener('click', function(){
        if (viewSlide > 0){
            viewSlide--;
        } else {
            viewSlide = countSlide;
        }
        sliderItems.style.transform = `translate(${-viewSlide * sliderItems.offsetWidth}px)`;
        sliderItems.style.webkitTransform = `translate(${-viewSlide * sliderItems.offsetWidth}px)`;
        sliderItems.style.MozTransform = `translate(${-viewSlide * sliderItems.offsetWidth}px)`;
    });
})
