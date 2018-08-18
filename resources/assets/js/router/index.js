import Vue from 'vue'
import Router from 'vue-router'
import Home from '../components/Home.vue';
import Contact from '../components/Contact.vue';
import ProductDetails from '../components/ProductDetails.vue';
import Categories from '../components/Categories';

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
        },
        {
            path: '/categorias/:id',
            name: 'Categories',
            component: Categories
        },
        {
            path: '/producto/:id',
            name: 'ProductDetails',
            component: ProductDetails
        }
    ],
    mode: 'history'
})
