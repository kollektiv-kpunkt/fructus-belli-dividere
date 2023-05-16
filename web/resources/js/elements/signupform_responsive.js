window.addEventListener('load', function (e) {
    if (document.querySelector(".fbd-signup-form__open-form__text")) {
        toggleText();
        setInterval(() => {
            toggleText();
        }, 13000);
    }
});

function toggleText() {
    let text = document.querySelector(".fbd-signup-form__open-form__text");
    setTimeout(() => {
        text.animate([
            { maxWidth: text.offsetWidth + "px" },
            { maxWidth: 0 }
        ], {
            duration: 300,
            easing: "ease-in-out",
            fill: "forwards"
        });

        setTimeout(() => {
            text.animate([
                { maxWidth: 0 },
                { maxWidth: text.scrollWidth + "px", offset: 0.99 },
                { maxWidth: "unset" }
            ], {
                duration: 300,
                easing: "ease-in-out",
                fill: "forwards"
            });

        }, 10000);

    }, 3000);
}
