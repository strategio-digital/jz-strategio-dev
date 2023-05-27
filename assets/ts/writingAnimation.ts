/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */

export default () => {
    const elements: HTMLSpanElement[] = Array.from(document.querySelectorAll('.writing-animation'))

    // Make text-writing animation for each character in each element.
    elements.forEach(element => {
        const text = element.innerText
        element.innerText = ''
        text.split('').forEach((character, index) => {
            const span = document.createElement('span')
            span.innerText = character
            span.style.animationDelay = `${index * 0.075}s`
            element.appendChild(span)
        })
    })

    setInterval(() => {
        const index = elements.findIndex(el => el.classList.contains('active'))

        elements[index].classList.remove('active')

        if (index < elements.length - 1) {
            elements[index + 1].classList.add('active')
        } else {
            elements[0].classList.add('active')
        }

    }, 3000)

}