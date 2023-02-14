<script lang="ts" setup>

</script>

<template>
    <div class="p-4 p-lg-5 bg-white shadow rounded-1 border contact-form">
        <h3 class="fw-bold mb-4">Poptávky a dotazy</h3>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="name" placeholder="Jméno nebo název firmy">
            <label for="name">Jméno nebo název firmy: <span class="text-danger">*</span></label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="email" placeholder="E-mail">
            <label for="email">E-mail: <span class="text-danger">*</span></label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="phone" placeholder="Telefon">
            <label for="phone">Telefon: <span class="text-danger">*</span></label>
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" id="message" placeholder="Zpráva" style="height: 180px"></textarea>
            <label for="message">Zpráva:</label>
        </div>
        <div class="small text-secondary mb-3">
            Odesláním souhlasím s podmínkami
            <a href="//strategio.dev/article/gdpr" class="link-secondary" target="_blank">GDPR</a>.
        </div>
        <button class="btn btn-warning btn-xl shadow-sm w-100">
            Odeslat zprávu
        </button>
    </div>
</template>