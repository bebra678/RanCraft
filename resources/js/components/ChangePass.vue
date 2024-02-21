<template>
    <h1 class="main-title">Сменить пароль</h1>
    <div class="reg-form">
        <label class="reg-label">
            Старый пароль
            <input type="text" placeholder="Введите cтарый пароль" class="form-control">
        </label>
        <label class="reg-label">
            Новый пароль
            <input type="text" placeholder="Введите новый пароль" class="form-control">
        </label>
        <label class="reg-label">
            Повторите пароль
            <input type="email" placeholder="Введите новый пароль" class="form-control">
        </label>

        <input value="СМЕНИТЬ ПАРОЛЬ" class="aside-auth__btn reg-btn">
    </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import axios from "axios";

export default defineComponent({
    components: {},
    setup() {
        return {};
    },
});
</script>

<style></style>
