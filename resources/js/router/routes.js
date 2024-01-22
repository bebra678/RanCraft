import Home from "../pages/Home.vue";
import Download from "../pages/Download.vue";
import Admin from "../pages/Admin.vue";
import Auth from "../pages/Auth.vue";
import Donate from "../pages/Donate.vue";
import Reg from "../pages/Reg.vue";
import Profile from "../pages/Profile.vue";

const routes = [
    {
        path: '/',
        component: Home
    },
    {
        path: '/admin',
        component: Admin
    },
    {
        path: '/auth',
        component: Auth
    },
    {
        path: '/donate',
        component: Donate
    },
    {
        path: '/reg',
        component: Reg
    },
    {
        path: '/profile',
        component: Profile
    },
    {
        path: '/download',
        component: Download
    },
]

export default routes;
