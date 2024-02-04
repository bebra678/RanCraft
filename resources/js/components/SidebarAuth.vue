<template>
    <aside class="aside-auth" v-if="!token">
        <h2 class="aside-auth__title" style="align-items:center;">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M24 24C27.3137 24 30 21.3137 30 18C30 14.6863 27.3137 12 24 12C20.6863 12 18 14.6863 18 18C18 21.3137 20.6863 24 24 24Z"
                    stroke="#1C274C" stroke-width="3" />
                <path d="M35.9382 40C35.62 34.217 33.8494 30 23.9998 30C14.1504 30 12.3798 34.217 12.0615 40"
                    stroke="#1C274C" stroke-width="3" stroke-linecap="round" />
                <path
                    d="M14 6.67564C16.9417 4.97394 20.3572 4 24 4C35.0456 4 44 12.9543 44 24C44 35.0456 35.0456 44 24 44C12.9543 44 4 35.0456 4 24C4 20.3572 4.97394 16.9417 6.67564 14"
                    stroke="#1C274C" stroke-width="3" stroke-linecap="round" />
            </svg>

            Авторизация
        </h2>

        <input v-model="nick" type="text" placeholder="Логин" class="aside-auth__input">
        <input v-model="password" type="password" placeholder="Пароль" class="aside-auth__input">
        <input @click.prevent="login" type="submit" value="ВОЙТИ" class="aside-auth__btn">

        <div class="aside-auth__links">
            <ul class="header__menu nav">
                <li class="nav-item">
                    <router-link class="aside-auth__link" to="/reg">Регистрация</router-link>
                </li>
                <li class="nav-item">
                    <router-link class="aside-auth__link" to="#">Забыли пароль?</router-link>
                </li>
            </ul>
        </div>

    </aside>
    <aside class="aside-auth" v-if="token">
        <h2 class="aside-auth__title">
            <img src="../../img/header-profile/header-profile-avatar.png" alt="" width="69" height="69">

            <div class="aside-auth__title-text">
                <span>Профиль</span>
                <span data-nickname>{{ nick }}</span>
            </div>
        </h2>

        <ul class="header__profile">
            <li class="header__profile-item">
                <router-link class="header__profile-link" to="/profile">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 12C13.6569 12 15 10.6569 15 9C15 7.34315 13.6569 6 12 6C10.3431 6 9 7.34315 9 9C9 10.6569 10.3431 12 12 12Z"
                            stroke="#18333E" stroke-width="2" />
                        <path d="M18 20C17.8401 17.1085 16.9502 15 12 15C7.04984 15 6.15997 17.1085 6 20" stroke="#18333E"
                            stroke-width="2" stroke-linecap="round" />
                        <path
                            d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7"
                            stroke="#18333E" stroke-width="2" stroke-linecap="round" />
                    </svg>
                    Личный кабинет
                </router-link>
            </li>
            <li class="header__profile-item">
                <router-link class="header__profile-link" to="/donate">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.1119 4.91115C11.3434 4.39177 11.4592 4.13208 11.6204 4.05211C11.7604 3.98263 11.9248 3.98263 12.0648 4.05211C12.226 4.13208 12.3418 4.39177 12.5733 4.91115L14.4173 9.04808C14.4858 9.20162 14.52 9.27839 14.573 9.33718C14.6198 9.3892 14.6771 9.43081 14.741 9.45929C14.8133 9.49149 14.8969 9.50031 15.0641 9.51795L19.5684 9.99336C20.1339 10.053 20.4166 10.0829 20.5425 10.2115C20.6518 10.3232 20.7026 10.4796 20.6798 10.6342C20.6536 10.8122 20.4424 11.0025 20.02 11.3832L16.6553 14.4154C16.5305 14.5279 16.468 14.5842 16.4285 14.6527C16.3935 14.7134 16.3716 14.7807 16.3643 14.8503C16.356 14.929 16.3734 15.0112 16.4083 15.1757L17.3481 19.6064C17.4661 20.1627 17.5251 20.4408 17.4417 20.6002C17.3692 20.7388 17.2362 20.8354 17.0821 20.8615C16.9047 20.8915 16.6584 20.7495 16.1658 20.4654L12.2423 18.2024C12.0967 18.1184 12.0239 18.0765 11.9465 18.06C11.878 18.0455 11.8072 18.0455 11.7387 18.06C11.6613 18.0765 11.5885 18.1184 11.4429 18.2024L7.51939 20.4654C7.02681 20.7495 6.78052 20.8915 6.60311 20.8615C6.449 20.8354 6.31596 20.7388 6.24352 20.6002C6.16013 20.4408 6.21912 20.1627 6.33711 19.6064L7.27687 15.1757C7.31175 15.0112 7.32919 14.929 7.32091 14.8503C7.31358 14.7807 7.29171 14.7134 7.25671 14.6527C7.21716 14.5842 7.15472 14.5279 7.02985 14.4154L3.66523 11.3832C3.24282 11.0025 3.03161 10.8122 3.00535 10.6342C2.98255 10.4796 3.03336 10.3232 3.1427 10.2115C3.26858 10.0829 3.55133 10.053 4.11683 9.99336L8.62112 9.51795C8.7883 9.50031 8.87188 9.49149 8.94416 9.45929C9.00811 9.43081 9.06537 9.3892 9.11223 9.33718C9.16518 9.27839 9.1994 9.20162 9.26785 9.04808L11.1119 4.91115Z"
                            stroke="#18333E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Донат
                </router-link>
            </li>
            <li class="header__profile-item">
                <a @click.prevent="logout" class="header__profile-link" href="#">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M5 4C4.73478 4 4.48043 4.10536 4.29289 4.29289C4.10536 4.48043 4 4.73478 4 5V19C4 19.2652 4.10536 19.5196 4.29289 19.7071C4.48043 19.8946 4.73478 20 5 20H9C9.55228 20 10 20.4477 10 21C10 21.5523 9.55228 22 9 22H5C4.20435 22 3.44129 21.6839 2.87868 21.1213C2.31607 20.5587 2 19.7957 2 19V5C2 4.20435 2.31607 3.44129 2.87868 2.87868C3.44129 2.31607 4.20435 2 5 2H9C9.55228 2 10 2.44772 10 3C10 3.55228 9.55228 4 9 4H5Z"
                            fill="#18333E" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M15.2929 6.29289C15.6834 5.90237 16.3166 5.90237 16.7071 6.29289L21.7071 11.2929C22.0976 11.6834 22.0976 12.3166 21.7071 12.7071L16.7071 17.7071C16.3166 18.0976 15.6834 18.0976 15.2929 17.7071C14.9024 17.3166 14.9024 16.6834 15.2929 16.2929L19.5858 12L15.2929 7.70711C14.9024 7.31658 14.9024 6.68342 15.2929 6.29289Z"
                            fill="#18333E" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8 12C8 11.4477 8.44772 11 9 11H21C21.5523 11 22 11.4477 22 12C22 12.5523 21.5523 13 21 13H9C8.44772 13 8 12.5523 8 12Z"
                            fill="#18333E" />
                    </svg>
                    Выйти
                </a>
            </li>
        </ul>

    </aside>
