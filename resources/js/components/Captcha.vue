<template>
    <vue-recaptcha sitekey="6LexN2YpAAAAAP0smS_HCGQPNY_7Q68004qx90pq" @verify="onVerify"></vue-recaptcha>
</template>

<script>
import VueRecaptcha from 'vue-recaptcha';

export default {
    components: {
        VueRecaptcha,
    },
    methods: {
        onVerify(response) {
            // Обработка результата проверки
        }
    }
}
</script>
