import { CountUp } from 'countup.js';

window.addEventListener("load", function () {
    if (!document.querySelector(".fbd-progress-bar")) {
        return;
    }
    const duration = 1000;
    let progressbar = document.querySelector(".fbd-progress-bar");
    let progress = progressbar.getAttribute("data-progress");
    let goal = progressbar.getAttribute("data-goal");
    let innerBar = progressbar.querySelector(".fbd-progress-bar__inner");
    let text = innerBar.querySelector("span");
    let icon = progressbar.querySelector(".fbd-progress-bar__icon");
    let numberOfPeople = progressbar.querySelector(".fbd-progress-bar__number-of-people");

    setTimeout(() => {
        let counter = new CountUp(text, progress, {
            duration: 2,
            useEasing: true,
            suffix: " %",
            decimalPlaces: duration / 1000,
            useGrouping: true,
            decimal: ".",
        });
        counter.start();
        let peopleCounter = new CountUp(numberOfPeople, goal, {
            duration: 2,
            useEasing: true,
            separator: "'",
        });
        peopleCounter.start();
        text.style.opacity = 1;
        innerBar.animate([
            { width: "0%" },
            { width: progress + "%" },
        ], {
            duration: duration,
            easing: "cubic-bezier(0,.69,.22,1)",
            fill: "forwards",
        });
        icon.animate([
            { opacity: 0 },
            { opacity: 1 },
        ], {
            duration: duration / 2,
            easing: "cubic-bezier(0,.69,.22,1)",
            fill: "forwards",
        });
        icon.animate([
            { paddingLeft: "0" },
            { paddingLeft: progress + "%" },
        ], {
            duration: duration,
            easing: "cubic-bezier(0,.69,.22,1)",
            fill: "forwards",
        });
    }, 750);
});
