/**
 * Copyright (c) 2022 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.digital, jz@strategio.digital)
 */

// Static files
import '@/assets/images'

// Stylesheets
import '@/assets/scss/layout.scss'

// Typescript
import scroll from '@/assets/ts/scroll'
import heroSection from '@/assets/ts/particles/heroSection'
import stepper from '@/assets/ts/stepper'
import highlight from '@/assets/ts/highlight/highlight'
import { useCarousel } from '@/assets/ts/carousel'
import { useSwitcher } from '@/assets/ts/switcher'

scroll()
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


// VueJS example
// import { createApp } from 'vue'
// import App from '@/assets/vue/app/App.vue'
// createApp(App).mount('#vue-app')