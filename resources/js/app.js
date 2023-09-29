import 'bootstrap';
import './scripts';

let navbar = document.querySelector("#navbar");

function changeNavColor() {
    if (window.scrollY > 0) {
        navbar.classList.add("navbarCambiata");
    }else {
        navbar.classList.remove("navbarCambiata");
    }
}

window.addEventListener("scroll", changeNavColor)

