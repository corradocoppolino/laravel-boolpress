import Vue from 'vue';
import VueRouter from 'vue-route';

Vue.use(VueRouter);

import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Contact from './pages/Contact.vue';
import Blog from './pages/Blog.vue';
import Error404 from './pages/Error404.vue';

const router = new VueRouter({
    mode: 'history',
    routes:[
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/about',
            name: 'about',
            component: About
        },
        {
            path: '/contact',
            name: 'contact',
            component: Contact
        },
        {
            path: '/blog',
            name: 'blog',
            component: Blog
        },
        {
            path: '/*',
            name: 'error404',
            component: Error404
        },

    ]
});

export default router;