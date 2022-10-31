var all;
var daily_play;
var found;
var foundlist = [];
var guess;
var letters = [],
  todayletters = [];
var points;
var rank1, rank2, rank3, rank4, rank5, rank6, rank7, rank8, rank9;
var replaying;
var total, todaytotal, yesterdaytotal;
var win;
var wordlist = [],
  todaywordlist = [],
  yesterdaywordlist = [];
var words, todaywords, yesterdaywords;
var dark;
const play1 = document.getElementById("play1");
const play2 = document.getElementById("play2");
const play3 = document.getElementById("play3");
const play4 = document.getElementById("play4");
const play5 = document.getElementById("play5");
const play6 = document.getElementById("play6");
const play7 = document.getElementById("play7");
const comb1 = document.getElementById("comb1");
const comb2 = document.getElementById("comb2");
const comb3 = document.getElementById("comb3");
const comb4 = document.getElementById("comb4");
const comb5 = document.getElementById("comb5");
const comb6 = document.getElementById("comb6");
const comb7 = document.getElementById("comb7");
const pointsUpdate = document.getElementById("points-update");
const rankUpdate = document.getElementById("rank-update");
const answerUpdate = document.getElementById("answers-update");
const yesterdayOrRandom = document.getElementById("yesterday-or-random");
const updateRandom = document.getElementById("update-random");
const noMessage = document.getElementById("no-message");
const pangram = document.getElementById("pangram");
const alreadyFound = document.getElementById("already-found");
const centerLetter = document.getElementById("center-letter");
const tooShort = document.getElementById("too-short");
const notInList = document.getElementById("not-in-list");
const randomAnswers = document.getElementById("random-answers");
const restartDailyButton = document.getElementById("restart-daily-button");
const guesses = document.getElementById("guess");

function darkmode() {
  if (dark == 1) {
    var x = document.querySelectorAll("*");
    for (var i = 0; i < x.length; i++) {
      if (x[i].className != "fg" && x[i].className != "bg") {
        x[i].style.background = "#fbfcff";
        x[i].style.color = "#243b4a";
      }
    }
    dark = 0;
    localStorage.setItem("useDarkMode", 1);
  } else {
    var x = document.querySelectorAll("*");
    for (var i = 0; i < x.length; i++) {
      if (x[i].className != "fg" && x[i].className != "bg") {
        x[i].style.background = "#111111";
        x[i].style.color = "#9e9e9e";
      }
    }
    dark = 1;
    localStorage.setItem("useDarkMode", 0);
  }
}

function type(letter, combno) {
  noMessage.style.display = "inline";
  pangram.style.display = "none";
  alreadyFound.style.display = "none";
  centerLetter.style.display = "none";
  tooShort.style.display = "none";
  notInList.style.display = "none";
  document.getElementById("comb" + combno).style.height = "80px";
  document.getElementById("comb" + combno).style.width = "80px";
  document.getElementById("comb" + combno).style.left = parseInt(document.getElementById("comb" + combno).style.left) + 10 + "px";
  document.getElementById("comb" + combno).style.top = parseInt(document.getElementById("comb" + combno).style.top) + 10 + "px";
  guesses.value =
    guesses.value + letter;
}

function untype() {
  comb1.style.height = "100px";
  comb1.style.width = "100px";
  comb1.style.left = "1px";
  comb1.style.top = "51px";
  comb2.style.height = "100px";
  comb2.style.width = "100px";
  comb2.style.left = "80px";
  comb2.style.top = "1px";
  comb3.style.height = "100px";
  comb3.style.width = "100px";
  comb3.style.left = "159px";
  comb3.style.top = "51px";
  comb4.style.height = "100px";
  comb4.style.width = "100px";
  comb4.style.left = "1px";
  comb4.style.top = "149px";
  comb5.style.height = "100px";
  comb5.style.width = "100px";
  comb5.style.left = "80px";
  comb5.style.top = "199px";
  comb6.style.height = "100px";
  comb6.style.width = "100px";
  comb6.style.left = "159px";
  comb6.style.top = "149px";
  comb7.style.height = "100px";
  comb7.style.width = "100px";
  comb7.style.left = "80px";
  comb7.style.top = "100px";
}

