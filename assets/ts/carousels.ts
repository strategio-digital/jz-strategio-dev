/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */

import { useCarousel } from '@/saas/frontend-utils/useCarousel'

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
}