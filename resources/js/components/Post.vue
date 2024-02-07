<template>
    <div>
        <!-- <h1>{{ post.title }}</h1> -->
        <!-- <p>{{ post.text }}</p> -->
        <!-- остальное содержимое поста -->
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import { ref, computed, onMounted } from 'vue';
import { useRoute } from 'vue-router';

export default defineComponent({
    setup() {
        const post = ref(null);

        const route = useRoute();
        const postId = computed(() => route.params.id);


        console.log(route.params.id);

        // Получение данных поста по его id (например, с помощью API запроса)

        onMounted(() => {
            // Запрос к серверу, чтобы получить данные поста
            // Например, с использованием axios или fetch
            // После получения данных записываем их в переменную post
        });

        return {
            post
        };
    }
});
</script>
