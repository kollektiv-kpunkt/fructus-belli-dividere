import { createLoader, removeLoader } from "../utlis/Loader.js";

window.addEventListener("click", function (e) {
    if (!e.target.classList.contains("fbd-supporters__showall")) {
        return;
    }
    const loader = createLoader();
    setTimeout(async () => {
        e.preventDefault();
        let button = e.target;
        let peopleList = button.closest(".fbd-supporters__peoplewrapper").querySelector(".fbd-supporters__peoplelist");
        let initHeight = peopleList.scrollHeight;
        peopleList.style.maxHeight = initHeight + "px";
        peopleList.style.overflow = "hidden";
        let supporters = await fetch("/api/supporters").then(response => response.json());
        var render = "";
        let i = 0;
        supporters.supporters.forEach(supporter => {
            render += "<b>";
            if (supporter.data.fname) {
                render += supporter.data.fname;
            }
            if (supporter.data.lname) {
                render += " " + supporter.data.lname;
            }
            render += "</b>";
            if (supporter.data.zip) {
                render += ", " + supporter.data.zip;
            }
            if (supporter.data.city) {
                render += " " + supporter.data.city;
            }
            if (supporter.data.jobtitle) {
                render += ", " + supporter.data.jobtitle;
            }
            if (i < supporters.supporters.length - 1) {
                render += "; ";
            }
            i++;
        })
        peopleList.innerHTML = render;
        button.remove();
        peopleList.animate([
            { maxHeight: initHeight + "px" },
            { maxHeight: peopleList.scrollHeight + "px", offset: 0.999 },
            { maxHeight: "unset" }
        ], {
            duration: 500,
            easing: "ease-in-out",
            fill: "forwards"
        })
        setTimeout(() => {
            peopleList.style.WebkitMaskImage = "unset";
        }, 250);

        setTimeout(() => {
            removeLoader(loader);
        }, 750);
    }, 250);
})
