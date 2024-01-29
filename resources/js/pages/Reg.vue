<template>
    <h1>Register</h1>
    <div class="w-25">
        <input v-model="nick" type="text" placeholder="nick" class="form-control">
        <input v-model="name" type="text" placeholder="name" class="form-control">
        <input v-model="email" type="email" placeholder="email" class="form-control">
        <input v-model="password" type="password" placeholder="password" class="form-control">
        <input v-model="password_confirmation" type="password" placeholder="password_confirmation" class="form-control">

<!--        <div id="html_element"></div>-->
<!--        <Checkbox />-->
        <input @click.prevent="register" type="submit" value="register" class="btn btn-primary">
    </div>
    <a href="http://localhost:8000/vk/auth">Регистрация через VK</a>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import axios from "axios";
// import { useRecaptchaProvider } from 'vue-recaptcha';
// useRecaptchaProvider();

export default defineComponent({
    components: {},
    setup() {
        return {};
    },
    data() {
        return {
            nick: null,
            name: null,
            email: null,
            password: null,
            password_confirmation: null,
        }
    },
    mounted() {
      //   const s = document.createElement("script");
      //   s.innerHTML = `var onloadCallback = function() {
      //   grecaptcha.render('html_element', {
      //     'sitekey' : 'your_site_key'
      //   });
      // };`;
      //   document.body.appendChild(s);
      //   const s1 = document.createElement("script");
      //   s.innerHTML = `src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
      //   async defer>`;
      //   document.body.appendChild(s1);
      //   const s3 = document.createElement("script");
      //   s.innerHTML = `
      //  (function(w,d,u){
      //      console.log(123)
      //  })();
      // `;
      //   document.body.appendChild(s3);
    },
    methods: {
        register() {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/register', {
                    nick: this.nick,
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
