<template>
    <h1 class="main-title">Заявка на покупку доната</h1>
    <div class="reg-form">
        <label class="reg-label">
            Ваш ник:
            <span>{{ nickname }}</span>
        </label>
        <label class="reg-label">
            Донат:
            <span>{{ currentDonate }}</span>
        </label>
        <label class="reg-label">
            Цена:
            <span>{{ currentPrice }}Р</span>
        </label>
        <label class="reg-label">
            Тип оплаты:
            <select v-model="type_payment" class="donate-order__select">
                <option selected value="Карта">Карта</option>
                <option value="Крипта">Крипта</option>
            </select>
        </label>
        <label class="reg-label">
            Ссылка на соц сеть:
            <input v-model="contact" type="text" placeholder="Как с вами связаться?" class="form-control">
        </label>


        <!--        <div id="html_element"></div>-->
        <!--        <Checkbox />-->
        <input @click.prevent="order" type="submit" value="ОТПРАВИТЬ" class="aside-auth__btn reg-btn">
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import axios from "axios";

export default defineComponent({
    components: {},
    setup() {
        return {};
    },
    data() {
        return {
            nickname: localStorage.getItem('nickname'),
            currentDonate: localStorage.getItem('currentDonate'),
            currentDonateId: localStorage.getItem('currentDonateId'),
            currentPrice: localStorage.getItem('currentPrice'),
            type_payment: 'Карта',
            contact: null,
        }
    },
    mounted() {
        //   const s = document.createElement("script");
        //   s.innerHTML = `var onloadCallback = function() {
        //   grecaptcha.render('html_element', {
        //     'sitekey' : 'your_site_key'
        //   });
        // };`;
        //   document.body.appendChild(s);
        //   const s1 = document.createElement("script");
        //   s.innerHTML = `src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        //   async defer>`;
        //   document.body.appendChild(s1);
        //   const s3 = document.createElement("script");
        //   s.innerHTML = `
        //  (function(w,d,u){
        //      console.log(123)
        //  })();
        // `;
        //   document.body.appendChild(s3);
    },
    methods: {
        order() {
            const headers = {
                'Content-Type': 'application/json',
                'X-XSRF-TOKEN': localStorage.getItem('x_xsrf_token'),
            };

            // Данные для отправки
            const data = {
                donate: this.currentDonateId,
                type_payment: this.type_payment,
                contact: this.contact,
                price: this.currentPrice,
            };

            axios.post('api/create/application', data, {
                headers: headers
            })
                .then(response => {
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        }
    },
});
</script>

<style>
.donate-order__select {
    width: 70%;
    font-weight: 500;
    font-size: 16px;
    line-height: 26px;
    color: #18333E;
    opacity: 0.5;
    background-color: #E9F1FA;
    padding: 15px 20px;
    border-radius: 26.5px;
    border: var(--bs-border-width) solid var(--bs-border-color);
}
</style>
