const toggleBtn = document.querySelector('.nav-toggle-icon')
const hideMenu = document.querySelector('.hide-menu')
const container = document.querySelector('.news')
toggleBtn.addEventListener('click', () => {
    hideMenu.classList.toggle('show-menu')
    hideMenu.classList.toggle('hide-menu')
})

