/**
 * Copyright (c) 2022 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.digital, jz@strategio.digital)
 */

// Static files
import '@/assets/images'

// Stylesheets
import '@/assets/scss/layout.scss'

// VueJS
import { createApp } from 'vue'
import App from '@/assets/vue/app/contact-form/App.vue'
createApp(App).mount('#vue-contact-form')

// Typescript
import highlight from '@/assets/ts/plugins/highlight'
import consoleInfo from '@/assets/ts/consoleInfo'
import carousels from '@/assets/ts/carousels'
import switchers from '@/assets/ts/switchers'

import { useStepper } from '@/assets/ts/components/useStepper'
import { useScroller } from '@/assets/ts/components/useScroller'
import { useNavbar } from '@/assets/ts/components/useNavbar'

useScroller().registerEvents()
useNavbar().registerEvents()
useStepper().registerEvents()

carousels()
highlight()
switchers()
consoleInfo()