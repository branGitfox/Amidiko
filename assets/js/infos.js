let themeCode = localStorage.getItem('themeCode')
const header = document.querySelector('header')
const body = document.querySelector('body')
if(themeCode % 2 != 0){
    header.classList.add('header-dark')
    body.style.backgroundColor = 'rgba(0, 0, 0, 0.89'
    body.style.color = 'white'
}else {
    header.classList.remove('header-dark')
    body.style.backgroundColor = 'white'
    body.style.color = 'black'
}

window.addEventListener('scroll', () => {
    localStorage.setItem('scrollPositionInfos', scrollY)
})


window.addEventListener('load', () => {
    scrollTo(0, localStorage.getItem('scrollPositionInfos'))
})