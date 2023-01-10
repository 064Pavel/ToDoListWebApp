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

        {
            path: '/tasks',
            name: 'tasks',
            component: () => import('./components/content/tasks/Index.vue')
        }

    ]
})


router.beforeEach((to, from, next) => {
    const token = localStorage.getItem('x_xsrf_token')

    if (!token) {
        if (to.name === 'user.login' || to.name === 'user.registration') {
            return next()
        } else {
            return next({
                name: 'user.login'
            })
        }
    }


    if (to.name === 'user.login' || to.name === 'user.registration' && token) {
        return next({
            name: 'tasks'
        })
    }

    next()

})

export default router
