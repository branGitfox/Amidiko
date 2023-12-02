const body = document.querySelector('body')
const nav = document.querySelector('nav')
let themeCode = localStorage.getItem('themeCode')
if(themeCode % 2 != 0){
    nav.classList.add('nav-dark')
    body.style.backgroundColor = 'rgba(0, 0, 0, 0.89'
    body.style.color = 'white'
}else {
    nav.classList.remove('nav-dark')
    body.style.backgroundColor = 'white'
    body.style.color = 'black'
}

window.addEventListener('scroll', () => {
    localStorage.setItem('scrollPositionVoirs', scrollY)
})


window.addEventListener('load', () => {
    scrollTo(0, localStorage.getItem('scrollPositionVoirs'))
})