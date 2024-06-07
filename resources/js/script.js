document.addEventListener("DOMContentLoaded", () => {
    const initFades = document.querySelectorAll('.init')
    const duvidasEl = document.querySelectorAll('.duvida')

    duvidasEl.forEach(duvida => duvida.addEventListener('click', () => {
        duvida.classList.toggle('ativa')
    }))

    window.addEventListener("scroll", show)

    initFades.forEach(el => el.classList.add('active'))
})

const show = () => {
    const elements = document.querySelectorAll('.fade')

    elements.forEach(element => {
        const windowHeight = window.innerHeight
        const elementTop = element.getBoundingClientRect().top
        const elementVisible = 150;

        if (elementTop < windowHeight - elementVisible) {
            element.classList.add('active');
        }
    })
  }
  