</template>

<script lang="ts">
import { defineComponent } from "vue";
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
                axios.post('/login', { nick: this.nick, password: this.password })
                    .then(r => {
                        localStorage.setItem('x_xsrf_token', r.config.headers['X-XSRF-TOKEN'])
                        localStorage.setItem('nickname', this.nick)
                        this.$router.push({ name: 'home' })
                        this.$forceUpdate()
                    })
                    .catch(err => {
                    })
            })
        },
        logout() {
            axios.post('/logout')
                .then(res => {
                    localStorage.removeItem('x_xsrf_token')
                    localStorage.removeItem('nickname')
                    this.$router.push({ name: 'home' })
                    this.$forceUpdate()

                })
        },
        getToken() {
            this.token = localStorage.getItem('x_xsrf_token')
        },
    },
    data() {
        return {
            //email: null,
            nick: localStorage.getItem('nickname') || null,
            password: null,
            token: null
        }
    },

    mounted() {

        this.getToken()
    },
    updated() {

        this.getToken()
    },
});
</script>

<style>
.aside-auth {
    max-width: 320px;
    width: 100%;
    display: flex;
    flex-direction: column;
    padding: 25px;
    gap: 15px;
}

.aside-auth__title {
    color: #18333E;
    font-size: 28px;
    font-weight: 500;
    line-height: normal;
    display: flex;
    gap: 10px;
    margin: 0;
}

.aside-auth__title-text {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.aside-auth__title-text [data-nickname] {
    font-size: 22px;
}

.aside-auth__links {
    width: 100%;
}

.aside-auth__links ul {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
}

.aside-auth__link {
    color: #18333E;
    font-size: 16px;
    font-weight: 500;
    line-height: normal;
}

.aside-auth__input {
    padding: 10px 15px;
    border-radius: 26.5px;
    background-color: #E9F1FA;
    color: #18333E;
    text-align: center;
    font-size: 16px;
    font-weight: 400;
    line-height: normal;
    border: 1px solid #18333E;
    width: 100%;
}

.aside-auth__btn {
    border-radius: 30.5px;
    background: #18333E;
    padding: 15px;
    color: #FFF;
    text-align: center;
    font-size: 18px;
    font-weight: 700;
    line-height: normal;
    border: none;
    width: 100%;
}

.header__profile {
    display: flex;
    flex-direction: column;
    gap: 10px;
    list-style-type: none;
    padding: 0;
    margin: 0;
}


.header__profile-link {
    border-bottom: 1px solid rgba(24, 51, 62, 0.2);
    padding: 10px 0;
    text-decoration: none;
    font-size: 18px;
    color: inherit;
    display: flex;
    align-items: center;
    gap: 10px;
    width: 100%;
}
</style>
