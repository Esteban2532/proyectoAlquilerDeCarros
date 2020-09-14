require('./bootstrap');

window.Vue = require('vue');



Vue.component('pagina-inicio', require('./components/PaginaInicio.vue').default);

const app = new Vue({
    el: '#app',
});