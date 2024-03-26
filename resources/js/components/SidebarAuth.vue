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

        <label class="input-label">
            <input v-model="nick" type="text" placeholder="Логин" class="aside-auth__input">
            <span>{{ loginTextErr || nickTextErr }}</span>
        </label>
        <label class="input-label">
            <input v-model="password" type="password" placeholder="Пароль" class="aside-auth__input">
            <span>{{ passwordTextErr }}</span>
        </label>
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
            <!-- <img src="../../img/header-profile/header-profile-avatar.png" alt="" width="69" height="69"> -->

            <div class="avatar" v-if="this.photo" :style="{ 'background-image': 'url(http://localhost:5173/public/img/' + this.photo + ')' }"></div>

            <div class="aside-auth__title-text">
                <span>Профиль</span>
                <span data-nickname>{{ this.nickname }}</span>
            </div>
        </h2>

        <ul class="header__profile">
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
                <router-link class="header__profile-link" to="/admin">
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
                    Админ панель
                </router-link>
            </li>

            <li class="header__profile-item">
                <router-link class="header__profile-link" to="/change-password">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12.648 1C13.3905 1 14.1124 1.3049 14.6299 1.83485C15.1463 2.3679 15.4315 3.09904 15.4097 3.84055C15.4118 4.00752 15.4668 4.20042 15.5663 4.36946C15.7312 4.64947 15.9915 4.84652 16.3006 4.92741C16.6096 5.00415 16.9332 4.96267 17.208 4.79985C18.5355 4.04175 20.2249 4.49599 20.983 5.81307L21.6291 6.93208C21.6457 6.96216 21.6602 6.99119 21.6726 7.02127C22.3592 8.31865 21.9008 9.95205 20.6252 10.6977C20.4396 10.8045 20.2892 10.9539 20.1855 11.1343C20.0247 11.4133 19.9801 11.7452 20.061 12.0501C20.144 12.3612 20.3421 12.6194 20.6211 12.7791C21.2506 13.1411 21.7204 13.7509 21.9081 14.455C22.0958 15.1582 21.9931 15.9215 21.627 16.551L20.9384 17.698C20.1803 19.0005 18.4909 19.4517 17.1769 18.6925C17.0017 18.5919 16.7994 18.537 16.5982 18.5318H16.592C16.2923 18.5318 15.9843 18.6593 15.7603 18.8823C15.5332 19.1094 15.4087 19.4123 15.4108 19.7338C15.4035 21.2572 14.1642 22.4893 12.648 22.4893H11.3485C9.82508 22.4893 8.58577 21.251 8.58577 19.7275C8.5837 19.5398 8.52977 19.3449 8.42917 19.1758C8.26635 18.8917 8.00293 18.6884 7.69907 18.6075C7.39728 18.5266 7.06645 18.5712 6.79474 18.7288C6.14345 19.0918 5.37705 19.18 4.67599 18.9829C3.97596 18.7848 3.37135 18.3036 3.01667 17.6658L2.36849 16.5489C1.61039 15.2339 2.06152 13.5486 3.37446 12.7895C3.74677 12.5748 3.97804 12.1745 3.97804 11.7452C3.97804 11.3158 3.74677 10.9145 3.37446 10.6998C2.06048 9.93649 1.61039 8.24709 2.36746 6.93208L3.0706 5.77781C3.81833 4.47732 5.50876 4.01893 6.82689 4.776C7.0063 4.88282 7.20127 4.93674 7.39935 4.93882C8.04545 4.93882 8.58577 4.40576 8.59614 3.75033C8.59199 3.02749 8.87719 2.33368 9.39676 1.80996C9.91841 1.28727 10.6112 1 11.3485 1H12.648ZM12.648 2.55562H11.3485C11.0271 2.55562 10.7263 2.6811 10.4992 2.90718C10.2731 3.1343 10.1497 3.43609 10.1518 3.75759C10.13 5.27379 8.89067 6.49443 7.39002 6.49443C6.90882 6.48925 6.44524 6.35961 6.04286 6.11901C5.47765 5.79752 4.73925 5.9956 4.40842 6.57118L3.70632 7.72544C3.38483 8.28339 3.58187 9.02075 4.15434 9.35366C5.00371 9.84523 5.53365 10.762 5.53365 11.7452C5.53365 12.7283 5.00371 13.644 4.15227 14.1367C3.58291 14.4664 3.38587 15.1997 3.71566 15.7701L4.37005 16.8984C4.53184 17.1898 4.79629 17.4003 5.10223 17.4864C5.40713 17.5715 5.74314 17.5352 6.02315 17.3796C6.43487 17.138 6.914 17.0125 7.39521 17.0125C7.6327 17.0125 7.87019 17.0425 8.10249 17.1048C8.80356 17.2935 9.41232 17.7623 9.77322 18.3918C10.0076 18.7869 10.1372 19.2484 10.1414 19.7192C10.1414 20.3933 10.6827 20.9337 11.3485 20.9337H12.648C13.3107 20.9337 13.852 20.3965 13.8552 19.7338C13.851 19.0016 14.1372 18.3057 14.661 17.782C15.1774 17.2655 15.8992 16.9554 16.621 16.9762C17.094 16.9876 17.5492 17.1151 17.9506 17.3433C18.5282 17.6741 19.2656 17.4771 19.5995 16.9067L20.2881 15.7586C20.4416 15.4942 20.4862 15.1623 20.4043 14.8564C20.3234 14.5504 20.1201 14.285 19.8464 14.1284C19.2054 13.7592 18.7481 13.1639 18.5583 12.4504C18.3706 11.7503 18.4733 10.986 18.8394 10.3565C19.0779 9.94168 19.4274 9.59218 19.8464 9.35158C20.4085 9.02283 20.6055 8.28754 20.2788 7.71507C20.2653 7.69226 20.2529 7.66841 20.2425 7.64352L19.6348 6.58985C19.304 6.01427 18.5676 5.81619 17.99 6.14494C17.3657 6.51414 16.6231 6.61992 15.9096 6.43221C15.1971 6.24761 14.5998 5.79648 14.2275 5.15972C13.9889 4.76148 13.8593 4.29791 13.8552 3.82604C13.8645 3.47135 13.74 3.15297 13.514 2.91963C13.2889 2.68732 12.9726 2.55562 12.648 2.55562ZM12.0028 8.23268C13.9391 8.23268 15.5144 9.80904 15.5144 11.7453C15.5144 13.6815 13.9391 15.2558 12.0028 15.2558C10.0666 15.2558 8.49129 13.6815 8.49129 11.7453C8.49129 9.80904 10.0666 8.23268 12.0028 8.23268ZM12.0028 9.78829C10.9243 9.78829 10.0469 10.6667 10.0469 11.7453C10.0469 12.8238 10.9243 13.7001 12.0028 13.7001C13.0814 13.7001 13.9588 12.8238 13.9588 11.7453C13.9588 10.6667 13.0814 9.78829 12.0028 9.78829Z"
                            fill="#18333E" />
                    </svg>


                    Сменить пароль
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
                if (this.nick && this.nick.includes('@')) {
                    // Введен email
                    axios.post('/login', { email: this.nick, password: this.password })
                    .then(r => {
                        console.log(r);

                        localStorage.setItem('x_xsrf_token', r.config.headers['X-XSRF-TOKEN'])
                        localStorage.setItem('nickname', r.data.nick)
                        localStorage.setItem('photo', r.data.photo)
                        this.$router.push({ name: 'home' })

                        this.loginTextErr = null,
                        this.nickTextErr = null,
                        this.passwordTextErr = null,

                        this.$forceUpdate()
                    })
                    .catch(err => {
                        if(err.response.data.errors.email) {
                            this.loginTextErr = err.response.data.errors.email[0];
                        } else {
                            this.loginTextErr = null;
                        }

                        if(err.response.data.errors.nick) {
                            this.nickTextErr = err.response.data.errors.nick[0];
                        } else {
                            this.nickTextErr = null;
                        }

                        if(err.response.data.errors.password) {
                            this.passwordTextErr = err.response.data.errors.password[0];
                        } else {
                            this.passwordTextErr = null;
                        }
                    });
                } else {
                    // Введен nick
                    axios.post('/login', { nick: this.nick, password: this.password })
                    .then(r => {
                        console.log(r);

                        localStorage.setItem('x_xsrf_token', r.config.headers['X-XSRF-TOKEN'])
                        localStorage.setItem('nickname', r.data.nick)
                        localStorage.setItem('photo', r.data.photo)
                        this.$router.push({ name: 'home' })

                        this.loginTextErr = null,
                        this.nickTextErr = null,
                        this.passwordTextErr = null,

                        this.$forceUpdate();
                    })
                    .catch(err => {
                        console.log(err.response.data.errors);
                        if(err.response.data.errors.email) {
                            this.loginTextErr = err.response.data.errors.email[0];
                        } else {
                            this.loginTextErr = null;
                        }

                        if(err.response.data.errors.nick) {
                            this.nickTextErr = err.response.data.errors.nick[0];
                        } else {
                            this.nickTextErr = null;
                        }

                        if(err.response.data.errors.password) {
                            this.passwordTextErr = err.response.data.errors.password[0];
                        } else {
                            this.passwordTextErr = null;
                        }
                    });
                }
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
            nickname: localStorage.getItem('nickname'),
            photo: localStorage.getItem('photo'),
            password: null,
            token: null,
            loginTextErr: null,
            nickTextErr: null,
            passwordTextErr: null,
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

.avatar {
    width: 70px;
    height: 70px;
    background-size: 650px;
    background-position: 549px 1290px;
}

.input-label {
    display: flex;
    gap: 10px;
    flex-direction: column;
}

.input-label span {
    color: red;
    font-size: 16px;
}
</style>
