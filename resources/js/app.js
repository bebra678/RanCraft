import { createApp } from "vue";
import App from "./App.vue";
import Router from "./router/router.js";
import Store from "./store/store.js";
//import { VueRecaptchaPlugin } from 'vue-recaptcha';
//import { VueRecaptchaPlugin } from 'vue-recaptcha/head';
//import { useHead } from "@unhead/vue";

createApp(App)
    .use(Router)
    .use(Store)
    // .use(VueRecaptchaPlugin, {
    //     v2SiteKey: '6LecwV4pAAAAAKRmEeQ6wN82B5CrOXezC1lE6-xf',
    //     v3SiteKey: 'YOUR_V3_SITEKEY_HERE',
    // })
    .mount('#app');
