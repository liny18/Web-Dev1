let slideIndex = 0;
showSlides(slideIndex);

const core = document.getElementById("core");
const concentration = document.getElementById("concentration");
const professional = document.getElementById("professional");
const research = document.getElementById("research");
const outcome = document.getElementById("outcome");
const requirements = document.getElementById("requirements");
let slides = [core, concentration, professional, research, outcome, requirements];
slides.forEach(function (item) {
        item.onclick = function () {
            showSlides(slides.indexOf(item));
        }
});

function showSlides(n) {
  slideIndex = n;
  let i;
  let slides = document.getElementsByClassName("grad-slide");
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  slides[slideIndex].style.display = "block";
}