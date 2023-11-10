let themeCode = localStorage.getItem('themeCode')
const header = document.querySelector('header')
const body = document.querySelector('body')
const userStat = document.querySelector(' .user-posts .link'),
userPass = document.querySelector('.user-password .link')
if(themeCode % 2 != 0){
    header.classList.add('header-dark')
    body.style.backgroundColor = 'rgba(0, 0, 0, 0.89'
    body.style.color = 'white'
    userStat.style.color= 'gray'
    userPass.style.color= 'gray'
}else {
    header.classList.remove('header-dark')
    body.style.backgroundColor = 'white'
    body.style.color = 'black'
}