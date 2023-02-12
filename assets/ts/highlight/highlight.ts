/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.digital, jz@strategio.digital)
 */

import 'highlight.js/styles/base16/material.css';
import hljs from 'highlight.js/lib/core'
import ts from 'highlight.js/lib/languages/typescript'
import php from 'highlight.js/lib/languages/php'
import scss from 'highlight.js/lib/languages/scss'
import docker from 'highlight.js/lib/languages/dockerfile'

export default ()  => {
    hljs.registerLanguage('ts', ts)
    hljs.registerLanguage('php', php)
    hljs.registerLanguage('scss', scss)
    hljs.registerLanguage('docker', docker)

    document.addEventListener('DOMContentLoaded', () => {
        const codes: HTMLElement[] = Array.from(document.querySelectorAll('pre code'))
        codes.forEach((el) => hljs.highlightElement(el))
    });
}