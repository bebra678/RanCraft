<template>
    <div class="title-wrapper-flex">
        <h1 class="title">Админ панель посты</h1>

        <router-link to="/admin/create-post" class="admin-btn">+ Пост</router-link>
    </div>

    <table class="table table-bordered table-hover dt-responsive">
        <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Title</th>
                <th>Created at</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(post, index) in posts">
                <td>{{ index + 1 }}</td>
                <td>{{ post.id }}</td>
                <td>{{ post.title }}</td>
                <td>{{ post.created_at }}</td>
                <td>
                    <button class="admin-btn-nav" :data-id="post.id" @click="delete_post($event)">
                        <svg width="24" height="24" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                            <path fill="#000000"
                                d="M160 256H96a32 32 0 0 1 0-64h256V95.936a32 32 0 0 1 32-32h256a32 32 0 0 1 32 32V192h256a32 32 0 1 1 0 64h-64v672a32 32 0 0 1-32 32H192a32 32 0 0 1-32-32V256zm448-64v-64H416v64h192zM224 896h576V256H224v640zm192-128a32 32 0 0 1-32-32V416a32 32 0 0 1 64 0v320a32 32 0 0 1-32 32zm192 0a32 32 0 0 1-32-32V416a32 32 0 0 1 64 0v320a32 32 0 0 1-32 32z" />
                        </svg>
                    </button>
                </td>
            </tr>

        </tbody>
    </table>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import axios from "axios";

export default defineComponent({
    data() {
        return {
            posts: [],
        };
    },
    async created() {
        const response = await fetch('http://127.0.0.1:8000/api/posts');
        const data = await response.json();
        this.posts = data.data;
        console.log(data.data);
    },
    methods: {
        delete_post(event) {

            const button = event.currentTarget;
            const id = button.getAttribute('data-id');
            console.log(id);


            const headers = {
                'Content-Type': 'application/json',
                'X-XSRF-TOKEN': localStorage.getItem('x_xsrf_token'),
            };

            // Данные для отправки
            const data = {
                _method: 'DELETE'
            };


            axios.post(`http://127.0.0.1:8000/api/posts/${id}`, data, {
                headers: headers
            })
                .then(response => {
                    console.log(response);
                })
                .catch(error => {
                    console.error(error);
                });

        },
    }
});
</script>

<style>
.table {
    --bs-table-border-color: #000;
}

tbody>tr:nth-child(2n + 1) td {
    background-color: #e2e2e2;
}

.title-wrapper-flex {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 30px;
}

.title-wrapper-flex .title {
    margin: 0;
}

.admin-btn {
    text-decoration: none;
    padding: 10px 25px;
    background-color: #18333E;
    color: #fff;
    border-radius: 30.5px;
    font-size: 18px;
}

.admin-btn-nav {
    border: none;
    background-color: transparent;
    padding: 0;

}
</style>
