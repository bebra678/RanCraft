<template>
    <Sidebar></Sidebar>
    <main class="main">
        <router-view></router-view>
    </main>
    <SidebarAuth></SidebarAuth>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import Sidebar from "./components/Sidebar.vue";
import SidebarAuth from "./components/SidebarAuth.vue";
import axios from "axios";
// import { useRecaptchaProvider } from 'vue-recaptcha';
// useRecaptchaProvider();


export default defineComponent({
    components: {
        Sidebar,
        SidebarAuth
    },
    setup() {
        return {
            username: 'Daniil'
        };
    },
});
</script>

<style scoped></style>
