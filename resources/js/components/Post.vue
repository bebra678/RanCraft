<template>
    <div>
        <div class="news-list__item" v-if="post">
            <h3 class="news-list__title">{{ post.title }}</h3>

            <!-- <img class="news-list__photo" v-if="post.photo" :src="post.photo" alt="Изображение"> -->
            <div class="news-list__photo"></div>


            <div class="news-list__item-wrapper">
                <div class="news-list__item-text">
                    <p class="news-list__date">{{ post.text }}</p>
                    <p class="news-list__date">
                        <img src="../../img/news/news-date.svg" alt="" width="17" height="17">
                        {{ new Date(post.created_at).toLocaleString() }}
                    </p>
                </div>
            </div>

            <router-link class="aside-auth__btn news__btn-more" to="/">НА ГЛАВНУЮ</router-link>
        </div>


        <div v-else>
            <p>Loading...</p>
        </div>
        <!-- <p>{{ post.text }}</p> -->
        <!-- остальное содержимое поста -->
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import { ref, computed, onMounted } from 'vue';
import { useRoute } from 'vue-router';
import axios from 'axios';

export default defineComponent({
    setup() {
        const post = ref(null);

        const route = useRoute();
        const postId = computed(() => route.params.id);

        onMounted(() => {
            axios.get(`http://127.0.0.1:8000/api/posts/${postId.value}`)
                .then(response => {
                    post.value = response.data.data;
                    console.log(response.data.data);
                })
                .catch(error => {
                    console.error(error);
                });
        });

        return {
            post
        };
    }
});
</script>
