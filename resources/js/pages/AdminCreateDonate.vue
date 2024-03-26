<template>
    <h1 class="main-title">Админ панель создать донат</h1>
    <div class="reg-form">
        <label class="reg-label">
            Имя:
            <div class="input-label">
                <input v-model="donate_name" type="text" placeholder="Имя доната" class="form-control">
            </div>
        </label>
        <label class="reg-label">
            Цена:
            <div class="input-label">
                <input v-model="donate_price" type="text" placeholder="Цена доната" class="form-control">
            </div>
        </label>
        <label class="reg-label">
            Описание:
            <div class="input-label">
                <input v-model="donate_text" type="text" placeholder="Описание доната" class="form-control">
            </div>
        </label>
        <label class="reg-label">
            Фото:
            <div class="input-label">
                <input type="file" @change="handleFileInputChange">
            </div>
        </label>


        <!--        <div id="html_element"></div>-->
        <!--        <Checkbox />-->
        <input @click.prevent="create_post" type="submit" value="СОЗДАТЬ" class="aside-auth__btn reg-btn">
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import axios from "axios";

export default defineComponent({
    components: {},
    setup() {
        return {};
    },
    data() {
        return {
            donate_name: null,
            donate_price: null,
            donate_text: null,
            photo: null
        }
    },
    methods: {
        create_post() {

            const headers = {
                'Content-Type': 'multipart/form-data',
                'X-XSRF-TOKEN': localStorage.getItem('x_xsrf_token'),
            };

            // Данные для отправки
            const data = {
                name: this.donate_name,
                price: this.donate_price,
                description: this.donate_text,
                photo: this.photo,
            };


            axios.post('http://127.0.0.1:8000/api/admin/donate', data, {
                headers: headers
            })
                .then(response => {
                    console.log(response);
                })
                .catch(error => {
                    console.error(error);
                });

        },
        handleFileInputChange(event) {
            this.photo = event.target.files[0];

        }
    },
});
</script>

<style></style>
