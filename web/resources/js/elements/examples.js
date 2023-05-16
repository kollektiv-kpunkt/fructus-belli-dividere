window.addEventListener('click', function (e) {
    let exampleButton = e.target.closest('.fbd-examples__card-button');
    if (!exampleButton) return;
    let key = exampleButton.dataset.cardKey;
    let example = document.querySelector(`.fbd-examples__more-content[data-card-key="${key}"]`);
    let activeExample = document.querySelector('.fbd-examples__more-content--active');
    let delay = 0;
    if (activeExample) {
        activeExample.classList.remove('fbd-examples__more-content--active');
        activeExample.animate([
            { maxHeight: activeExample.scrollHeight + 'px' },
            { maxHeight: 0 }
        ], {
            duration: 500,
            easing: 'ease-in-out',
            fill: 'forwards'
        });
        delay += 500;
    }
    if (activeExample === example) return;
    setTimeout(function () {
        example.classList.add('fbd-examples__more-content--active');
        example.animate([
            { maxHeight: 0 },
            { maxHeight: example.scrollHeight + 'px', offset: 0.99 },
            { maxHeight: "unset" }
        ], {
            duration: 500,
            easing: 'ease-in-out',
            fill: 'forwards'
        });
        setTimeout(() => {
            scrollTo({
                top: example.offsetTop - 100,
                behavior: 'smooth'
            });
        }, 500);
    }, delay);
});
