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
import { useCarousel } from '@/assets/ts/carousel'

scroll()
stepper()
heroSection()

const carousels: HTMLDivElement[] = Array.from(document.querySelectorAll('.carousel'))
carousels.forEach((el) => useCarousel(el, { autoPlay: { speed: 10000, enabled: true } }).create())

// VueJS example
// import { createApp } from 'vue'
// import App from '@/assets/vue/app/App.vue'
// createApp(App).mount('#vue-app')