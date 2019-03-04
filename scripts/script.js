let width = window.innerWidth;
let height = (window.innerHeight/1.3);
const canvas = document.getElementById("canvas");
const context = canvas.getContext("2d");
const maxConfettis = 70;
const confettis = [];

const colorsArray = [
    "#F6DC7A",
    "#DEE7E7",
    "#ff2222",
    "#1E001F",
];

// Initialize tooltip component
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})
  
// Initialize popover component
$(function () {
$('[data-toggle="popover"]').popover()
})

function randomFromTo(from, to) {
  return Math.floor(Math.random() * (to - from + 1) + from);
}

function confetti() {
  this.x = Math.random() * width; // x
  this.y = Math.random() * height - height; // y
  this.r = randomFromTo(12, 10); // radius
  this.d = Math.random() * maxConfettis + 11;
  this.color =
  colorsArray[Math.floor(Math.random() * colorsArray.length)];
  this.tilt = Math.floor(Math.random() * 100) - 11;
  this.tiltAngleIncremental = Math.random() * 0.04 + 0.1;
  this.tiltAngle = 0;

  this.draw = function() {
    context.beginPath();
    context.lineWidth = this.r / 2;
    context.strokeStyle = this.color;
    context.moveTo(this.x + this.tilt + this.r / 3, this.y);
    context.lineTo(this.x + this.tilt, this.y + this.tilt + this.r / 10);
    return context.stroke();
  };
}

function Draw() {
  const results = [];
  requestAnimationFrame(Draw);
  context.clearRect(0, 0, width, window.innerHeight);
  for (let i = 0; i < maxConfettis; i++) {
    results.push(confettis[i].draw());
  }

  let confetti = {};
  let remainingFlakes = 0;
  for (var i = 0; i < maxConfettis; i++) {
    confetti = confettis[i];

    confetti.tiltAngle += confetti.tiltAngleIncremental;
    confetti.y += (Math.cos(confetti.d) + 3 + confetti.r / 30) / 2;
    confetti.tilt = Math.sin(confetti.tiltAngle - i / 10) * 20;

    if (confetti.y <= height) remainingFlakes++;

    // If a confetti has fluttered out of view,
    // bring it back to above the viewport and let if re-fall.
    if (confetti.x > width + 30 || confetti.x < -30 || confetti.y > height) {
        confetti.x = Math.random() * width;
        confetti.y = -30;
        confetti.tilt = Math.floor(Math.random() * 10) - 20;
    }
  }

  return results;
}

// push new confetti onto array
for (var i = 0; i < maxConfettis; i++) {
    confettis.push(new confetti());
}

// Initialize
canvas.width = width;
canvas.height = height;
Draw();