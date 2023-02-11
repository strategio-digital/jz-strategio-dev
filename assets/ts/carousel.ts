/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.digital, jz@strategio.digital)
 */

export type Options = {
    autoPlay: { speed: number, enabled: boolean }
}

export const useCarousel = (el: HTMLDivElement, options: Options) => {
    const itemWrapper = el.querySelector('[data-carousel="items"]') as HTMLDivElement
    const items = Array.from(el.querySelectorAll('[data-carousel="item"]')) as HTMLDivElement[]
    const next = el.querySelector('[data-carousel="next"]') as HTMLButtonElement
    const prev = el.querySelector('[data-carousel="prev"]') as HTMLButtonElement
    const counter = el.querySelector('[data-carousel="counter"]') as HTMLElement

    const resizeObserver = new ResizeObserver(updateSizing)

    let currentIndex = 0
    let autoPlayInterval: number | null = null

    function updateSizing(): void {
        const max = items.reduce((a, b) => Math.max(a, b.offsetHeight), 0)
        itemWrapper.style.height = max.toString() + 'px'
    }

    function create(): void {
        resizeObserver.observe(el)

        next.addEventListener('click', () => {
            handleNext()
            restartAutoplay()
        })

        prev.addEventListener('click', () => {
            handlePrev()
            restartAutoplay()
        })

        items.map(el => hideItem(el))
        showItem(items[0])

        restartAutoplay()
        updateCounter()
        updateSizing()
    }

    function handleNext(): void {
        const nextIndex = currentIndex === items.length - 1 ? 0 : currentIndex + 1
        hideItem(items[currentIndex])
        showItem(items[nextIndex])
        currentIndex = nextIndex
        updateCounter()
    }

    function handlePrev(): void {
        const prevIndex = currentIndex === 0 ? items.length - 1 : currentIndex - 1
        hideItem(items[currentIndex])
        showItem(items[prevIndex])
        currentIndex = prevIndex
        updateCounter()
    }

    function updateCounter() {
        counter.innerText = (currentIndex + 1) + ' / ' + items.length
    }

    function hideItem(item: HTMLDivElement): void {
        item.classList.add('carousel-hide')
        item.classList.remove('carousel-show')
    }

    function showItem(item: HTMLDivElement): void {
        item.classList.remove('carousel-hide')
        item.classList.add('carousel-show')
    }

    function restartAutoplay() {
        if (options.autoPlay.enabled) {
            if (autoPlayInterval) {
                clearInterval(autoPlayInterval)
            }

            autoPlayInterval = setInterval(handleNext, options.autoPlay.speed)
        }
    }

    return {
        create,
        handleNext,
        handlePrev,
        getStats: () => {
            return {
                currentIndex
            }
        }
    }
}
