/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */

import { ref } from 'vue'

export const useChat = () => {
    const apiKey = 'anotZGV2LTY2Ni5jb29M'
    const container = ref<HTMLElement>()
    const timeout = ref(1)
    const active = ref(false)
    const loading = ref(false)

    const introMessage = {
        time: new Date(),
        name: 'Jiří Zapletal',
        shortName: 'JZ',
        role: 'author',
        content: `Dobrý den, okno se aktivuje za několik vteřin. Využívání Open AI stojí pár korun měsíčně. Toto je pouze ochrana, aby mi spam-boti zbytečně neutráceli peníze.`
    }

    async function fetchApi(uri: string, params: any): Promise<any> {
        const response = await fetch(uri, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                apiKey: atob(apiKey),
                debug: false,
                ...params
            })
        })

        const data = await response.json()

        if (data.errors) {
            throw new Error(data.errors)
        }

        return data
    }

    function scrollToBottom() {
        const lastMsg = container.value?.querySelector('.box-message:last-child') as HTMLElement

        if (container.value && lastMsg) {
            container.value.scrollTop = lastMsg.offsetTop - 16 * 1.5
        }
    }

    function activator(callback?: () => void) {
        const interval = setInterval(() => {
            timeout.value = timeout.value - 1
            if (timeout.value <= 0) {
                clearInterval(interval)
                active.value = true
                if (callback) callback()
            }
        }, 1000)
    }

    return {
        container,
        timeout,
        active,
        loading,
        introMessage,
        fetchApi,
        scrollToBottom,
        activator
    }
}