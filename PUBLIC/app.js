// -------------------------------LOADER------------------------------------

const loader = document.querySelector(".loader");

window.addEventListener("load", () => {
  loader.classList.add("fondu-out");
});

// --------------------------------MENU-------------------------------------
let button = document.querySelector("#button-menu");

let menu = document.querySelector("#mobile-menu");

let cross = document.querySelector("#cross");

let burger = document.querySelector("#burger");

let links = document.querySelectorAll("nav a");

button.addEventListener("click", () => {
  menu.classList.toggle("hidden");
  cross.classList.toggle("hidden");
  burger.classList.toggle("hidden");
});

links.forEach((link) => {
  link.addEventListener("click", () => {
    menu.classList.toggle("hidden");
  });
});

// ------------------------------------------------------------------------
