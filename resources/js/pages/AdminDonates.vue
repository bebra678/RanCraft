<template>
    <div class="title-wrapper-flex">
        <h1 class="title">Админ панель донаты</h1>

        <router-link to="/admin/create-donate" class="admin-btn">+ Донат</router-link>
    </div>

    <table summary="This table shows how to create responsive tables using Datatables' extended functionality"
        class="table table-bordered table-hover dt-responsive">
        <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(donate, index) in donates">
                <td>{{ index + 1 }}</td>
                <td>{{ donate.id }}</td>
                <td>{{ donate.name }}</td>
                <td>{{ donate.price }}Р</td>
                <td>
                    <button class="admin-btn-nav" :data-id="donate.id" @click="delete_donate($event)">
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
            donates: [],
        };
    },
    methods: {
        delete_donate(event) {

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


            axios.post(`http://127.0.0.1:8000/api/admin/donate/${id}`, data, {
                headers: headers
            })
                .then(response => {
                    console.log(response);
                })
                .catch(error => {
                    console.error(error);
                });

        },
    },
    async created() {
        const response = await fetch('http://127.0.0.1:8000/api/donate');
        const data = await response.json();
        this.donates = data;
        console.log(data);
    },
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
