<template>
    <header class="header">
        <ul class="header__menu nav nav-pills">
            <li class="nav-item">
                <router-link class="nav-link" aria-current="page" to="/" >Главная</router-link>
            </li>
            <li class="nav-item">
                <router-link class="nav-link" to="/donwload">Загрузка</router-link>
            </li>
        </ul>
    </header>
</template>

<script lang="ts">
import {defineComponent} from "vue";

export default defineComponent({
    components: {},
    setup() {
        return {};
    }
});

// export default {
    //     data() {
    //         return {
    //             links: [
    //                 {
    //                     title: "RanCraft",
    //                     href: "/"
    //                 },
    //                 {
    //                     title: "Загрузка",
    //                     href: "/download"
    //                 },
    //                 {
    //                     title: "Регистрация",
    //                     href: "/reg"
    //                 },
    //                 {
    //                     title: "Авторизация",
    //                     href: "/auth"
    //                 },
    //                 {
    //                     title: "Профиль",
    //                     href: "/profile"
    //                 },
    //                 {
    //                     title: "Донат",
    //                     href: "/donate"
    //                 },
    //                 {
    //                     title: "Админ панель",
    //                     href: "/admin"
    //                 },
    //             ]
    //         }
    //     }
    //}
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
