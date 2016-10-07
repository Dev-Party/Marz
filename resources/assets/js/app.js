
require('./bootstrap');

Vue.config.debug = true;

Vue.component('list-radio', require('./components/radio/List.vue'));
Vue.component('create-radio', require('./components/radio/Create.vue'));

const app = new Vue({
    el: 'body'
});
