import { createRouter, createWebHistory } from "vue-router";

import home from '../components/HomePage.vue';
import about from '../components/AboutPage.vue';
import notFound from '../components/NotFound.vue';

const routes = [
    {
        path: '/admin',
        name: 'home',
        component: home
    },
    {
        path: '/admin/about',
        name: 'about',
        component: about
    },
    {
        path: '/admin/:pathMatch(.*)*',
        name: 'notFound',
        component: notFound
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router
