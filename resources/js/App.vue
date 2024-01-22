<template>
    <Header></Header>
    <main class="main">
        <router-view></router-view>
    </main>
    <p>Привет ASd</p>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import Header from "./components/Header.vue";

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
