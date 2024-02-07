<template>
    <div>
        <h1 class="title">НОВОСТИ</h1>
        <ul class="news-list">
            <li class="news-list__item" v-for="(post, index) in visiblePosts" :key="post.id" :data-id="post.id">
<!--                 <img class="news-list__photo" v-if="post.photo" :src="post.photo" alt="Изображение">-->
                <div class="news-list__photo"></div>


                <div class="news-list__item-wrapper">
                    <div class="news-list__item-text">
                        <h3 class="news-list__title">{{ post.title }}</h3>
                        <p class="news-list__date">
                            <img src="../../img/news/news-date.svg" alt="" width="17" height="17">
                            {{ new Date(post.created_at).toLocaleString() }}
                        </p>
                    </div>
                    <router-link class="news-list__btn" to="/reg">ПОДРОБНЕЕ</router-link>
                </div>
            </li>
        </ul>
        <button class="aside-auth__btn news__btn-more" v-if="showLoadMoreButton" @click="loadMorePosts">Загрузить
            еще</button>
    </div>
</template>

<script>
import { defineComponent } from 'vue';

export default defineComponent({
    data() {
        return {
            posts: [],
            maxPostsToShow: 3, // предельное количество отображаемых постов
            visiblePostCount: 3 // количество отображаемых постов
        };
    },
    async created() {
        const response = await fetch('http://127.0.0.1:8000/api/posts');
        const data = await response.json();
        this.posts = data.data;
    },
    computed: {
        visiblePosts() {
            return this.posts.slice(0, this.visiblePostCount);
        },
        showLoadMoreButton() {
            return this.visiblePostCount < this.posts.length; // показывать кнопку, если есть еще посты для загрузки
        }
    },
    methods: {
        loadMorePosts() {
            this.visiblePostCount += 3; // увеличиваем количество отображаемых постов на 3
        }
    }
});
</script>

<style>
.title {
    font-weight: 600;
    font-size: 30px;
    line-height: 48px;
    color: #18333E;
    margin: 0;
    margin-bottom: 35px;
}

.news-list {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: 40px;
}


.news-list__item {
    display: flex;
    flex-direction: column;
    gap: 25px;
    padding-bottom: 40px;
    border-bottom: 1px solid #D4D4D4;
}

.news-list__item-text {
    display: flex;
    flex-direction: column;
    gap: 7px;
}

.news-list__item-wrapper {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.news-list__title {
    font-weight: 500;
    font-size: 22px;
    line-height: 35px;
    color: #18333E;
    margin: 0;
}

.news-list__date {
    display: flex;
    align-items: center;
    gap: 7px;
    font-weight: 500;
    font-size: 16px;
    line-height: 26px;
    color: #18333E;
    margin: 0;
}

.news-list__btn {
    border: 1px solid #B4BCC4;
    border-radius: 24px;
    font-weight: 500;
    font-size: 16px;
    line-height: 26px;
    color: #18333E;
    text-decoration: none;
    padding: 10px 15px;
    min-width: 150px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.news-list__photo {
    width: 100%;
    height: 320px;
    border: 1px solid #000;
    border-radius: 30px;
}

.news__btn-more {
    margin-top: 25px;
}
</style>
