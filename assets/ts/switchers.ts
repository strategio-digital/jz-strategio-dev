/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */

import { useSwitcher } from '@/saas/frontend-utils/useSwitcher'

export default () => {
    const code: HTMLDivElement | null = document.querySelector('#code-switcher')

    if (code) {
        useSwitcher(code)
    }
}