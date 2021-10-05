const body = document.querySelector("body");
const navbar = document.querySelector(".navbar");
const menuBtn = document.querySelector(".menu-btn");
const cancelBtn = document.querySelector(".cancel-btn");
menuBtn.onclick = () => {
    navbar.classList.add("show");
    menuBtn.classList.add("hide");
    body.classList.add("disabled");
}
cancelBtn.onclick = () => {
    body.classList.remove("disabled");
    navbar.classList.remove("show");
    menuBtn.classList.remove("hide");
}


window.onscroll = () => {
    this.scrollY > 20 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
}


var nav = document.getElementById('nav');

window.onscroll = function() {
    if (window.pageYOffset > 100) {
        nav.style.background = "#000"
        nav.style.margin = "0px 0px 20px 0px";
    } else {
        nav.style.background = "transparent"
    }
}