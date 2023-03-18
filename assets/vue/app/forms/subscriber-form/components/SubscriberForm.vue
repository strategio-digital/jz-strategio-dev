<script lang="ts" setup>
import * as yup from 'yup'
import { ref } from 'vue'
import { Form, Field, ErrorMessage, FormActions } from 'vee-validate'
import { useApi } from '@/saas/frontend-utils/useApi'
import { useAnalytics } from '@/saas/frontend-utils/useAnalytics'
import { useAntiSpam } from '@/saas/frontend-utils/useAntiSpam'
import { useAlert } from '@/assets/vue/app/forms/composables/useAlert'
import { TNewsletter } from '@/assets/vue/app/forms/types/TNewsletter'

type Values = { email: string }

const api = useApi()
const alert = useAlert()
const antiSpam = useAntiSpam(10 * 1000, 'Prosím vyčkejte 10 vteřin, tímto se bráním proti spamu, děkuji za pochopení.')
const { trackNewsletterSubscribe } = useAnalytics()

const alertData = ref(alert.data)
const loading = ref(false)
const values = ref<Values>({ email: '' })

const schema = yup.object({
    email: yup.string().required('E-mail je povinný.').email('E-mail není platný.')
})

function createData(): TNewsletter {
    return {
        email: values.value.email
    }
}

async function handleSubmit(v: any, actions: FormActions<Values>): Promise<void> {
    loading.value = true
    alert.reset()

    if (! antiSpam.isReady()) {
        alert.setAlert('danger', antiSpam.message)
        loading.value = false
        return
    }

    const resp = await api.fetchApi('/newsletter/subscribe', {
        method: 'POST',
        body: JSON.stringify(createData())
    })

    if (resp.success) {
        alert.setAlert('success', 'Úspěšně jste se přihlásili k odběru.')
        await actions.resetForm({ values: { email: '' } })
        trackNewsletterSubscribe()
    } else {
        alert.setAlert('danger', 'Je mi to líto, ale něco se pokazilo. Prosím, kontaktujte mě přes e-mail.')
    }

    loading.value = false
}
</script>

<template>
    <Form @submit="handleSubmit" v-slot="{ errors }" :validation-schema="schema">
        <div class="input-group">
            <Field
                v-model="values.email"
                :class="{ 'is-invalid' : errors?.email }"
                name="email"
                type="text"
                id="newsletter-email"
                class="form-control"
                placeholder="E-mail *"
                aria-label="E-mail"
                aria-describedby="newsletter-email"
            />

            <button type="submit" class="btn btn-warning" :disabled="loading">
                <span v-if="loading" class="spinner-border spinner-border-sm text-light" role="status">
                    <span class="visually-hidden">Loading...</span>
                </span>
                <span v-if="!loading" class="small">Odebírat novinky</span>
            </button>

            <ErrorMessage name="email" as="div" class="invalid-feedback" />
        </div>

        <div class="small mt-1 text-end text-secondary">
            Odesláním souhlasím s podmínkami
            <a href="//strategio.dev/article/gdpr" class="link-secondary" target="_blank">GDPR</a>.
        </div>

        <div v-if="alertData" :class="[`alert-${alertData.type}`]" class="alert fw-bold mb-0 mt-3">
            <i class="bi bi-check-circle"></i> {{ alertData.message }}
        </div>
    </Form>
</template>