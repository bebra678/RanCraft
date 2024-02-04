<template>
    <header class="header">
        <ul class="header__menu nav nav-pills">
            <li class="nav-item">
                <router-link class="nav-link" aria-current="page" to="/">Главная</router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link" to="/download">Загрузка</router-link>
            </li>
            <li v-if="token" class="nav-item">
                <router-link class="nav-link" to="/admin">Админ Панель</router-link>
            </li>
            <li v-if="!token" class="nav-item">
                <router-link class="nav-link" to="/reg">Регистрация</router-link>
            </li>
            <li v-if="!token" class="nav-item">
                <router-link class="nav-link" to="/auth">Войти</router-link>
            </li>
            <li v-if="token" class="nav-item">
                <router-link class="nav-link" to="/profile">Профиль</router-link>
            </li>
            <li v-if="token" class="nav-item">
                <router-link class="nav-link" to="/donate">Донат</router-link>
            </li>
            <li class="nav-item">
                <a v-if="token" @click.prevent="logout" class="nav-link" href="#">Выйти</a>
            </li>
        </ul>
    </header>
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
.header {
    width: 992px;
    margin: 0 auto;
    height: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>
