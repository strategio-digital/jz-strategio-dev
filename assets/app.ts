/**
 * Copyright (c) 2022 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */

// Static files
import '@/assets/images'

// Stylesheets
import '@/assets/scss/layout.scss'

// VueJS
import { createApp } from 'vue'
import ContactForm from '@/assets/vue/app/contact-form/App.vue'
import SubscriberForm from '@/assets/vue/app/subscriber-form/App.vue'

// Typescript
import { useStepper } from '@/saas/frontend-utils/useStepper'
import { useScroller } from '@/saas/frontend-utils/useScroller'
import { useNavbar } from '@/saas/frontend-utils/useNavbar'
import { useAnalytics } from '@/saas/frontend-utils/useAnalytics'
import { useThumbnail } from '@/saas/frontend-utils/useThumbnail'
import highlight from '@/assets/ts/plugins/highlight'
import consoleInfo from '@/assets/ts/consoleInfo'
import carousels from '@/assets/ts/carousels'
import switchers from '@/assets/ts/switchers'

// Inject analytics script
if (window.location.host === 'jz.strategio.dev') {
    useAnalytics().injectScript('GTM-WLH66JJ')
}

// Create vue apps
createApp(ContactForm).mount('#vue-contact-form')
createApp(SubscriberForm).mount('#vue-subscriber-form')

// Register classic events
useScroller().registerEvents()
useNavbar().registerEvents()
useStepper().registerEvents()
useThumbnail().registerEvents()

// Register custom components & plugins
carousels()
highlight()
switchers()
consoleInfo()
