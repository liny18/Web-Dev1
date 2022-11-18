const allLabs = document.querySelector('#labs');
const allLectures = document.querySelector('#lectures');
const allMbes = document.querySelector('#mbes');
const cardImage = document.querySelector('.card-img-top');
const cardBody = document.querySelector('.card-body');
const refreshButton = document.querySelector('#refresh');
const Title = document.querySelector('#Title');
const Description = document.querySelector('#Description');
const Link = document.querySelector('#Link');
const Next = document.querySelector('#next');
var t = [];
var d = [];
var i = [];
var l = [];

function randomInt(max) {
  return Math.floor(Math.random() * (max + 1))
}

Next.addEventListener('click', function() {
  event.preventDefault();
  const randomIndex = randomInt(t.length - 1);
  console.log(randomIndex);
  show(t[randomIndex], d[randomIndex], i[randomIndex], l[randomIndex]);
  refresh();
});

window.onload = loadcontent();

function loadcontent() {
fetch('resources/websys.json')
  .then(response => response.json())
  .then(data => {
    const labs = data.Websys_course.Labs;
    const lectures = data.Websys_course.Lectures;
    labs.forEach(lab => {
      const labItem = document.createElement('li');
      labItem.classList.add('dropdown-item', 'picks');
      labItem.innerText = lab.Title;
      t.push(lab.Title);
      d.push(lab.Description);
      i.push(lab.Image);
      l.push(lab.Link);
      labItem.setAttribute("onclick", `show('${lab.Title}', '${lab.Description}', '${lab.Image}', '${lab.Link}')`);
      allLabs.appendChild(labItem);
    });
    lectures.forEach(lecture => {
      const lectureItem = document.createElement('li');
      lectureItem.classList.add('dropdown-item', 'picks');
      lectureItem.innerText = lecture.Title;
      t.push(lecture.Title);
      d.push(lecture.Description);
      i.push(lecture.Image);
      l.push(lecture.Link);
      lectureItem.setAttribute("onclick", `show('${lecture.Title}', '${lecture.Description}', '${lecture.Image}', '${lecture.Link}')`);
      allLectures.appendChild(lectureItem);
    });
    show(labs[0].Title, labs[0].Description, labs[0].Image, labs[0].Link);
  });

  fetch('resources/mbe.json')
  .then(response => response.json())
  .then(data => {
    const lectures = data.Mbe_course.Lectures;
    lectures.forEach(lecture => {
      const lectureItem = document.createElement('li');
      lectureItem.classList.add('dropdown-item', 'picks');
      lectureItem.innerText = lecture.Title;
      t.push(lecture.Title);
      d.push(lecture.Description);
      i.push(lecture.Image);
      l.push(lecture.Link);
      lectureItem.setAttribute("onclick", `show('${lecture.Title}', '${lecture.Description}', '${lecture.Image}', '${lecture.Link}')`);
      allMbes.appendChild(lectureItem);
    });
  });
}

function show(title, description, image, link) {
  cardBody.innerHTML = '';
  const titleEl = document.createElement('h4');
  titleEl.classList.add('card-title');
  titleEl.innerText = title;
  cardBody.appendChild(titleEl);
  const descriptionEl = document.createElement('p');
  descriptionEl.classList.add('card-text');
  descriptionEl.innerText = description;
  cardBody.appendChild(descriptionEl);
  const linkEl = document.createElement('a');
  linkEl.classList.add('btn', 'btn-primary');
  linkEl.innerText = 'Check it out';
  linkEl.href = link;
  cardBody.appendChild(linkEl);
  cardImage.src = `https://source.unsplash.com/500x300/?${description}`;
  Title.value = title;
  Description.value = description;
  Link.value = link;
}

refreshButton.addEventListener('click', refresh);

function refresh() {
  // loadcontent();
  window.location.reload();
}
