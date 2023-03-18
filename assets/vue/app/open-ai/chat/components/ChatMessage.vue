<script lang="ts" setup>
import { PropType } from 'vue'
import markdown from 'markdown-it'
const md = markdown()

defineProps({
    message: {
        type: Object as PropType<{ time: Date, name: string, shortName: string, role: string, content: string }>,
        required: true
    }
})
</script>

<template>
    <div class="d-flex open-ai-message box-message">
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
</template>