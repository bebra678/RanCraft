<template>
    <Header></Header>
    <main class="main">
        <router-view></router-view>
    </main>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import Header from "./components/Header.vue";
import axios from "axios";
// import { useRecaptchaProvider } from 'vue-recaptcha';
// useRecaptchaProvider();


export default defineComponent( {
    components: {
        Header
    },
    setup() {
        return {
            username: 'Daniil'
        };
    },
});
</script>

<style scoped>

</style>
