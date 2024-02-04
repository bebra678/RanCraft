<template>
    <aside class="aside">
        <a class="aside__logo" href="#">
            <img src="../../img/aside/aside-logo.svg" alt="Логотип проекта RanCraft">
        </a>
        <ul class="aside__list">
            <li class="aside__item">
                <router-link class="aside__link" aria-current="page" to="/">
                    <img src="../../img/aside/aside-list-icon-1.svg" alt="" aria-hidden="true">
                    Главная
                </router-link>
            </li>
            <li class="aside__item">
                <a class="aside__link" href="#">
                    <img src="../../img/aside/aside-list-icon-2.svg" alt="" aria-hidden="true">
                    Правила
                </a>
            </li>
            <li class="aside__item">
                <a class="aside__link" href="#">
                    <img src="../../img/aside/aside-list-icon-3.svg" alt="" aria-hidden="true">
                    Сервера
                </a>
            </li>
        </ul>
    </aside>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import axios from "axios";

export default defineComponent({
    components: {},
    setup() {
        return {};
    },
    data() {
        return {
            token: null
        }
    },
    mounted() {
        this.getToken()
    },
    updated() {
        this.getToken()
    },
    methods: {
        logout() {
            axios.post('/logout')
                .then(res => {
                    localStorage.removeItem('x_xsrf_token')
                    this.$router.push({ name: 'login' })
                })
        },
        getToken() {
            this.token = localStorage.getItem('x_xsrf_token')
        },
    },
});
</script>

<style>
body {
    background-color: #F1F8FD;
    font-family: 'Roboto', sans-serif;
}

#app {
    display: flex;
    justify-content: space-between;
}

.main {
    max-width: 800px;
    width: 100%;
    margin: 0 auto;
    padding: 25px;
}

.aside {
    padding: 25px;
    display: flex;
    flex-direction: column;
    gap: 60px;
    align-items: center;
    width: 100%;
    max-width: 200px;
}

.aside__list {
    margin: 0;
    padding: 0;
    list-style-type: none;
    display: flex;
    flex-direction: column;
    gap: 50px;
}

.aside__link {
    text-decoration: none;
    color: #18333E;
    font-size: 16px;
    font-weight: 500;
    line-height: normal;
    display: flex;
    align-items: center;
    gap: 14px;
}
</style>
