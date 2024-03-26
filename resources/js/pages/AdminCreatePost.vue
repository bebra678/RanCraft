<template>
    <h1 class="main-title">Админ панель создать пост</h1>
    <div class="reg-form">
        <label class="reg-label">
            Заголовок:
            <div class="input-label">
                <input v-model="post_title" type="text" placeholder="Заголовок поста" class="form-control">
            </div>
        </label>
        <label class="reg-label">
            Текст:
            <div class="input-label">
                <input v-model="post_text" type="text" placeholder="Описание поста" class="form-control">
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
            post_title: null,
            post_text: null,
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
                title: this.post_title,
                text: this.post_text,
                photo: this.photo,
            };

            console.log(this.photo);


            axios.post('http://127.0.0.1:8000/api/posts', data, {
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
