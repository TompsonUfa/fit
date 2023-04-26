window.addEventListener("DOMContentLoaded", () => {
    const wrapInput = document.querySelectorAll('.login__wrap-input');
    const EMAIL_REGEXP = /^(([^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*)|(".+"))@(([^<>()[\].,;:\s@"]+\.)+[^<>()[\].,;:\s@"]{2,})$/iu;
    for (let i = 0 ; i < wrapInput.length; i++){
      const input = wrapInput[i].querySelector('input');
      const icon = wrapInput[i].querySelector('.login__icon');
      input.addEventListener('focus', () =>{
        wrapInput[i].style.borderBottom = "solid 1px var(--second-color)";
      })
      input.oninput = function (){
        if(input.type == "email"){
            if (isEmailValid(input.value)){
                icon.style.opacity = "1";
                icon.style.fill = "var(--second-color)";
            } else {
                icon.style.opacity = "0.15"
                icon.style.fill = "#010101";
            }
        } else {
            if (input.value.length > 0) {
                icon.style.opacity = "1";
                icon.style.fill = "var(--second-color)";
            } else {
                icon.style.opacity = "0.15"
                icon.style.fill = "#010101";
            }
        }
      }
      input.onblur = function () {
        if(input.type == "email"){
            if (isEmailValid(input.value)){
                icon.style.animation = "none"
                wrapInput[i].style.borderBottom = "solid 1px var(--second-color)";
            } else {
                icon.style.animation = "shake-shake 0.3s"
                wrapInput[i].style.borderBottom = "solid 1px rgba(0, 0, 0, 0.1)";
            }
        } else {
            if (input.value.length > 0) {
                icon.style.animation = "none"
                wrapInput[i].style.borderBottom = "solid 1px var(--second-color)";
            } else {
                icon.style.animation = "shake-shake 0.3s"
                wrapInput[i].style.borderBottom = "solid 1px rgba(0, 0, 0, 0.1)";
            }
        }
      }
    }
    function isEmailValid(value) {
        return EMAIL_REGEXP.test(value);
    }
})