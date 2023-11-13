const closeEye = document.querySelector('.close')
const openEye = document.querySelector('.open')
const input = document.querySelector('#password')

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