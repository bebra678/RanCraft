<template>
    <h1>Register</h1>
    <div class="w-25">
        <input v-model="name" type="name" placeholder="name" class="form-control">
        <input v-model="email" type="email" placeholder="email" class="form-control">
        <input v-model="password" type="password" placeholder="password" class="form-control">
        <input v-model="password_confirmation" type="password" placeholder="password_confirmation" class="form-control">
        <input @click.prevent="register" type="submit" value="register" class="btn btn-primary">
    </div>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import axios from "axios";

export default defineComponent({
    components: {},
    setup() {
        return {};
    },
    data() {
        return {
            name: null,
            email: null,
            password: null,
            password_confirmation: null,
        }
    },
    methods: {
        register() {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/register', {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password_confirmation
                })
                    .then( res => {
                        localStorage.setItem('x_xsrf_token', res.config.headers['X-XSRF-TOKEN'])
                        this.$router.push({name: 'home'})
                    })
            })
        }
    },
});
</script>

<style lang="less" scoped>

</style>
