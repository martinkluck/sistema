
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('./adminlte');

require('trumbowyg/dist/trumbowyg.min');

import icons from "trumbowyg/dist/ui/icons.svg"
import "trumbowyg/dist/ui/trumbowyg.min.css"
$.trumbowyg.svgPath = "trumbowyg/dist/ui/icons.svg";

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import { sync } from 'vuex-router-sync'
import router from './router';
import store from './store';
import App from './App.vue';

sync(store, router);

if(document.getElementById('app')!==null){
    new Vue({
        router,
        store,
        render: h => h(App)
    }).$mount('#app');
}else{
    $('#product-description').trumbowyg();
}
