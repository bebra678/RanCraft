<template>
    <h1 class="title">Личный кабинет</h1>

    <div class="lc__content">
        <div class="lc__skin">
            <div class="lc__skin-model"></div>
            <button class="aside-auth__btn news__btn-more">ЗАГРУЗИТЬ СКИН</button>
        </div>
        <ul class="lc__inf-list">
            <li class="lc__inf-list-item">
                <span>Ваш ник</span>
                {{ nick }}
            </li>
            <li class="lc__inf-list-item">
                <span>Пароль от аккаунта</span>
                <router-link class="lc__inf-list-item" to="/change-password">Изменить</router-link>
            </li>
            <li class="lc__inf-list-item">
                <span>Скин</span>
                <label class="lc__inf-file">
                    Выберите файл
                    <input type="file">
                </label>
            </li>
        </ul>
    </div>

    <div class="lc__file-inf">Вы можете установить скин в любом разрешении в формате *PNG</div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import axios from "axios";
export default defineComponent({
    components: {},
    setup() {
        return {
            nick: localStorage.getItem('nickname')
        };
    },
    mounted() {
        this.getData()
    },
    methods: {
        getData() {
            axios.get('api/posts')
                .then(res => {
                    console.log(res);
                })
        }
    }
});
</script>

<style scoped>
.lc__content {
    display: flex;
    justify-content: space-between;
}

.lc__skin {
    width: 100%;
    max-width: 250px;
}

.lc__skin-model {
    width: 100%;
    min-height: 420px;
    background-color: #ccc;
}

.lc__inf-list {
    list-style-type: none;
    display: flex;
    flex-direction: column;
    gap: 13px;
    width: 100%;
    max-width: 350px;
}

.lc__inf-list-item {
    font-weight: 500;
    font-size: 16px;
    line-height: 26px;
    color: #18333E;
    display: flex;
    justify-content: space-between;
    text-decoration: none;
}

.lc__inf-file {
    cursor: pointer;

}

.lc__inf-file input {
    display: none;
}

.lc__file-inf {
    font-weight: 700;
    font-size: 14px;
    line-height: 22px;
    color: #18333E;
    margin-top: 10px;
}
</style>
