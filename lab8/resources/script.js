const allLabs = document.querySelector('#labs');
const allLectures = document.querySelector('#lectures');
const allPicks = document.querySelectorAll('.picks');
const cardImage = document.querySelector('.card-img-top');
const cardBody = document.querySelector('.card-body');
const refreshButton = document.querySelector('#refresh');
const Title = document.querySelector('#Title');
const Description = document.querySelector('#Description');
const Link = document.querySelector('#Link'); 

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
      labItem.setAttribute("onclick", `show('${lab.Title}', '${lab.Description}', '${lab.Image}', '${lab.Link}')`);
      allLabs.appendChild(labItem);
      const inp = document.createElement('input');
      inp.setAttribute("type", "text");
      inp.classList.add('form-control');
      inp.name = lab.Title;
      Title.appendChild(inp);
      const inp2 = document.createElement('input');
      inp2.setAttribute("type", "text");
      inp2.classList.add('form-control');
      inp2.name = lab.Description;
      Description.appendChild(inp2);
      const inp3 = document.createElement('input');
      inp3.setAttribute("type", "text");
      inp3.classList.add('form-control');
      inp3.name = lab.Link;
      Link.appendChild(inp3);
    });
    lectures.forEach(lecture => {
      const lectureItem = document.createElement('li');
      lectureItem.classList.add('dropdown-item', 'picks');
      lectureItem.innerText = lecture.Title;
      lectureItem.setAttribute("onclick", `show('${lecture.Title}', '${lecture.Description}', '${lecture.Image}', '${lecture.Link}')`);
      allLectures.appendChild(lectureItem);
      const inp = document.createElement('input');
      inp.setAttribute("type", "text");
      inp.classList.add('form-control');
      inp.name = lecture.Title;
      Title.appendChild(inp);
      const inp2 = document.createElement('input');
      inp2.setAttribute("type", "text");
      inp2.classList.add('form-control');
      inp2.name = lecture.Description;
      Description.appendChild(inp2);
      const inp3 = document.createElement('input');
      inp3.setAttribute("type", "text");
      inp3.classList.add('form-control');
      inp3.name = lecture.Link;
      Link.appendChild(inp3);
    });
    show(labs[0].Title, labs[0].Description, labs[0].Image, labs[0].Link);
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
}

refreshButton.addEventListener('click', refresh);

function refresh() {
  loadcontent();
  window.location.reload();
}
