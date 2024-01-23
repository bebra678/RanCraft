<template>
    <h1>Auth</h1>
    <input v-model="email" type="email" placeholder="email" class="form-control">
    <input v-model="password" type="password" placeholder="password" class="form-control">
    <input @click.prevent="login" type="submit" value="login" class="btn btn-primary">
</template>

<script lang="ts">
import {defineComponent} from "vue";
import axios from "axios";

export default defineComponent({
    name: "Login",
    components: {},
    setup() {
        return {};
    },
    methods: {
        login() {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/login', { email: this.email, password: this.password })
                    .then(r => {
                        localStorage.setItem('x_xsrf_token', r.config.headers['X-XSRF-TOKEN'])
                        this.$router.push({name: 'home'})
                    })
                    .catch(err => {
                    })
            })
        }
    },
    data() {
        return {
            email: null,
            password: null,
        }
    },
});
</script>

<style lang="less" scoped>

</style>
