
require('./bootstrap');

Vue.config.debug = true;

Vue.component('export-button', require('./components/Export.vue'));
Vue.component('list-radio', require('./components/radio/List.vue'));
Vue.component('create-radio', require('./components/radio/Create.vue'));
Vue.component('table-radio', require('./components/dashboard/radio/Table.vue'));

const app = new Vue({
    el: '#app'
});