function display() {
  var didtouch = 0;

  play1.src = "./images/" + letters[0] + ".png";
  play1.alt = letters[0];
  play1.style.left = "21px";
  play1.style.top = "51px";
  play1.ontouchstart = function () {
    didtouch = 1;
    type(letters[0], 1);
  };
  play1.onmousedown = function () {
    if (didtouch != 1) {
      type(letters[0], 1);
    }
  };
  play1.style.display = "block";
  play1.onmouseup = function () {
    untype();
  };
  play1.ondragend = function () {
    untype();
  };
  play1.ontouchend = function () {
    untype();
  };
  play1.ontouchcancel = function () {
    untype();
  };

  play2.src = "./images/" + letters[1] + ".png";
  play2.alt = letters[1];
  play2.style.left = "100px";
  play2.style.top = "1px";
  play2.ontouchstart = function () {
    didtouch = 1;
    type(letters[1], 2);
  };
  play2.onmousedown = function () {
    if (didtouch != 1) {
      type(letters[1], 2);
    }
  };
  play2.style.display = "block";
  play2.onmouseup = function () {
    untype();
  };
  play2.ondragend = function () {
    untype();
  };
  play2.ontouchend = function () {
    untype();
  };
  play2.ontouchcancel = function () {
    untype();
  };

  play3.src = "./images/" + letters[2] + ".png";
  play3.alt = letters[2];
  play3.style.left = "179px";
  play3.style.top = "51px";
  play3.ontouchstart = function () {
    didtouch = 1;
    type(letters[2], 3);
  };
  play3.onmousedown = function () {
    if (didtouch != 1) {
      type(letters[2], 3);
    }
  };
  play3.style.display = "block";
  play3.onmouseup = function () {
    untype();
  };
  play3.ondragend = function () {
    untype();
  };
  play3.ontouchend = function () {
    untype();
  };
  play3.ontouchcancel = function () {
    untype();
  };

  play4.src = "./images/" + letters[3] + ".png";
  play4.alt = letters[3];
  play4.style.left = "21px";
  play4.style.top = "149px";
  play4.ontouchstart = function () {
    didtouch = 1;
    type(letters[3], 4);
  };
  play4.onmousedown = function () {
    if (didtouch != 1) {
      type(letters[3], 4);
    }
  };
  play4.style.display = "block";
  play4.onmouseup = function () {
    untype();
  };
  play4.ondragend = function () {
    untype();
  };
  play4.ontouchend = function () {
    untype();
  };
  play4.ontouchcancel = function () {
    untype();
  };

  play5.src = "./images/" + letters[4] + ".png";
  play5.alt = letters[4];
  play5.style.left = "100px";
  play5.style.top = "199px";
  play5.ontouchstart = function () {
    didtouch = 1;
    type(letters[4], 5);
  };
  play5.onmousedown = function () {
    if (didtouch != 1) {
      type(letters[4], 5);
    }
  };
  play5.style.display = "block";
  play5.onmouseup = function () {
    untype();
  };
  play5.ondragend = function () {
    untype();
  };
  play5.ontouchend = function () {
    untype();
  };
  play5.ontouchcancel = function () {
    untype();
  };

  play6.src = "./images/" + letters[5] + ".png";
  play6.alt = letters[5];
  play6.style.left = "179px";
  play6.style.top = "149px";
  play6.ontouchstart = function () {
    didtouch = 1;
    type(letters[5], 6);
  };
  play6.onmousedown = function () {
    if (didtouch != 1) {
      type(letters[5], 6);
    }
  };
  play6.style.display = "block";
  play6.onmouseup = function () {
    untype();
  };
  play6.ondragend = function () {
    untype();
  };
  play6.ontouchend = function () {
    untype();
  };
  play6.ontouchcancel = function () {
    untype();
  };

  play7.src = "./images/" + letters[6] + ".png";
  play7.alt = "center: " + letters[6][1];
  play7.style.left = "100px";
  play7.style.top = "100px";
  play7.ontouchstart = function () {
    didtouch = 1;
    type(letters[6][1], 7);
  };
  play7.onmousedown = function () {
    if (didtouch != 1) {
      type(letters[6][1], 7);
    }
  };
  play7.style.display = "block";
  play7.onmouseup = function () {
    untype();
  };
  play7.ondragend = function () {
    untype();
  };
  play7.ontouchend = function () {
    untype();
  };
  play7.ontouchcancel = function () {
    untype();
  };
}

function update_rank() {
  var rank;

  if (points >= rank9) {
    if (win == 0) {
      alert("You earned the rank of Queen Bee!\n\nCan you find all the words?");
      win = 1;
    }
    rank = "Queen Bee!";
  } else if (points >= rank8) {
    rank = "Outstanding";
  } else if (points >= rank7) {
    rank = "Marvellous";
  } else if (points >= rank6) {
    rank = "Superb";
  } else if (points >= rank5) {
    rank = "Excellent";
  } else if (points >= rank4) {
    rank = "Skilled";
  } else if (points >= rank3) {
    rank = "Fine";
  } else if (points >= rank2) {
    rank = "Novice";
  } else {
    rank = "Newbie";
  }

  rankUpdate.innerHTML = rank;
}

