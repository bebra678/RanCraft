<template>
    <h1 class="main-title">Админ панель редактировать донат</h1>
    <div class="reg-form" v-if="donate">
        <label class="reg-label">
            Имя:
            <div class="input-label">
                <input v-model="donate.name" type="text" placeholder="Имя доната" class="form-control">
            </div>
        </label>
        <label class="reg-label">
            Описание:
            <div class="input-label">
                <input v-model="donate.description" type="text" placeholder="Описание доната" class="form-control">
            </div>
        </label>
        <label class="reg-label">
            Цена:
            <div class="input-label">
                <input v-model="donate.price" type="text" placeholder="Цена доната" class="form-control">
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
        <input @click.prevent="edit_donate" type="submit" value="СОХРАНИТЬ" class="aside-auth__btn reg-btn">
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
        const donate = ref(null);

        const route = useRoute();
        const donateId = computed(() => route.params.id);

        onMounted(() => {
            axios.get(`http://127.0.0.1:8000/api/admin/donate/${donateId.value}`)
                .then(response => {
                    donate.value = response.data;
                    console.log(response.data);

                })
                .catch(error => {
                    console.error(error);
                });
        });


        return {
            donate
        };
    },
    data() {
        return {
        }
    },
    methods: {
        edit_donate() {

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
