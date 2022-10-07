"use strict"

document.getElementById("undergrad").onclick = function () {
    location.href = "undergrad.html";
};

document.getElementById("grad").onclick = function () {
    location.href = "grad.html";
};

function minorPopup() {
    var popup = document.getElementById("box2popup");
    popup.classList.toggle("show");
}