import { createRouter, createWebHistory } from "vue-router";
import routes from "./routes";

const router = createRouter({
    history: createWebHistory(),
    linkActiveClass: 'active',
    routes
});

router.beforeEach(( to, from, next) => {
    const token = localStorage.getItem('x_xsrf_token')
    if(!token)
    {
        if(to.name === 'login' || to.name === 'reg' || to.name === 'vk_auth' || to.name === 'home' || to.name === 'download')
        {
            return next()
        }
        else {
            return next({
                name: 'login'
            })
        }
    }

    if(to.name === 'login' || to.name === 'reg' && token)
    {
        return next({
            name: 'home'
        })
    }

    next()
})

export default router;
