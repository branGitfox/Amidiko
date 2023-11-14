const closeEye = document.querySelector('.close')
const openEye = document.querySelector('.open')
const input = document.querySelector('#password')
const error = document.querySelector('.error')


openEye.addEventListener('click', () => {
    openEye.style.display = 'none'
    closeEye.style.display = 'block'
    input.type = 'text'
})

closeEye.addEventListener('click', () => {
    closeEye.style.display = 'none'
    openEye.style.display = 'block'
    input.type = 'password'
})

// mode sombre dynamic

const body = document.querySelector('body')
let themeCode = localStorage.getItem('themeCode')
if(themeCode % 2 != 0){
    closeEye.style.color = 'black'
    openEye.style.color = 'black'
    body.style.backgroundColor = 'rgba(0, 0, 0, 0.89'
    body.style.color = 'white'
}else {
    body.style.backgroundColor = 'white'
    body.style.color = 'black'
    closeEye.style.color = 'black'
    openEye.style.color = 'black'
}

setTimeout(() => {
    error.remove()
}, 2000)