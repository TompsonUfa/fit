document.addEventListener('DOMContentLoaded', function () {
    const questions = document.querySelectorAll('.questions__item');
    for (let i = 0; i < questions.length; i++) {

        const question = questions[i],
            answers = question.querySelectorAll('.answers__item');
        for (let i = 0; i < answers.length; i++) {
            const answer = answers[i],
             input = answer.querySelector('input');
            if (input) {
                input.addEventListener('input', function (e) {
                    if (e.target.value.length > 0) {
                        answer.classList.add('answers__item_active');
                    } else {
                        answer.classList.remove('answers__item_active');
                    }
                })
            }
            answer.addEventListener('click', function () {
                for (let i = 0; i < answers.length; i++) {
                    if (answers[i].classList.contains('answers__item_active')) {
                        answers[i].classList.remove('answers__item_active')
                    }
                }
                if (answer.classList.contains('answers__item_input')) {

                    if (input.value.length > 0) {
                        answer.classList.add('answers__item_active');
                    }

                } else {
                    answer.classList.add('answers__item_active');
                }
            });
        }
    }
})
