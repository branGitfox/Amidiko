const toggleBtn = document.querySelector('.nav-toggle-icon')
const hideMenu = document.querySelector('.hide-menu')
const container = document.querySelector('.news')
const switchContainer = document.querySelector('.switch')

toggleBtn.addEventListener('click', () => {
    hideMenu.classList.toggle('show-menu')
    hideMenu.classList.toggle('hide-menu')
})

//theme mode sombre et mode clair

const switchCircle = document.querySelector('.switch-circle')
const nav = document.querySelector('nav')
const footer = document.querySelector('footer')
const navLinks = document.querySelector('.nav-links')
const containerBig = document.querySelector('.container')
switchContainer.addEventListener('click', () => {
    switchCircle.classList.toggle('leftRight')
    switchCircle.classList.toggle('dark')
    switchContainer.classList.toggle('switchDark')
    nav.classList.toggle('nav-dark')
    footer.classList.toggle('footer-dark')
    navLinks.classList.toggle('nav-links-dark')
    containerBig.classList.toggle('container-dark')
})

