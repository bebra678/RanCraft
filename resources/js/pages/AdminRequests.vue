<template>
    <h1 class="title">Админ панель заявки для донатов</h1>

    <table summary="This table shows how to create responsive tables using Datatables' extended functionality" class="table table-bordered table-hover dt-responsive">
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
            requests: [],
        };
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
tbody > tr:nth-child(2n + 1) td {
    background-color: #e2e2e2;
}
</style>
