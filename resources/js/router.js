
import {createRouter, createWebHistory} from "vue-router";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [

        {
            path: '/login',
            name: 'user.login',
            component: () => import('./components/content/auth/Login.vue')
        },

        {
            path: '/registration',
            name: 'user.registration',
            component: () => import('./components/content/auth/Registration.vue')
        },

    ]
})

export default router
