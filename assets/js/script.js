const toggleBtn = document.querySelector(".nav-toggle-icon");
const hideMenu = document.querySelector(".hide-menu");
const container = document.querySelector(".news");
const switchContainer = document.querySelector(".switch");

toggleBtn.addEventListener("click", () => {
  hideMenu.classList.toggle("show-menu");
  hideMenu.classList.toggle("hide-menu");
});


const close = document.querySelector('.close')
close.addEventListener('click', () => {
  hideMenu.classList.toggle('show-menu')
  hideMenu.classList.toggle("hide-menu");
})

//theme mode sombre et mode clair
const switchCircle = document.querySelector(".switch-circle");
const nav = document.querySelector("nav");
const footer = document.querySelector("footer");
const navLinks = document.querySelector(".nav-links");
const containerBig = document.querySelector(".container");
const hideMenuDark = document.querySelector(".hide-menu");
switchContainer.addEventListener("click", () => {
  let themeCode = localStorage.getItem("themeCode");
  localStorage.setItem("themeCode", ++themeCode);
  switchCircle.classList.toggle("leftRight");
  switchCircle.classList.toggle("dark");
  switchContainer.classList.toggle("switchDark");
  nav.classList.toggle("nav-dark");
  footer.classList.toggle("footer-dark");
  navLinks.classList.toggle("nav-links-dark");
  containerBig.classList.toggle("container-dark");
  hideMenuDark.classList.toggle("hide-menu-dark");
  hideMenuDark.classList.toggle("show-menu-dark");
})

// mode sombre automatique
let themeCode = localStorage.getItem("themeCode");
if (themeCode % 2 != 0) {
  switchCircle.classList.add("leftRight");
  switchCircle.classList.add("dark");
  switchContainer.classList.add("switchDark");
  nav.classList.add("nav-dark");
  footer.classList.add("footer-dark");
  navLinks.classList.add("nav-links-dark");
  containerBig.classList.add("container-dark");
  hideMenuDark.classList.add("hide-menu-dark");
  hideMenuDark.classList.add("show-menu-dark");
} else {
  switchCircle.classList.remove("leftRight");
  switchCircle.classList.remove("dark");
  switchContainer.classList.remove("switchDark");
  nav.classList.remove("nav-dark");
  footer.classList.remove("footer-dark");
  navLinks.classList.remove("nav-links-dark");
  containerBig.classList.remove("container-dark");
  hideMenuDark.classList.remove("hide-menu-dark");
  hideMenuDark.classList.remove("show-menu-dark");
}
