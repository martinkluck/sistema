
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

$.trumbowyg.svgPath = icons;

window.Vue = require('vue');

import swal from 'sweetalert2';

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
    $(document).ready(function () {
        $('#product-description').trumbowyg();
        $('.delete-form').on('submit',function (e) {
            e.preventDefault();
            const {value: formValues} = swal({
                title: '¿Está seguro?',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Eliminar',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                preConfirm: () => {
                    // console.log(e);
                    e.target.submit();
                }
            })
        });
    });
}
