function setStyles() {
    let vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
}

window.addEventListener('resize', setStyles);
window.addEventListener('orientationchange', setStyles);
window.addEventListener('load', setStyles);
