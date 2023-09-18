window.addEventListener("click", (e) => {
    let button = e.target.closest(".fbd-donation-button");
    console.log(e.target);
    if (button) {
        let form = document.querySelector(".dds-widget-container");
        let inner = form.closest(".fbd-donation-inner");
        let container = form.closest(".fbd-donation-container");
        form.classList.toggle("fbd-donation-form-active");
        if (form.classList.contains("fbd-donation-form-active")) {
            container.animate([
                { maxHeight: 0 },
                { maxHeight: inner.offsetHeight + "px" }
            ], {
                duration: 500,
                easing: "ease-in-out",
                fill: "forwards"
            });
        }
        else {
            container.animate([
                { maxHeight: inner.offsetHeight + "px" },
                { maxHeight: 0 }
            ], {
                duration: 500,
                easing: "ease-in-out",
                fill: "forwards"
            });
        }

    }
});
