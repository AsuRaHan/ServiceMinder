export const routes = [
    {
        path: '/admin',
        name: 'dashboard',
        component: () => import('../pages/Dashboard.vue')
    },
    {
        path: '/admin/users',
        name: 'users',
        component: () => import('../pages/Users.vue')
    },
    {
        path: '/admin/pages',
        name: 'pages',
        component: () => import('../pages/Pages.vue')
    },
    {
        path: '/admin/:pathMatch(.*)*',
        name: 'notFound',
        component: () => import('../pages/NotFound.vue')
    }
]
