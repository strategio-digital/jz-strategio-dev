/**
 * Copyright (c) 2022 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.digital, jz@strategio.digital)
 */

// Static files
import '@/assets/images'

// Stylesheets
import '@/assets/scss/layout.scss'

// Typescript
import heroSection from '@/assets/ts/particles/heroSection'
import stepper from '@/assets/ts/stepper'
import highlight from '@/assets/ts/highlight/highlight'
import { useScroll } from '@/assets/ts/scroll'
import { useCarousel } from '@/assets/ts/carousel'
import { useSwitcher } from '@/assets/ts/switcher'
import { useNavbar } from '@/assets/ts/navbar'

useScroll().registerEvents()
useNavbar().registerEvents()
stepper()
highlight()
heroSection()

useSwitcher(document.querySelector('#code-switcher') as HTMLDivElement)
useCarousel(document.querySelector('#about-carousel') as HTMLDivElement, {
    autoPlay: {
        speed: 10000,
        enabled: true
    }
}).create()
useCarousel(document.querySelector('#reference-carousel') as HTMLDivElement, {
    autoPlay: {
        speed: 0,
        enabled: false
    }
}).create()

console.log(
    `%c\nContact me at:\n\njz@strategio.dev\n\n+420 606 091 125 \n\nI'm looking forward to hearing from you!\n`,
    `font-weight: bold; font-size: 2rem; color: white; background: #f90; width: 300px;`
)

console.log(
    `%cBTW Don't use Particle engine for production, it's costs a lot of performance!`,
    `font-weight: bold; font-size: 1.5rem; color: white; background: #f90; padding: 5px;`
)

// VueJS example
// import { createApp } from 'vue'
// import App from '@/assets/vue/app/App.vue'
// createApp(App).mount('#vue-app')