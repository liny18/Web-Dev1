"use strict"

function minorPopup() {
    let popup = document.getElementById("box2popup");
    popup.classList.toggle("show");
}

const allprof = document.querySelectorAll(".professors");
const allpop = document.querySelectorAll(".profpopup");
for (let i = 0; i < allprof.length; i++) {
    allprof[i].addEventListener("click", function () {
        allpop[i].classList.toggle("show");
    });
}

function showNews(n) {
    let popup = document.getElementById("news" + n);
    popup.classList.toggle("show");
}

let slideIndex = 0;
showSlides(slideIndex);

const program = document.getElementById("program");
const faculty = document.getElementById("faculty");
const news = document.getElementById("news");
const contact = document.getElementById("contact");
let slides = [program, faculty, news, contact];
slides.forEach(function (item) {
        item.onclick = function () {
            showSlides(slides.indexOf(item));
        }
});

function showSlides(n) {
    slideIndex = n;
    let i;
    let slides = document.getElementsByClassName("slides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex].style.display = "flex";
}
