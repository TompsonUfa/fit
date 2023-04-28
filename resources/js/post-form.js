document.addEventListener('DOMContentLoaded', function () {

    let validation = function (form, questions) {
        let validation = true;
        if (questions) {
            const answersList = questions.querySelectorAll('.answers');
            for (let i = 0; i < answersList.length; i++) {
                const answers = answersList[i].querySelectorAll('.answers__item');
                let answerValid = false;
                for (let i = 0; i < answers.length; i++) { //смотрим если ли нажатый ответ
                    const answer = answers[i];
                    if (answer.classList.contains('answers__item_active')) {
                        answerValid = true;
                    }
                }
                for (let i = 0; i < answers.length; i++) { //смотрим если не было нажатых, ставим на всех инвалид
                    const answer = answers[i];
                    if (!answerValid) {
                        validation = false;
                        answer.classList.add('answers__item_invalid');
                    } else {
                        answer.classList.remove('answers__item_invalid');
                    }
                }
            }
        }
        const inputs = form.querySelectorAll(".form-control");
        for (let i = 0; i < inputs.length; i++) {
            let input = inputs[i],
                wrapperInput = input.closest('.wrapper-control');
            if (input.hasAttribute("data-text-input")) {
                if (input.value.length < 1) {
                    validation = false;
                    wrapperInput.classList.add("wrapper-control_invalid");
                } else {
                    wrapperInput.classList.remove("wrapper-control_invalid");
                }
            }
            if (input.hasAttribute("data-tel-input")) {
                let inputValue = input.value.match(/\d/g);
                if (inputValue == null) {
                    validation = false;
                    wrapperInput.classList.add("wrapper-control_invalid");
                } else {
                    if (["7", "8", "9"].indexOf(inputValue[0]) > -1) {
                        if (inputValue.length < 11) {
                            validation = false;
                            wrapperInput.classList.add("wrapper-control_invalid");
                        } else {
                            wrapperInput.classList.remove("wrapper-control_invalid");
                        }
                    } else {
                        if (inputValue.length < 7) {
                            validation = false;
                            wrapperInput.classList.add("wrapper-control_invalid");
                        } else {
                            wrapperInput.classList.remove("wrapper-control_invalid");
                        }
                    }
                }
            }
        }
        return validation;
    };
    let getFormData = function (form) {
        const inputName = form.querySelector('input[data-text-input]').value,
            inputPhone = form.querySelector('input[data-tel-input]').value,
            contact = {
                'Имя': inputName,
                'Телефон': inputPhone,
            }
        return contact;
    }
    let postModal = function (result, m, form) {
        $.ajax({
            url: "",
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            type: "POST",
            data: {
                data: result,
            },
            success: function (response) {
                const inputs = form.querySelectorAll(".form-control"),
                    modal = bootstrap.Modal.getInstance(m);
                modal.hide();
                for (let i = 0; i < inputs.length; i++) {
                    inputs[i].value = "";
                }
            },
            error: function (response) {
                console.log(response)
            }
        });
    }
    let getModalData = function (e) {
        e.preventDefault();
        const modal = e.target.closest('.modal'),
            questionsList = modal.querySelector('.questions'),
            form = modal.querySelector('.form');
        if (validation(form, questionsList)) {
            let result = [];
            if (questionsList) {
                const questions = questionsList.querySelectorAll('.questions__item');
                for (let i = 0; i < questions.length; i++) {
                    let answerText = "";
                    const question = questions[i],
                        questionTitle = question.querySelector('.questions__title').textContent,
                        answer = question.querySelector('.answers__item_active');
                    if (answer) {
                        if (answer.classList.contains('answers__item_input')) {
                            answerText = answer.querySelector('input').value;
                        } else {
                            answerText = answer.textContent;
                        }
                    } else {
                        answerText = getFormData(form);
                    }
                    const obj = {
                        'Вопрос': questionTitle,
                        'Ответ': answerText
                    }
                    result.push(obj);
                }
            } else {
                result = [getFormData(form)];
            }
            postModal(result, modal, form);
        }
    }
    const modals = document.querySelectorAll('.modal');
    if (modals != null)
        for (let i = 0; i < modals.length; i++) {
            const modal = modals[i]
            if (modal != null) {
                let btnPost = modal.querySelector('.btn-submit');
                if (btnPost != null)
                    btnPost.addEventListener('click', getModalData);
            }
        }

});


