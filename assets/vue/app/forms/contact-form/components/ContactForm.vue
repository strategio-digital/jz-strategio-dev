<script lang="ts" setup>
import * as yup from 'yup'
import { computed, ref } from 'vue'
import { Form, Field, ErrorMessage, FormActions } from 'vee-validate'
import { useContentioApi, useAntiSpam, useAnalytics } from 'megio-frontils'
import { TLead } from '@/assets/vue/app/forms/types/TLead'
import { useAlert } from '@/assets/vue/app/forms/composables/useAlert'

type Values = {
    name: string
    email: string
    phone: string
    message: string
}

const api = useContentioApi()
const alert = useAlert()
const antiSpam = useAntiSpam(10 * 1000, 'Prosím vyčkejte 10 vteřin, tímto se bráním proti spamu, děkuji za pochopení.')
const { trackLeadGenerate } = useAnalytics()


const alertData = ref(alert.data)
const loading = ref(false)
const values = ref<Values>({ name: '', email: '', phone: '', message: '' })
const emptyForm = computed(() => Object.values(values.value).filter(value => value !== '').length === 0)

const schema = yup.object({
    name: yup.string().required('Jméno je povinné.'),
    email: yup.string().required('E-mail je povinný.').email('E-mail není platný.'),
    phone: yup.string().required('Telefon je povinný.').min(9, 'Telefon musí mít alespoň 9 číslic.'),
    message: yup.string()
})

function createData(): TLead {
    return {
        type: 'jz-web-contactForm',
        params: {
            name: values.value.name,
            email: values.value.email,
            phone: values.value.phone,
            message: values.value.message
        }
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

    const resp = await api.fetchApi('/lead/create', {
        method: 'POST',
        body: JSON.stringify(createData())
    })

    if (resp.success) {
        alert.setAlert('success', 'Děkuji, formulář byl úspěšně odeslán. Do 60 minut se Vám ozvu a probereme vše potřebné.')
        actions.resetForm({ values: { name: '', email: '', phone: '', message: '' } })
        trackLeadGenerate()
    } else {
        alert.setAlert('danger', 'Je mi to líto, ale něco se pokazilo. Kontaktujte mě prosím jiným způsobem.')
    }

    loading.value = false
}
</script>

<template>
    <Form
        @submit="handleSubmit"
        v-slot="{ errors }"
        :validation-schema="schema"
        class="p-4 p-lg-5 bg-white shadow rounded-1 border contact-form"
        :class="{ 'no-transform' : !emptyForm }"
    >
        <h3 class="fw-bold mb-4">Poptávky a dotazy</h3>

        <div class="form-floating mb-3">
            <Field
                v-model="values.name"
                :class="{ 'is-invalid' : errors?.name }"
                name="name"
                type="text"
                id="name"
                class="form-control"
                placeholder="Jméno nebo název firmy"
            />
            <label for="name">Jméno nebo název firmy: <span class="text-danger">*</span></label>
            <ErrorMessage name="name" as="div" class="invalid-feedback" />
        </div>

        <div class="form-floating mb-3">
            <Field
                v-model="values.email"
                :class="{ 'is-invalid' : errors?.email }"
                name="email"
                type="text"
                id="email"
                class="form-control"
                placeholder="E-mail"
            />
            <label for="email">E-mail: <span class="text-danger">*</span></label>
            <ErrorMessage name="email" as="div" class="invalid-feedback" />
        </div>
        <div class="form-floating mb-3">
            <Field
                v-model="values.phone"
                :class="{ 'is-invalid' : errors?.phone }"
                name="phone"
                type="text"
                id="phone"
                class="form-control"
                placeholder="Telefon"
            />
            <label for="phone">Telefon: <span class="text-danger">*</span></label>
            <ErrorMessage name="phone" as="div" class="invalid-feedback" />
        </div>
        <div class="form-floating mb-3">
            <Field
                v-model="values.message"
                :class="{ 'is-invalid' : errors?.message }"
                name="message"
                as="textarea"
                id="message"
                class="form-control"
                placeholder="Zpráva"
                style="height: 180px"
            />
            <label for="message">Zpráva:</label>
            <ErrorMessage name="message" as="div" class="invalid-feedback" />
        </div>

        <div class="small text-secondary mb-3">
            Odesláním souhlasím s podmínkami
            <a href="//strategio.dev/article/gdpr" class="link-secondary" target="_blank">GDPR</a>.
        </div>

        <div v-if="alertData" :class="[`alert-${alertData.type}`]" class="alert fw-bold">
            <i class="bi bi-check-circle"></i> {{ alertData.message }}
        </div>

        <button type="submit" class="btn btn-warning btn-xl shadow-sm w-100" :disabled="loading">
            <span v-if="loading" class="spinner-border spinner-border-sm text-light" role="status">
                <span class="visually-hidden">Loading...</span>
            </span>
            <span v-if="!loading">Odeslat zprávu</span>
        </button>
    </Form>
</template>