/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */
import { ref } from 'vue'
import { TAlert } from '@/assets/vue/app/forms/types/TAlert'

export const useAlert = () => {
    const data = ref<null | TAlert>(null)

    function setAlert(type: TAlert['type'], message: TAlert['message']) {
        data.value = {
            type,
            message
        }
    }

    function reset() {
        data.value = null
    }

    return {
        setAlert,
        reset,
        data,
    }
}