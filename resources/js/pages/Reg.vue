<template>
    <h1 class="main-title">Регистрация</h1>
    <div class="reg-form">
        <label class="reg-label">
            Логин
            <div class="input-label">
                <input v-model="nick" type="text" placeholder="Введите логин" class="form-control">
                <span>{{ nick_text }}</span>
            </div>
        </label>
        <label class="reg-label">
            Имя
            <div class="input-label">
                <input v-model="name" type="text" placeholder="Введите имя" class="form-control">
                <span>{{ name_text }}</span>
            </div>
        </label>
        <label class="reg-label">
            Почта
            <div class="input-label">
                <input v-model="email" type="email" placeholder="Введите почту" class="form-control">
                <span>{{ email_text }}</span>
            </div>
        </label>
        <label class="reg-label">
            Пароль
            <div class="input-label">
                <input v-model="password" type="password" placeholder="Введите пароль" class="form-control">
                <span>{{ password_text }}</span>
            </div>
        </label>
        <label class="reg-label">
            Пароль
            <div class="input-label">
                <input v-model="password_confirmation" type="password" placeholder="Повторите пароль"
                    class="form-control">
            </div>
        </label>

        <label class="custom-checkbox">
            <input type="checkbox">
            <div class="custom-checkbox__text">
                Я полностью ознакомлен и принимаю <a href="#">правила</a> и <a href="#">лицензионное соглашение</a>, а
                также
                даю
                свое согласие на <a href="#">обработку
                    персональных данных</a>
            </div>
        </label>

        <!--        <div id="html_element"></div>-->
        <!--        <Checkbox />-->
        <input @click.prevent="register" type="submit" value="ЗАРЕГИСТРИРОВАТЬСЯ" class="aside-auth__btn reg-btn">
    </div>
    <a href="http://localhost:8000/vk/auth">Регистрация через VK</a>
</template>

<script lang="ts">
import { defineComponent } from "vue";
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
            email_text: null,
            name_text: null,
            nick_text: null,
            password_text: null,
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
                    .then(res => {
                        console.log(res);

                        localStorage.setItem('x_xsrf_token', res.config.headers['X-XSRF-TOKEN'])
                        this.$router.push({ name: 'home' })
                        this.email_text = null;
                        this.name_text = null;
                        this.nick_text = null;
                        this.password_text = null;
                        this.$forceUpdate()
                    })
                    .catch(err => {
                        console.log(err.response.data.errors);

                        if (err.response.data.errors.nick) {
                            this.nick_text = err.response.data.errors.nick[0];
                        } else {
                            this.nick_text = null;
                        }

                        if (err.response.data.errors.name) {
                            this.name_text = err.response.data.errors.name[0];
                        } else {
                            this.name_text = null;
                        }

                        if (err.response.data.errors.email) {
                            this.email_text = err.response.data.errors.email[0];
                        } else {
                            this.email_text = null;
                        }

                        if (err.response.data.errors.password) {
                            this.password_text = err.response.data.errors.password[0];
                        } else {
                            this.password_text = null;
                        }
                    });
            })
        }
    },
});
</script>

<style>
.main-title {
    font-weight: 600;
    font-size: 30px;
    line-height: 48px;
    color: #18333E;
    margin: 0;
    margin-bottom: 20px;
}

.reg-form {
    display: flex;
    flex-direction: column;
    gap: 30px;
}

.reg-label {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    font-weight: 500;
    font-size: 22px;
    line-height: 35px;
    color: #18333E;
}

.reg-btn {
    width: 100%;
}

.reg-label .input-label {
    width: 70%;
}

.reg-label input {
    background-color: #E9F1FA;
    border-radius: 26.5px;
    font-weight: 500;
    font-size: 16px;
    color: #18333E;
    opacity: 0.7;
    padding: 15px 20px;
}

.custom-checkbox {
    display: flex;
    gap: 10px;
    font-weight: 500;
    font-size: 16px;
    line-height: 26px;
    color: #000000;
}

.custom-checkbox a {
    color: inherit;
}

.custom-checkbox input {
    width: 40px;
    height: 40px;
}
</style>
