<template>
    <h1 class="main-title">Админ панель редактировать пользователя</h1>
    <div class="reg-form" v-if="user">
        <label class="reg-label">
            Ник:
            <div class="input-label">
                <input v-model="user.nick" type="text" placeholder="Ник пользователя" class="form-control">
            </div>
        </label>
        <label class="reg-label">
            Имя:
            <div class="input-label">
                <input v-model="user.name" type="text" placeholder="Имя пользователя" class="form-control">
            </div>
        </label>
        <label class="reg-label">
            Почта:
            <div class="input-label">
                <input v-model="user.email" type="text" placeholder="Почта пользователя" class="form-control">
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
        <input @click.prevent="edit_user" type="submit" value="СОХРАНИТЬ" class="aside-auth__btn reg-btn">
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
        const user = ref(null);
        const route = useRoute();
        const userId = computed(() => route.params.id);

        onMounted(() => {
            axios.get(`http://127.0.0.1:8000/api/users/${userId.value}`)
                .then(response => {
                    user.value = response.data;
                    console.log(user);
                })
                .catch(error => {
                    console.error(error);
                });
        });

        return {
            user,
        };
    },
    data() {
        return {
        }
    },
    methods: {
        edit_user() {

            console.log(this.user);


            const headers = {
                'Content-Type': 'multipart/form-data',
                'X-XSRF-TOKEN': localStorage.getItem('x_xsrf_token'),
            };

            // Данные для отправки
            const data = {
                _method: 'PUT',
                nick: this.user.nick,
                name: this.user.name,
                email: this.user.email,
            };



            axios.post(`http://127.0.0.1:8000/api/users/${this.user.id}`, data, {
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
