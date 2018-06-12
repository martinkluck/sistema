import Vue from 'vue'
import Router from 'vue-router'
import Home from '../components/Home.vue';
import Contact from '../components/Contact.vue';

Vue.use(Router);

export default new Router({
    routes: [
        {
            path: '/',
            name: 'Home',
            component: Home
        },
        {
            path: '/contacto',
            name: 'Contact',
            component: Contact
        }
    ],
    mode: 'history'
})
