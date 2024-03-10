<template>
    <h1 class="title">Админ панель донаты</h1>

    <table summary="This table shows how to create responsive tables using Datatables' extended functionality" class="table table-bordered table-hover dt-responsive">
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
            donates: [],
        };
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
tbody > tr:nth-child(2n + 1) td {
    background-color: #e2e2e2;
}
</style>
