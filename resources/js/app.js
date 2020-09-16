require('./bootstrap');

window.Vue = require('vue');



Vue.component('pagina-alquiler', require('./components/PaginaAlquiler.vue').default);

const app = new Vue({
    el: '#app',
});