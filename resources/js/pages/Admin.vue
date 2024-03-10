<template>
    <h1 class="title">Админ панель</h1>

    <div class="admin-list">
        <router-link class="admin-list__item" to="/admin/users">users</router-link>
        <router-link class="admin-list__item" to="/admin/posts">posts</router-link>
        <router-link class="admin-list__item" to="/admin/donates">donates</router-link>
        <li class="admin-list__item">ban</li>
        <router-link class="admin-list__item" to="/admin/requests">requests</router-link>
        <li class="admin-list__item"></li>
        <li class="admin-list__item"></li>
        <li class="admin-list__item"></li>
        <li class="admin-list__item"></li>
        <li class="admin-list__item"></li>
    </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
    components: {},
    setup() {
        return {};
    }
});
</script>

<style scoped>
.admin-list {
    display: grid;
    grid-template-columns: repeat(3, 160px);
    gap: 80px;
    padding: 0;
    margin: 0;
    list-style-type: none;
    justify-content: space-between;
}

.admin-list__item {
    height: 160px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 30px;
    line-height: 48px;
    color: #000000;


    text-decoration: none;

    border: 2px solid #18333E;
}
</style>
