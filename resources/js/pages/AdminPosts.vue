<template>
    <h1 class="title">Админ панель посты</h1>

    <table summary="This table shows how to create responsive tables using Datatables' extended functionality" class="table table-bordered table-hover dt-responsive">
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
            posts: [],
        };
    },
    async created() {
        const response = await fetch('http://127.0.0.1:8000/api/posts');
        const data = await response.json();
        this.posts = data.data;
        console.log(data.data);
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
