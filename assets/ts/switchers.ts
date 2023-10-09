/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */

import { useSwitcher } from 'megio-frontils'

export default () => {
    const code: HTMLDivElement | null = document.querySelector('#code-switcher')

    if (code) {
        useSwitcher(code).registerEvents()
    }
}