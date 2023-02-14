/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.digital, jz@strategio.digital)
 */

enum ScrollDirection {
    Up = 'up',
    Down = 'down'
}

export const useScroller = () => {
    let lastScrollTop = 0

    function scrollTo(target: string): void {
        const anchor = document.querySelector(target)

        if (anchor) {
            const current = window.scrollY
            const offset = anchor.getBoundingClientRect().y <= 0 ? 64 : 0

            window.scrollTo({
                top: anchor.getBoundingClientRect().y + current - offset,
                behavior: 'smooth'
            })
        }
    }

    function scrollDirection(): ScrollDirection {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop
        const direction = scrollTop > lastScrollTop ? ScrollDirection.Down : ScrollDirection.Up
        lastScrollTop = scrollTop
        return direction
    }

    function registerEvents(): void {
        document.querySelectorAll('[data-scroll]').forEach(element => {
            element.addEventListener('click', event => {
                event.preventDefault()
                const target = (element as HTMLLinkElement).dataset.scroll as string
                scrollTo(target)
            })
        })
    }

    return {
        scrollTo,
        scrollDirection,
        registerEvents
    }
}