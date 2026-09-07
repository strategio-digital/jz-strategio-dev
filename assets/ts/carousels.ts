/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */

import { useCarousel } from 'megio-frontils'

export default () => {
    const about: HTMLDivElement | null = document.querySelector('#about-carousel')

    if (about) {
        const config = { autoPlay: { speed: 10000, enabled: true } }
        useCarousel(about, config).create()
    }

    const reference: HTMLDivElement | null = document.querySelector('#reference-carousel')

    if (reference) {
        const config = { autoPlay: { speed: 0, enabled: false } }
        useCarousel(reference, config).create()
    }

    const projects: HTMLDivElement | null = document.querySelector('#project-carousel')

    if (projects) {
        const carousel = useCarousel(projects, { autoPlay: { speed: 0, enabled: false } })
        carousel.create()

        // useCarousel si drží jen první prev/next/counter, které v DOM najde.
        // Druhé ovládání pro zalomené sloupce proto obsluhujeme sami.
        const section: HTMLElement | null = document.querySelector('#tools-for-you')
        const total = projects.querySelectorAll('[data-carousel="item"]').length
        const mirrors = Array.from(projects.querySelectorAll<HTMLElement>('[data-carousel-mirror="counter"]'))

        const sync = (): void => {
            const position = `${carousel.getStats().currentIndex + 1} / ${total}`
            mirrors.forEach(el => el.innerText = position)
        }

        // Navbar je fixed a při odscrollování se zmenšuje. Výšku proto měříme
        // až po dojetí scrollu a případný rozdíl dorovnáme — jinak zůstane nad
        // sekcí pruh předchozí sekce, o který se navbar mezitím zmenšil.
        const navbarHeight = (): number => {
            const navbar: HTMLElement | null = document.querySelector('.navbar')
            return navbar === null ? 0 : navbar.getBoundingClientRect().height
        }

        const revealSection = (): void => {
            if (!section) {
                return
            }

            const scrollToTop = (behavior: ScrollBehavior): void => {
                window.scrollTo({
                    top: section.getBoundingClientRect().top + window.scrollY - navbarHeight(),
                    behavior
                })
            }

            // Dorovnání až po dojetí animace, aby s ní druhý scroll nebojoval.
            // scrollend zatím neumí každý prohlížeč, proto i časový pojistkový limit.
            let done = false

            const correct = (): void => {
                if (done) {
                    return
                }

                done = true
                window.removeEventListener('scrollend', correct)

                if (Math.abs(section.getBoundingClientRect().top - navbarHeight()) > 1) {
                    scrollToTop('auto')
                }
            }

            window.addEventListener('scrollend', correct, { once: true })
            window.setTimeout(correct, 1200)
            scrollToTop('smooth')
        }

        const bind = (selector: string, action: () => void, scroll: boolean): void => {
            projects.querySelectorAll<HTMLElement>(selector).forEach(el => {
                el.addEventListener('click', () => {
                    action()
                    sync()

                    if (scroll) {
                        revealSection()
                    }
                })
            })
        }

        // Scrolluje jen spodní ovládání v boxíku. Horní tlačítka mají sekci
        // celou před sebou, takže by uskakování jen rušilo.
        bind('[data-carousel-mirror="prev"]', () => carousel.prev(), true)
        bind('[data-carousel-mirror="next"]', () => carousel.next(), true)
        // vlastní posun si u horních tlačítek řeší knihovna, my dorovnáme jen zrcadlo
        bind('[data-carousel="prev"]', () => {}, false)
        bind('[data-carousel="next"]', () => {}, false)

        sync()
    }
}
