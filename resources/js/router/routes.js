import Home from "../pages/Home.vue";
import Download from "../pages/Download.vue";
import Admin from "../pages/Admin.vue";
import AdminUsers from "../pages/AdminUsers.vue";
import AdminPosts from "../pages/AdminPosts.vue";
import AdminDonates from "../pages/AdminDonates.vue";
import AdminRequests from "../pages/AdminRequests.vue";
import AdminCreatePost from "../pages/AdminCreatePost.vue";
import AdminEditPost from "../pages/AdminEditPost.vue";
import AdminEditDonate from "../pages/AdminEditDonate.vue";
import AdminEditUser from "../pages/AdminEditUser.vue";
import AdminCreateDonate from "../pages/AdminCreateDonate.vue";
import Donate from "../pages/Donate.vue";
import Reg from "../pages/Reg.vue";
import Profile from "../pages/Profile.vue";
import Personal from "../components/Personal.vue";
import Post from "../components/Post.vue";
import DonateInf from "../components/DonateInf.vue";
import DonateOrder from "../pages/DonateOrder.vue";
import ChangePass from "../components/ChangePass.vue";

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
        path: '/admin/users',
        component: AdminUsers,
        name: 'admin-users'
    },
    {
        path: '/admin/posts',
        component: AdminPosts,
        name: 'admin-posts'
    },
    {
        path: '/admin/donates',
        component: AdminDonates,
        name: 'admin-donates'
    },
    {
        path: '/admin/requests',
        component: AdminRequests,
        name: 'admin-requests'
    },
    {
        path: '/admin/create-post',
        component: AdminCreatePost,
        name: 'admin-create-post'
    },
    {
        path: '/admin/edit-post/:id',
        component: AdminEditPost,
        name: 'admin-edit-post',
    },
    {
        path: '/admin/edit-donate/:id',
        component: AdminEditDonate,
        name: 'admin-edit-donate',
    },
    {
        path: '/admin/edit-user/:id',
        component: AdminEditUser,
        name: 'admin-edit-user',
    },
    {
        path: '/admin/create-donate',
        component: AdminCreateDonate,
        name: 'admin-create-donate'
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
        path: '/donate-order',
        component: DonateOrder,
        name: 'donate-order'
    },
    {
        path: '/post/:id',
        name: 'post',
        component: Post,
    },
    {
        path: '/donate-inf/:id',
        name: 'donate-inf',
        component: DonateInf,
    },
    {
        path: '/change-password',
        name: 'change-password',
        component: ChangePass,
    },
    {
        path: '/vk/auth',
        name: 'vk_auth'
    },
    {
        path: '/map',
        name: 'map'
    },
]

export default routes;
