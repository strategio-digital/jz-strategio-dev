/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.digital, jz@strategio.digital)
 */

export default () => {
    const step2: HTMLDivElement | null = document.querySelector('[data-step="2"]')
    const step3: HTMLDivElement | null = document.querySelector('[data-step="3"]')

    if (step2 && step3) {
        step3.addEventListener('mouseover', () => step2.classList.add('active'))
        step3.addEventListener('click', () => step2.classList.add('active'))

        step3.addEventListener('mouseleave', () => {
            step2.classList.remove('active')
            step3.classList.remove('active')
        })
    }
}