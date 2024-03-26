<template>
    <h1 class="title">Админ панель заявки для донатов</h1>

    <table summary="This table shows how to create responsive tables using Datatables' extended functionality"
        class="table table-bordered table-hover dt-responsive">
        <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>User ID</th>
                <th>Nick</th>
                <th>Donate</th>
                <th>Type payment</th>
                <th>Contact</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(request, index) in requests">
                <td>{{ index + 1 }}</td>
                <td>{{ request.id }}</td>
                <td>{{ request.user_id }}</td>
                <td>{{ request.nick }}</td>
                <td>{{ request.donate }}</td>
                <td>{{ request.type_payment }}</td>
                <td>{{ request.contact }}</td>
                <td>
                    <button class="admin-btn-nav" :data-id="request.id" @click="delete_request($event)">
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
            requests: [],
        };
    },
    methods: {
        delete_request(event) {

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


            axios.post(`http://127.0.0.1:8000/api/admin/donate/applications/${id}`, data, {
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
        const response = await fetch('http://127.0.0.1:8000/api/admin/donate/applications');
        const data = await response.json();
        this.requests = data;
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
