require('./bootstrap');

window.Vue = require('vue');
Vue.config.productionTip = true;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('search-component', require('./components/SearchComponent.vue').default);

const app = new Vue({
    el: '#app',
});

if(document.getElementById('search_autocomplete')) {
    require('./admin/search_autocomplete');
}
