<script lang="ts" setup>
import { onMounted, onUpdated, ref } from 'vue'
import markdown from 'markdown-it'
import { useChat } from '@/assets/vue/app/open-ai/composables/useChat'

const { container, active, loading, timeout, fetchApi, scrollToBottom, activator } = useChat()
const md = markdown()

const message = ref('')
const messages = ref([{
    time: new Date(),
    name: 'Jiří Zapletal',
    shortName: 'JZ',
    role: 'author',
    content: `Dobrý den, chat se aktivuje za několik vteřin. Využívání Open AI stojí pár korun měsíčně. Toto je pouze ochrana, aby mi spam-boti zbytečně neutráceli peníze.`
}])

function formattedMessage(): { content: string, role: string }[] {
    return messages.value.filter((message) => ['system', 'user', 'assistant'].includes(message.role)).map((message) => {
        return {
            content: message.content,
            role: message.role
        }
    })
}

async function sendMessage(): Promise<void> {
    const currentMessage = message.value
    message.value = ''
    loading.value = true
    messages.value.push({ time: new Date(), content: currentMessage, role: 'user', name: 'Vy', shortName: 'Vy' })

    try {
        const formattedMessages = formattedMessage()
        const data = await fetchApi('/api/utils/open-ai/chat-bot', { messages: formattedMessages })
        messages.value.push({
            time: new Date(),
            content: data.content,
            role: data.role,
            name: 'AI Bot',
            shortName: 'AI'
        })
    } catch (e) {
        messages.value.push({ time: new Date(), content: e as string, role: 'error', name: 'Chyba', shortName: '!' })
    }

    loading.value = false
}

onMounted(() => activator(() => {
    messages.value = []
    messages.value.push({
        time: new Date(),
        content: 'Zdravím, jsem AI Chatbot. Položte mi jakýkoliv dotaz.',
        role: 'system',
        name: 'AI Bot',
        shortName: 'AI'
    })
}))

onUpdated(() => {
    scrollToBottom()
    document.querySelectorAll('.box-message .content a:not([target="_blank"])').forEach((link) => {
        link.setAttribute('target', '_blank')
    })
})
</script>

<template>
    <div style="height: 500px" class="border rounded-3 d-flex flex-column justify-content-between mb-4 shadow-sm">
        <div class="p-4 overflow-auto position-relative" ref="container">
            <div v-for="message in messages" :key="message.time.toLocaleString()" class="d-flex open-ai-message box-message">
                <div :class="message.role === 'user' ? 'order-1 ms-sm-2' : 'order-0 me-sm-2'">
                    <div
                        class="icon d-none d-sm-flex justify-content-center align-items-center rounded-circle"
                        :class="message.role"
                    >
                        {{ message.shortName }}
                    </div>
                </div>
                <div
                    class="rounded-4 text"
                    :class="[message.role, message.role === 'user' ? 'order-0' : 'order-1']"
                >
                    <div class="opacity-75 mb-2" style="line-height: 1; font-size: .9rem">
                        ({{ message.name }}) {{ message.time.toLocaleString() }}
                    </div>
                    <div
                        class="content"
                        style="line-height: 1.5; font-size: 1rem"
                        v-html="md.render(message.content)"
                    ></div>
                </div>
            </div>
        </div>

        <div class="bg-light w-100 d-flex p-4 rounded-bottom">
            <form @submit.prevent="sendMessage" class="input-group mb-0">
                <input
                    v-model="message"
                    type="text"
                    class="form-control"
                    placeholder="Zde zadejte dotaz..."
                    aria-label="Recipient's username"
                    aria-describedby="button-chat"
                    :disabled="!active"
                    required
                    minlength="3"
                >
                <button
                    class="btn btn-primary"
                    type="submit"
                    id="button-chat"
                    :disabled="loading || !active"
                >
                    <span v-if="loading || !active" class="spinner-border spinner-border-sm me-2" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </span>
                    <span v-if="!active">Aktivace za {{ timeout }}s</span>
                    <span v-else-if="loading">Generuji...</span>
                    <span v-else>Odeslat</span>
                </button>
            </form>
        </div>
    </div>
</template>

<style lang="scss">
@import 'assets/scss/vue/open-ai/open-ai-message';
</style>