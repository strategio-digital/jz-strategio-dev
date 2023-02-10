/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.digital, jz@strategio.digital)
 */

export default () => {
    document.querySelectorAll('[data-scroll]').forEach(element => {
        element.addEventListener('click', event => {
            event.preventDefault()

            const target = (element as HTMLLinkElement).dataset.scroll as string
            const anchor = document.querySelector(target)

            if (anchor) {
                const current = window.scrollY
                window.scrollTo({
                    top: anchor.getBoundingClientRect().y + current, // - 65,
                    behavior: 'smooth'
                })
            }
        })
    })
}