function getColor(start, end, percent) {
  function hex2dec(hex) { return parseInt(hex, 16); }

  function dec2hex(dec) { return (dec < 16 ? "0" : "") + dec.toString(16); }

  const r1 = hex2dec(start.slice(0, 2)), g1 = hex2dec(start.slice(2, 4)),
        b1 = hex2dec(start.slice(4, 6));
  const r2 = hex2dec(end.slice(0, 2)), g2 = hex2dec(end.slice(2, 4)),
        b2 = hex2dec(end.slice(4, 6));
  const pc = percent / 100;
  const r = Math.floor(r1 + pc * (r2 - r1) + 0.5),
        g = Math.floor(g1 + pc * (g2 - g1) + 0.5),
        b = Math.floor(b1 + pc * (b2 - b1) + 0.5);
  return "#" + dec2hex(r) + dec2hex(g) + dec2hex(b);
}

const colors = [
  "339966",
  "FF0000",
  "00FF00",
  "0000FF",
  "FFFF00",
  "FF00FF",
  "00FFFF",
];
let start = colors[0];
let end = colors[0];
let index = 0;
let cindex = 0;
const faderObj = [];

function fadeSpan() {
  if (index === 0) {
    start = end;
    end = colors[(cindex = (cindex + 1) % colors.length)];
  }

  for (let i = 0; i < faderObj.length; i++)
    faderObj[i].style.color = getColor(start, end, index);

  index = (index + 5) % 100;

  setTimeout("fadeSpan()", 40);
}

function fadeAll() {
  for (let i = 0; i < arguments.length; i++)
    faderObj[i] = document.getElementById(arguments[i]);

  fadeSpan();
}

function JSFX_StartEffects() { fadeAll("h1", "h2", "h3"); }
