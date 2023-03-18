<script lang="ts" setup>
import { onMounted, onUpdated, ref } from 'vue'
import markdown from 'markdown-it'

const md = markdown()
const apiKey = 'anotZGV2LTY2Ni5jb29M'
const timeout = ref(20)
const active = ref(false)
const loading = ref(false)
const messageBox = ref<HTMLElement>()
const message = ref<string>('')

const messages = ref([
    {
        time: new Date(),
        name: 'Jiří Zapletal',
        shortName: 'JZ',
        role: 'author',
        content: `Dobrý den, chat se aktivuje za několik vteřin. Využívání Open AI stojí pár korun měsíčně. Toto je pouze ochrana, aby mi spam-boti zbytečně neutráceli peníze.`
    }
])

async function fetchApi(): Promise<any> {
    const response = await fetch('/api/utils/open-ai/chat-bot', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            apiKey: atob(apiKey),
            debug: false,
            messages: messages.value.filter((message) => ['system', 'user', 'assistant'].includes(message.role)).map((message) => {
                return {
                    content: message.content,
                    role: message.role
                }
            })
        })
    })

    const data = await response.json()

    if (data.errors) {
        throw new Error(data.errors)
    }

    return data
}

async function sendMessage(): Promise<void> {
    const currentMessage = message.value
    message.value = ''
    loading.value = true
    messages.value.push({ time: new Date(), content: currentMessage, role: 'user', name: 'Vy', shortName: 'Vy' })

    try {
        const data = await fetchApi()
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

onMounted(() => {
    const interval = setInterval(() => {
        timeout.value = timeout.value - 1
        if (timeout.value <= 0) {
            clearInterval(interval)
            active.value = true
            messages.value = []
            messages.value.push({
                time: new Date(),
                content: 'Zdravím, jsem AI Chatbot. Položte mi jakýkoliv dotaz.',
                role: 'system',
                name: 'AI Bot',
                shortName: 'AI'
            })
        }
    }, 1000)
})

onUpdated(() => {

    const lastMsg = document.querySelector('.message:last-child') as HTMLElement

    // scroll to start of the last message
    //@ts-ignore
    messageBox.value.scrollTop = lastMsg.offsetTop - 16 * 1.5

    document.querySelectorAll('.message .content a:not([target="_blank"])').forEach((link) => {
        link.setAttribute('target', '_blank')
    })
})

</script>

<template>
    <div style="height: 500px" class="border rounded-3 d-flex flex-column justify-content-between mb-4 shadow-sm">
        <div class="p-4 overflow-auto position-relative" ref="messageBox">

            <div v-for="message in messages" :key="message.time.toLocaleString()" class="d-flex message">
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
                    <div class="content" style="line-height: 1.5; font-size: 1rem" v-html="md.render(message.content)"></div>
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

@import "bootstrap/scss/functions";
@import "bootstrap/scss/variables";
@import "bootstrap/scss/maps";
@import "bootstrap/scss/mixins";

.message {
    margin-bottom: 2rem;

    &:last-child {
        margin-bottom: 0;
    }

    .text {
        padding: 1rem;
        width: 100%;
        @include media-breakpoint-up(sm) {
            width: calc(100% - 50px);
        }

        &.order-0 {
            border-top-right-radius: 0 !important;
        }

        &.order-1 {
            border-top-left-radius: 0 !important;
        }

        &.author {
            background-color: #f6f6f6;
            color: #c46b6b;
        }

        &.user {
            background-color: #3e7bd5;
            color: #fff;
        }

        &.error {
            background-color: #f8d7da;
            color: #721c24;
        }

        &.system {
            background-color: #f6f6f6;
        }

        &.assistant {
            background-color: #f6f6f6;
        }
    }

    .icon {
        width: 50px;
        height: 50px;
        color: #fff;

        &.author {
            background-color: #c46b6b;
        }

        &.user {
            background-color: #3e7bd5;
        }

        &.error {
            background-color: #721c24;
        }

        &.system {
            background-color: #f6f6f6;
            color: gray;
        }

        &.assistant {
            background-color: #f6f6f6;
            color: gray;
        }
    }

    .content {
        overflow: auto;
        width: 100%;
        *:last-child {
            margin-bottom: 0;
        }
    }

    code,
    pre {
        margin: .5rem 0 1rem;
        overflow: auto;
    }
    table {
        width: 100%;
        border: 1px solid #d7d7d7;
        margin: .5rem 0 1rem;
        overflow: auto;
        white-space: nowrap;

        th,
        td {
            line-height: 1;
            font-size: .9rem;
            border: 1px solid #d7d7d7;
            padding: .7rem;
        }
    }
}
</style>