function set_rank() {
  rank1 = 0;
  rank2 = Math.floor(total * 0.02);
  rank3 = Math.floor(total * 0.05);
  rank4 = Math.floor(total * 0.08);
  rank5 = Math.floor(total * 0.15);
  rank6 = Math.floor(total * 0.25);
  rank7 = Math.floor(total * 0.4);
  rank8 = Math.floor(total * 0.5);
  rank9 = Math.floor(total * 0.7);
}

function save_word() {
  localStorage.setItem("foundwords", JSON.stringify(foundlist));
}

function add_points() {
  var one = 0,
    two = 0,
    three = 0,
    four = 0,
    five = 0,
    six = 0;
  var i = 0,
    j = 0;

  if (daily_play === 1) {
    save_word();
  }

  i = guess.length;
  if (i < 7) {
    if (i == 4) {
      i = 1;
    }
    points = points + i;

    return;
  }

  i = 0;
  while (i < guess.length) {
    for (j = 0; j < 7; j++) {
      if (guess[i] == letters[j]) {
        if (j == 0) {
          one = 1;
        }
        if (j == 1) {
          two = 1;
        }
        if (j == 2) {
          three = 1;
        }
        if (j == 3) {
          four = 1;
        }
        if (j == 4) {
          five = 1;
        }
        if (j == 5) {
          six = 1;
        }
      }
    }
    i = i + 1;
  }

  if (
    one == 1 &&
    two == 1 &&
    three == 1 &&
    four == 1 &&
    five == 1 &&
    six == 1
  ) {
    points = points + guess.length + 7;
    noMessage.style.display = "none";
    pangram.style.display = "inline";

    return;
  }

  points = points + guess.length;
}

function found_word() {
  var i;

  for (i = 0; i < found; i++) {
    if (guess == foundlist[i]) {
      noMessage.style.display = "none";
      alreadyFound.style.display = "inline";
      return 1;
    }
  }

  foundlist.push(guess);

  found = found + 1;

  add_points();

  pointsUpdate.innerHTML = points;
  answerUpdate.innerHTML =
    foundlist.join("<br />");

  update_rank();

  if (found == words) {
    alert("Congratulations! You found all the words!");
    all = 1;
  }

  return 0;
}

function check() {
  var center = 0,
    i;

  noMessage.style.display = "inline";
  pangram.style.display = "none";
  alreadyFound.style.display = "none";
  centerLetter.style.display = "none";
  tooShort.style.display = "none";
  notInList.style.display = "none";

  if (replaying === 0) {
    guess = guesses.value.toLowerCase();
    document.getElementById("player-guess").reset();
  } else {
    guess = guess.toLowerCase();
  }

  for (i = 0; i < guess.length; i++) {
    if ("7" + guess[i] == letters[6]) {
      center = 1;
    }
  }

  if (guess.length < 4) {
    noMessage.style.display = "none";
    tooShort.style.display = "inline";
    return 1;
  }

  if (center == 0) {
    noMessage.style.display = "none";
    centerLetter.style.display = "inline";
    return 1;
  }

  for (i = 0; i < words; i++) {
    if (guess == wordlist[i]) {
      i = found_word();
      return i;
    }
  }
  noMessage.style.display = "none";
  notInList.style.display = "inline";

  return 1;
}

function replay_words() {
  var i, replay;

  replaying = 1;

  replay = JSON.parse(localStorage.getItem("foundwords"));

  localStorage.removeItem("foundwords");

  for (i = 0; i < replay.length; i++) {
    guess = replay[i];

    if (check() == 1) {
      localStorage.removeItem("foundwords");

      for (i = 0; i < found; i++) {
        foundlist.pop();
      }

      all = 0;
      found = 0;
      points = 0;
      rank = "Newbie";
      win = 0;

      noMessage.style.display = "inline";
      pangram.style.display = "none";
      alreadyFound.style.display = "none";
      centerLetter.style.display = "none";
      tooShort.style.display = "none";
      notInList.style.display = "none";

      replaying = 0;

      return;
    }
  }

  noMessage.style.display = "inline";
  pangram.style.display = "none";
  alreadyFound.style.display = "none";
  centerLetter.style.display = "none";
  tooShort.style.display = "none";
  notInList.style.display = "none";

  replaying = 0;
}

