<template>
    <h1 class="title">Админ панель пользователи</h1>

    <table summary="This table shows how to create responsive tables using Datatables' extended functionality" class="table table-bordered table-hover dt-responsive">
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
            <td></td>
          </tr>

        </tbody>
      </table>
</template>

<script lang="ts">
import { defineComponent } from 'vue';

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
});
</script>

<style scoped>
.table {
    --bs-table-border-color: #000;
}
tbody > tr:nth-child(2n + 1) td {
    background-color: #e2e2e2;
}
</style>
