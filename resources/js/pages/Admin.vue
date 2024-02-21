<template>
    <h1 class="title">Админ панель</h1>

    <ul class="admin-list">
        <li class="admin-list__item">user</li>
        <li class="admin-list__item">post</li>
        <li class="admin-list__item">donate</li>
        <li class="admin-list__item">ban</li>
        <li class="admin-list__item"></li>
        <li class="admin-list__item"></li>
        <li class="admin-list__item"></li>
        <li class="admin-list__item"></li>
        <li class="admin-list__item"></li>
    </ul>
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
    grid-template-columns: repeat(3, 125px);
    gap: 80px;
    padding: 0;
    margin: 0;
    list-style-type: none;
    justify-content: space-between;
}

.admin-list__item {
    background-color: #ccc;
    height: 125px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 30px;
    line-height: 48px;
    color: #000000;


}
</style>
