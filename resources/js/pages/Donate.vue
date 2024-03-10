<template>
    <div>
        <h1 class="title">Донат RanCraft</h1>

        <ul class="news-list donate-list">
            <router-link :to="'/donate-inf/' + donate.id" class="donate-list__item" v-for="(donate, index) in donates"
                :key="index">
                <!-- <img class="news-list__photo" v-if="donate.photo" :src="baseUrl + donate.photo" alt="Изображение"> -->

                <div class="donate-item__img"></div>

                <div class="donate-item__text">
                    <h2 class="donate-item__title">{{ donate.name }}</h2>
                    <div class="donate-item__price">{{ donate.price }} руб</div>
                </div>
            </router-link>
        </ul>

    </div>
</template>

<script>
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

<style>
.donate-list {
    display: grid;
    grid-template-columns: repeat(3, 200px);
    justify-content: space-between;
}

.donate-list__item {
    border: 1px solid #000;
    border-radius: 15px;
    text-decoration: none;
}

.donate-item__img {
    min-height: 200px;
}

.donate-item__text {
    background-color: #18333E;
    border-radius: 15px;
    padding: 10px;
    text-align: center;
}

.donate-item__title {
    font-weight: 700;
    font-size: 20px;
    line-height: 32px;
    color: #FFFFFF;
    margin: 0;
}

.donate-item__price {
    font-weight: 600;
    font-size: 16px;
    line-height: 26px;
    color: #FFFFFF;
}

.donate-item__price--dark {
    margin-top: 10px;
    color: #000;
}
</style>
