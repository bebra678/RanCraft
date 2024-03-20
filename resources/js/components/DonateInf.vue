<template>
    <div>
        <h1 class="title">Донат RanCraft</h1>


        <div v-if="donate" class="donate-inf__content">
            <div class="donate-inf__item-wrapper">
                <h2 class="donate-inf__title">{{ donate.name }}</h2>

                <div class="donate-list__item">
                    <!-- <img class="news-list__photo" v-if="donate.photo" :src="baseUrl + donate.photo" alt="Изображение"> -->

                    <div class="donate-item__img"></div>


                </div>

                <router-link to="/donate-order" class="aside-auth__btn news__btn-more donate-inf__btn">Купить</router-link>
                <div class="donate-item__price donate-item__price--dark">Цена: {{ donate.price }} руб</div>
            </div>
            <div class="donate-inf__item-wrapper">
                <h2 class="donate-inf__title">Описание:</h2>
                <p class="donate-inf__item-descr">{{ donate.description }}</p>
            </div>


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
        const donate = ref(null);

        const route = useRoute();
        const donateId = computed(() => route.params.id);

        onMounted(() => {
            axios.get(`http://127.0.0.1:8000/api/admin/donate/${donateId.value}`)
                .then(response => {
                    donate.value = response.data;
                    localStorage.setItem('currentDonate', response.data.name);
                    localStorage.setItem('currentPrice', response.data.price);
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        });


        return {
            donate
        };
    },
});
</script>

<style>
.donate-inf__title {
    font-weight: 600;
    font-size: 28px;
    line-height: 51px;
    color: #000000;
}

.donate-inf__content {
    display: flex;
    gap: 60px;
}

.donate-inf__item-descr {
    font-weight: 500;
    font-size: 25px;
    line-height: 51px;
    color: #000000;
}

.donate-inf__item-wrapper {
    min-width: 250px;
}

.donate-inf__btn {
    display: block;
    margin-top: 10px;
}
</style>
