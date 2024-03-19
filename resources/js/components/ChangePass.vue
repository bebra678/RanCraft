<template>
    <h1 class="main-title">Сменить пароль</h1>
    <form class="reg-form" ref="myForm">
        <label class="reg-label">
            Старый пароль
            <input v-model="old_password" type="text" placeholder="Введите cтарый пароль" class="form-control">
        </label>
        <label class="reg-label">
            Новый пароль
            <input v-model="password" type="text" placeholder="Введите новый пароль" class="form-control">
        </label>
        <label class="reg-label">
            Повторите пароль
            <input v-model="password_confirmation" type="email" placeholder="Введите новый пароль" class="form-control">
        </label>

        <input type="submit" value="СМЕНИТЬ ПАРОЛЬ" class="aside-auth__btn reg-btn" @click.prevent="changePass">
    </form>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import axios from "axios";

export default defineComponent({
    components: {},
    setup() {
        return {
            old_password: null,
            password: null,
            password_confirmation: null,
        };
    },
    methods: {
        changePass() {

            const headers = {
                'Content-Type': 'multipart/form-data',
                'X-XSRF-TOKEN': localStorage.getItem('x_xsrf_token'),
            };

            // Данные для отправки
            const data = {
                old_password: this.old_password,
                password: this.password,
                password_confirmation: this.password_confirmation
            };

            axios.post('api/change/password', data, {
                headers: headers
            })
                .then(response => {
                    console.log(response);
                    this.$refs.myForm.reset();
                })
                .catch(error => {
                    console.error(error);
                });

        }
    }
});
</script>

<style></style>
