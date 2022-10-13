"use strict";

const buttons = document.querySelectorAll('.button');
const input = document.querySelector(".form-control");
const temp = document.querySelector(".main-temp");
const weather = document.querySelector(".main-weather");
const city = document.querySelector(".city");
const icon = document.querySelector(".icon");
const feelslike = document.querySelector(".feels");
const humidity = document.querySelector(".humidity");
const pressure = document.querySelector(".pressure");
const high = document.querySelector(".high");
const low = document.querySelector(".low");
const bg = document.querySelector(".left-container")

let latitude = 0;
let longtitude = 0;
function showLocation(position) {
  let latitude = position.coords.latitude;
  let longitude = position.coords.longitude;
}

function getLocation() {

  if(navigator.geolocation) {
    let options = {timeout:60000};
    navigator.geolocation.getCurrentPosition(showLocation);
  } else {
    alert("Sorry, browser does not support geolocation!");
  }
}

getLocation();

// fetch(`https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longtitude}&appid=b4589d851907c84c0a9c58f444fc3710`)
//   .then(response => response.json())
//   .then(data => {
//     console.log(data);
//     let symbol = "&#8457";
//     const tempValue = data['main']['temp'];
//     const nameValue = data['name'];
//     const descValue = data['weather'][0]['description'];
//     const iconValue = data['weather'][0]['icon'];
//     const feelsValue = data['main']['feels_like'];
//     const humidityValue = data['main']['humidity'];
//     const pressureValue = data['main']['pressure'];
//     const highValue = data['main']['temp_max'];
//     const lowValue = data['main']['temp_min'];

//     temp.innerHTML = tempValue + " " + symbol;
//     city.innerHTML = nameValue;
//     weather.innerHTML = descValue;
//     icon.src = "http://openweathermap.org/img/w/" + iconValue + ".png";
//     feelslike.innerHTML = feelsValue + " " + symbol;
//     humidity.innerHTML = humidityValue + " %";
//     pressure.innerHTML = pressureValue + " hPa";
//     high.innerHTML = highValue + " " + symbol;
//     low.innerHTML = lowValue + " " + symbol;

//     fetch('https://pixabay.com/api/?key=30557093-e3a371281b0c10edee259ab8c&q='+descValue+'&image_type=photo')
//     .then(response => response.json())
//     .then(data => {
//       console.log(data);
//       const num = randomInt(data['hits'].length - 1);
//       const bgValue = data['hits'][num]['largeImageURL'];
//       bg.style.backgroundImage = "linear-gradient(rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.1)), url(" + bgValue + ")";
//     })
//   })

//   .catch(err => alert("Enter a valid city name!"));

  
function randomInt(max) {
  return Math.floor(Math.random() * (max + 1))
}

buttons.forEach(function(button) {
  button.addEventListener("click", getData);
})

function getData(button) {
  let unit = "imperial";
  let symbol = "&#8457";
  if (button !== buttons[0]) {
    unit = "metric";
    symbol = "&#8451";
  }
  fetch('https://api.openweathermap.org/data/2.5/weather?q='+input.value+'&units='+unit+'&APPID=b4589d851907c84c0a9c58f444fc3710')
  .then(response => response.json())
  .then(data => {
    console.log(data);
    const tempValue = data['main']['temp'];
    const nameValue = data['name'];
    const descValue = data['weather'][0]['description'];
    const iconValue = data['weather'][0]['icon'];
    const feelsValue = data['main']['feels_like'];
    const humidityValue = data['main']['humidity'];
    const pressureValue = data['main']['pressure'];
    const highValue = data['main']['temp_max'];
    const lowValue = data['main']['temp_min'];

    temp.innerHTML = tempValue + " " + symbol;
    city.innerHTML = nameValue;
    weather.innerHTML = descValue;
    icon.src = "http://openweathermap.org/img/w/" + iconValue + ".png";
    feelslike.innerHTML = feelsValue + " " + symbol;
    humidity.innerHTML = humidityValue + " %";
    pressure.innerHTML = pressureValue + " hPa";
    high.innerHTML = highValue + " " + symbol;
    low.innerHTML = lowValue + " " + symbol;

    fetch('https://pixabay.com/api/?key=30557093-e3a371281b0c10edee259ab8c&q='+descValue+'&image_type=photo')
    .then(response => response.json())
    .then(data => {
      console.log(data);
      const num = randomInt(data['hits'].length - 1);
      const bgValue = data['hits'][num]['largeImageURL'];
      bg.style.backgroundImage = "linear-gradient(rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.1)), url(" + bgValue + ")";
    })
  })

  .catch(err => alert("Enter a valid city name!"));
}