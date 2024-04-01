<template>
    <h1 class="main-title">Админ панель редактировать пост</h1>
    <div class="reg-form" v-if="post">
        <label class="reg-label">
            Заголовок:
            <div class="input-label">
                <input v-model="post.title" type="text" placeholder="Заголовок поста" class="form-control">
            </div>
        </label>
        <label class="reg-label">
            Текст:
            <div class="input-label">
                <input v-model="post.text" type="text" placeholder="Описание поста" class="form-control">
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
        <input @click.prevent="edit_post" type="submit" value="СОХРАНИТЬ" class="aside-auth__btn reg-btn">
    </div>

    <div v-else>
        <p>Loading...</p>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import { ref, computed, onMounted } from 'vue';
import axios from "axios";
import { useRoute } from 'vue-router';


export default defineComponent({
    components: {},
    setup() {
        const post = ref(null);
        const route = useRoute();
        const postId = computed(() => route.params.id);

        onMounted(() => {
            axios.get(`http://127.0.0.1:8000/api/posts/${postId.value}`)
                .then(response => {
                    post.value = response.data.post;
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        });

        return {
            post,
        };
    },
    data() {
        return {
        }
    },
    methods: {
        edit_post() {

            console.log(this.post.photo);


            const headers = {
                'Content-Type': 'multipart/form-data',
                'X-XSRF-TOKEN': localStorage.getItem('x_xsrf_token'),
            };

            // Данные для отправки
            const data = {
                _method: 'PUT',
                title: this.post.title,
                text: this.post.text,
                photo: this.post.photo,
            };



            axios.post(`http://127.0.0.1:8000/api/posts/${this.post.id}`, data, {
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
