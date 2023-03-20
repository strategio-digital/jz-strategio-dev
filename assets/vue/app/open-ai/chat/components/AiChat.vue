<script lang="ts" setup>
import { onMounted, onUpdated, ref } from 'vue'
import { useChat } from '@/assets/vue/app/open-ai/composables/useChat'
import ChatMessage from '@/assets/vue/app/open-ai/chat/components/ChatMessage.vue'

const { container, active, loading, timeout, introMessage, fetchApi, scrollToBottom, activator } = useChat()

const message = ref('')
const messages = ref([introMessage])

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
        messages.value.push({ time: new Date(), content: 'Něco se pokazilo, zkuste to prosím znovu.', role: 'error', name: 'Chyba', shortName: '!' })
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
    <div style="height: 500px" class="border rounded-top d-flex flex-column justify-content-between mb-4 shadow-sm">
        <div class="p-4 overflow-auto position-relative" ref="container">
            <ChatMessage :message="message" v-for="message in messages" :key="message.time.getTime()" />
        </div>

        <div class="bg-light w-100 d-flex p-4 animated-box">
            <form @submit.prevent="sendMessage" class="input-group mb-0">
                <input
                    v-model="message"
                    type="text"
                    class="form-control"
                    placeholder="Zde zadejte dotaz..."
                    aria-label="Zadejte dotaz..."
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