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


window.addEventListener('click', function (e) {
    let openButton = e.target.closest(".fbd-signup-form__open-form");
    if (!openButton) return;
    let form = document.querySelector(".fbd-signup-form");
    let blind = document.querySelector(".fbd-signup-form__blind");
    form.classList.toggle("fbd-signup-form--open");
    document.documentElement.style.overflow = "hidden";
    form.animate([
        { transform: "translateY(100%)", height: "auto" },
        { transform: "translateY(0)", height: "calc(var(--vh) * 100)" }
    ], {
        duration: 300,
        easing: "ease-in-out",
        fill: "forwards"
    });
    blind.animate([
        { opacity: 0, visibility: "hidden" },
        { opacity: 1, visibility: "visible" }
    ], {
        duration: 300,
        easing: "ease-in-out",
        fill: "forwards"
    });
});

window.addEventListener('click', function (e) {
    let closeButton = e.target.closest(".fbd-signup-form__close-form");
    if (!closeButton) return;
    let form = document.querySelector(".fbd-signup-form");
    let blind = document.querySelector(".fbd-signup-form__blind");
    form.classList.toggle("fbd-signup-form--open");
    document.documentElement.style.overflow = "auto";
    form.animate([
        { transform: "translateY(0)", height: "calc(var(--vh) * 100)" },
        { transform: "translateY(100%)", height: "auto" }
    ], {
        duration: 300,
        easing: "ease-in-out",
        fill: "forwards"
    });
    blind.animate([
        { opacity: 1, visibility: "visible" },
        { opacity: 0, visibility: "hidden" }
    ], {
        duration: 300,
        easing: "ease-in-out",
        fill: "forwards"
    });
});
