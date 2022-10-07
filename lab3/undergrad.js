let slideIndex = 0;
showSlides(slideIndex);

const outcome = document.getElementById("ud-outcome");
const core = document.getElementById("ud-core");
const concentration = document.getElementById("ud-concentration");
const degree = document.getElementById("ud-degree");
const arch = document.getElementById("ud-arch");
let slides = [outcome, core, concentration, degree, arch];
slides.forEach(function (item) {
        item.onclick = function () {
            showSlides(slides.indexOf(item));
        }
});

function showSlides(n) {
  slideIndex = n;
  let i;
  let slides = document.getElementsByClassName("undergrad-slide");
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  slides[slideIndex].style.display = "block";
}