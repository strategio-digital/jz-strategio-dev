<script lang="ts" setup>
import { onMounted, onUpdated, ref } from 'vue'
import { useChat } from '@/assets/vue/app/open-ai/composables/useChat'
import ChatMessage from '@/assets/vue/app/open-ai/chat/components/ChatMessage.vue'
import { TMessage } from '@/assets/vue/app/open-ai/types/TMessage'
import { TTranslation } from '@/assets/vue/app/open-ai/types/TTranslation'

const { active, loading, timeout, introMessage, fetchApi, activate, scrollToBottom } = useChat()
const container = ref<HTMLElement>()
const message = ref()
const messages = ref<TMessage[]>([introMessage])
const translations = ref<TTranslation[]>([])
const angle = ref(0)

const languages = ['English', 'German', 'French', 'Spanish', 'Italian', 'Ukrainian', 'Chinese', 'Japanese']

async function sendMessage(): Promise<void> {
    const currentMessage = message.value
    message.value = null
    messages.value.push({ time: new Date(), content: 'Přelož: ' + currentMessage, role: 'user', name: 'Vy', shortName: 'Vy' })
    loading.value = true
    translations.value = []

    try {
        const data = await fetchApi('/api/utils/open-ai/translator', {
            message: currentMessage,
            languages,
        })
        messages.value = []
        translations.value = data.translations
    } catch (e) {
        messages.value.push({ time: new Date(), content: 'Něco se pokazilo, zkuste to prosím znovu.', role: 'error', name: 'Chyba', shortName: '!' })
    }

    loading.value = false
}

onMounted(() => {
    activate(() => {
        messages.value = []
        messages.value.push({
            time: new Date(),
            content: 'Zdravím, jsem AI Překladatel. Autor článku mi nastavil, abych překládal do následujících jazyků: ' + languages.join(', ') + '.  Zadejte mi nějaký text k překladu.',
            role: 'system',
            name: 'AI Bot',
            shortName: 'AI'
        })
    })

    const timeout = setInterval(() => {
        angle.value += 0.01
    }, 20)

    return () => clearInterval(timeout)
})

let lastHeight = 0
onUpdated(() => {
    if(container.value && container.value.scrollHeight !== lastHeight) {
        lastHeight = container.value?.scrollHeight
        scrollToBottom(container.value)
    }
})
</script>

<template>
    <div style="height: 520px" class="border rounded-top d-flex flex-column justify-content-between mb-4 shadow-sm">
        <div class="p-4 overflow-auto position-relative" ref="container">
            <ChatMessage v-for="message in messages" :message="message" :key="message.time.getTime()" />
            <div class="fw-bold" v-if="translations.length > 0">Výsledná tabulka:</div>
            <div v-if="translations.length > 0" class="open-ai-message box-message">
                <div class="content">
                    <table>
                        <tr>
                            <th>Jazyk</th>
                            <th>Překlad</th>
                        </tr>
                        <tr v-for="translation in translations">
                            <td>{{ translation.name }}</td>
                            <td>{{ translation.message }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="bg-light w-100 d-flex p-4 animated-box" :style="`--angle:${angle}turn`">
            <form @submit.prevent="sendMessage" class="input-group mb-0">
                <input
                    v-model="message"
                    type="text"
                    class="form-control"
                    placeholder="Text k překladu..."
                    aria-label="Text k překladu..."
                    aria-describedby="button-translator"
                    :disabled="!active"
                    required
                    minlength="3"
                >
                <button
                    class="btn btn-primary"
                    type="submit"
                    id="button-translator"
                    :disabled="loading || !active"
                >
                    <span v-if="loading || !active" class="spinner-border spinner-border-sm me-2" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </span>
                    <span v-if="!active">Aktivace za {{ timeout }}s</span>
                    <span v-else-if="loading">Překládám...</span>
                    <span v-else>Přeložit</span>
                </button>
            </form>
        </div>
    </div>
</template>