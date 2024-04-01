<template>
    <h1 class="title">Админ панель пользователи</h1>

    <table summary="This table shows how to create responsive tables using Datatables' extended functionality"
        class="table table-bordered table-hover dt-responsive">
        <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Nick</th>
                <th>Name</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(user, index) in users">
                <td>{{ index + 1 }}</td>
                <td>{{ user.id }}</td>
                <td>{{ user.nick }}</td>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td class="admin-btns-nav-wrapper">
                    <router-link class="admin-posts-edit" :to="'/admin/edit-user/' + user.id">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14 6L8 12V16H12L18 10M14 6L17 3L21 7L18 10M14 6L18 10M10 4L4 4L4 20L20 20V14"
                                stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </router-link>
                    <button class="admin-btn-nav" :data-id="user.id" @click="delete_user($event)">
                        <svg width="24" height="24" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                            <path fill="#000000"
                                d="M160 256H96a32 32 0 0 1 0-64h256V95.936a32 32 0 0 1 32-32h256a32 32 0 0 1 32 32V192h256a32 32 0 1 1 0 64h-64v672a32 32 0 0 1-32 32H192a32 32 0 0 1-32-32V256zm448-64v-64H416v64h192zM224 896h576V256H224v640zm192-128a32 32 0 0 1-32-32V416a32 32 0 0 1 64 0v320a32 32 0 0 1-32 32zm192 0a32 32 0 0 1-32-32V416a32 32 0 0 1 64 0v320a32 32 0 0 1-32 32z" />
                        </svg>
                    </button>
                    <router-link class="admin-posts-edit" :to="'/admin/ban-user/' + user.id">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.364 18.364C19.9926 16.7353 21 14.4853 21 12C21 7.02944 16.9706 3 12 3C9.51472 3 7.26472 4.00736 5.63604 5.63604M18.364 18.364C16.7353 19.9926 14.4853 21 12 21C7.02944 21 3 16.9706 3 12C3 9.51472 4.00736 7.26472 5.63604 5.63604M18.364 18.364L5.63604 5.63604"
                                stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </router-link>
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
            users: [],
        };
    },
    async created() {
        const response = await fetch('http://127.0.0.1:8000/api/users');
        const data = await response.json();
        this.users = data;
        console.log(data);
    },
    methods: {
        delete_user(event) {

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


            axios.post(`http://127.0.0.1:8000/api/users/${id}`, data, {
                headers: headers
            })
                .then(response => {
                    console.log(response);
                })
                .catch(error => {
                    console.error(error);
                });

        },
        ban_user(event) {

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


            axios.post(`http://127.0.0.1:8000/api/setban/${id}`, data, {
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

<style scoped>
.table {
    --bs-table-border-color: #000;
}

tbody>tr:nth-child(2n + 1) td {
    background-color: #e2e2e2;
}
</style>