function daily() {
  var i;

  daily_play = 1;

  for (i = 0; i < found; i++) {
    foundlist.pop();
  }

  all = 0;
  found = 0;
  points = 0;
  rank = "Newbie";
  replaying = 0;
  win = 0;

  pointsUpdate.innerHTML = points;
  answerUpdate.innerHTML =
    foundlist.join("<br />");
  rankUpdate.innerHTML = rank;
  yesterdayOrRandom.innerHTML =
    "Yesterday's answers";
  randomAnswers.style.display = "none";
  restartDailyButton.style.visibility = "hidden";
  updateRandom.innerHTML = "";
  noMessage.style.display = "inline";
  pangram.style.display = "none";
  alreadyFound.style.display = "none";
  centerLetter.style.display = "none";
  tooShort.style.display = "none";
  notInList.style.display = "none";
  play1.style.display = "none";
  play2.style.display = "none";
  play3.style.display = "none";
  play4.style.display = "none";
  play5.style.display = "none";
  play6.style.display = "none";
  play7.style.display = "none";

  letters[0] = todayletters[0];
  letters[1] = todayletters[1];
  letters[2] = todayletters[2];
  letters[3] = todayletters[3];
  letters[4] = todayletters[4];
  letters[5] = todayletters[5];
  letters[6] = todayletters[6];
  words = todaywords;
  total = todaytotal;
  wordlist = todaywordlist;
  set_rank();
  if (localStorage.hasOwnProperty("foundwords") === true) {
    replay_words();
  }
  updateRandom.innerHTML =
    yesterdaywordlist.join("<br />") +
    "<br />" +
    "<br />Total words:  " +
    yesterdaywords +
    "<br />Total points: " +
    yesterdaytotal +
    "<br />Points for Queen Bee: " +
    Math.floor(yesterdaytotal * 0.7);
  display();
}

function get_yesterday() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var gameObj = JSON.parse(this.responseText);
      yesterdaywords = gameObj.words;
      yesterdaytotal = gameObj.total;
      yesterdaywordlist = gameObj.wordlist;
    }
  };

  xhttp.open("GET", "https://freebee.fun/cgi-bin/yesterday", true);
  xhttp.send();
}

function get_today() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var gameObj = JSON.parse(this.responseText);
      todayletters[0] = gameObj.letters[0];
      todayletters[1] = gameObj.letters[1];
      todayletters[2] = gameObj.letters[2];
      todayletters[3] = gameObj.letters[3];
      todayletters[4] = gameObj.letters[4];
      todayletters[5] = gameObj.letters[5];
      todayletters[6] = "7" + gameObj.center;
      todaywords = gameObj.words;
      todaytotal = gameObj.total;
      todaywordlist = gameObj.wordlist;
      daily();
    }
  };

  xhttp.open("GET", "https://freebee.fun/cgi-bin/today", true);
  xhttp.send();
}

window.onload = function () {
  get_yesterday();
  get_today();
  if (localStorage.hasOwnProperty("useDarkMode") === true) {
    dark = Number(localStorage.getItem("useDarkMode"));
  } else {
    dark = 1;
  }
  darkmode();
};

function shuffle() {
  var i, j, t;

  for (i = 5; i > 0; i--) {
    j = Math.floor(Math.random() * (i + 1));
    t = letters[j];
    letters[j] = letters[i];
    letters[i] = t;
  }

  display();
}

function random() {
  var xhttp = new XMLHttpRequest();
  var i;

  daily_play = 0;

  for (i = 0; i < found; i++) {
    foundlist.pop();
  }

  all = 0;
  found = 0;
  points = 0;
  rank = "Newbie";
  win = 0;

  pointsUpdate.innerHTML = points;
  answerUpdate.innerHTML =
    foundlist.join("<br />");
  rankUpdate.innerHTML = rank;
  yesterdayOrRandom.innerHTML = "Answers";
  updateRandom.innerHTML = "";
  noMessage.style.display = "inline";
  pangram.style.display = "none";
  alreadyFound.style.display = "none";
  centerLetter.style.display = "none";
  tooShort.style.display = "none";
  notInList.style.display = "none";
  play1.style.display = "none";
  play2.style.display = "none";
  play3.style.display = "none";
  play4.style.display = "none";
  play5.style.display = "none";
  play6.style.display = "none";
  play7.style.display = "none";

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var gameObj = JSON.parse(this.responseText);
      letters[0] = gameObj.letters[0];
      letters[1] = gameObj.letters[1];
      letters[2] = gameObj.letters[2];
      letters[3] = gameObj.letters[3];
      letters[4] = gameObj.letters[4];
      letters[5] = gameObj.letters[5];
      letters[6] = "7" + gameObj.center;
      words = gameObj.words;
      total = gameObj.total;
      wordlist = gameObj.wordlist;
      set_rank();
      display();
      randomAnswers.style.display = "block";
      restartDailyButton.style.visibility =
        "visible";
    }
  };

  xhttp.open("GET", "https://freebee.fun/cgi-bin/random", true);
  xhttp.send();
}

function show_random() {
  updateRandom.innerHTML =
    wordlist.join("<br />") +
    "<br />" +
    "<br />Total words:  " +
    words +
    "<br />Total points: " +
    total +
    "<br />Points for Queen Bee: " +
    Math.floor(total * 0.7);
}

function delete_letter() {
  guesses.value = "";
}
