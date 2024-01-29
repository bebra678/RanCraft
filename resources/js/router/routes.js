import Home from "../pages/Home.vue";
import Download from "../pages/Download.vue";
import Admin from "../pages/Admin.vue";
import Auth from "../pages/Auth.vue";
import Donate from "../pages/Donate.vue";
import Reg from "../pages/Reg.vue";
import Profile from "../pages/Profile.vue";
import Personal from "../components/Personal.vue";

const routes = [
    {
        path: '/',
        component: Home,
        name: 'home'
    },
    {
        path: '/admin',
        component: Admin,
        name: 'admin'
    },
    {
        path: '/auth',
        component: Auth,
        name: 'login'
    },
    {
        path: '/donate',
        component: Donate,
        name: 'donate'
    },
    {
        path: '/reg',
        component: Reg,
        name: 'reg'
    },
    {
        path: '/profile',
        component: Profile,
        name: 'profile'
    },
    {
        path: '/download',
        component: Download,
        name: 'download'
    },
    {
        path: '/personal',
        component: Personal,
        name: 'personal'
    },
    {
        path: '/vk/auth',
        name: 'vk_auth'
    },
]

export default routes;
