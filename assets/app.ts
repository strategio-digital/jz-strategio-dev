/**
 * Copyright (c) 2022 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */

// Static files
import '@/assets/images'
import '@/assets/files/MealHack.pdf'

// Stylesheets
import '@/assets/scss/layout.scss'

// VueJS
import { createApp } from 'vue'
import ContactForm from '@/assets/vue/app/forms/contact-form/App.vue'
import SubscriberForm from '@/assets/vue/app/forms/subscriber-form/App.vue'

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
import writingAnimation from '@/assets/ts/writingAnimation'

// Inject analytics script
if (window.location.host === 'jz.strategio.dev') {
    useAnalytics().injectScript('GTM-WLH66JJ')
}

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
writingAnimation()

// Create vue apps
createApp(ContactForm).mount('#vue-contact-form')
createApp(SubscriberForm).mount('#vue-subscriber-form')

if (document.querySelector('#vue-open-ai-chat')) {
    const OpenAiChat = import('@/assets/vue/app/open-ai/chat/App.vue')
    OpenAiChat.then(module => createApp(module.default).mount('#vue-open-ai-chat'))
}

if (document.querySelector('#vue-open-ai-translator')) {
    const OpenAiTranslator = import('@/assets/vue/app/open-ai/translator/App.vue')
    OpenAiTranslator.then(module => createApp(module.default).mount('#vue-open-ai-translator'))
}
