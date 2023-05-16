window.addEventListener("click", function (e) {
    let title = e.target.closest(".fbd-question__title");
    if (!title) {
        return;
    }
    let question = title.closest(".fbd-question");
    let answer = question.querySelector(".fbd-question__answer");
    let answerInner = answer.querySelector(".fbd-question__answerinner");
    let arrow = title.querySelector("i");
    question.classList.toggle("fbd-question--open");
    if (question.classList.contains("fbd-question--open")) {
        answerInner.style.opacity = 0;
        answer.animate([
            { maxHeight: 0 },
            { maxHeight: answer.scrollHeight + 'px', offset: 0.99 },
            { maxHeight: 'unset' }
        ], {
            duration: 300,
            easing: 'ease-in-out',
            fill: 'forwards'
        });
        arrow.animate([{ transform: 'rotate(0deg)' }, { transform: 'rotate(180deg)' }], {
            duration: 300,
            easing: 'ease-in-out',
            fill: 'forwards'
        });
        setTimeout(() => {
            answerInner.animate(
                [
                    { opacity: 0, transform: 'translateY(20px)' },
                    { opacity: 1, transform: 'translateY(0)' }
                ],
                {
                    duration: 300,
                    easing: 'ease-in-out',
                    fill: 'forwards'
                }
            );
        }, 350);
    } else {
        answer.animate([{ maxHeight: answer.scrollHeight + 'px' }, { maxHeight: 0 }], {
            duration: 300,
            easing: 'ease-in-out',
            fill: 'forwards'
        });
        arrow.animate([{ transform: 'rotate(180deg)' }, { transform: 'rotate(0deg)' }], {
            duration: 300,
            easing: 'ease-in-out',
            fill: 'forwards'
        });
        answerInner.animate(
            [
                { opacity: 1, transform: 'translateY(0)' },
                { opacity: 0, transform: 'translateY(20px)' }
            ],
            {
                duration: 300,
                easing: 'ease-in-out',
                fill: 'forwards'
            }
        );
    }
});
