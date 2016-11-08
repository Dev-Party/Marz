
require('./bootstrap');

Vue.config.debug = true;

Vue.component('list-radio', require('./components/radio/List.vue'));
Vue.component('form-radio', require('./components/radio/Form.vue'));
Vue.component('table-radio', require('./components/dashboard/radio/Table.vue'));

const app = new Vue({   
    el: '#app',
    ready: function () {
    	this.$http.get('http://ipinfo.io/geo').then(function (response) {
			console.log(response.data);
		}, function (response) {
			console.log(response.status);
		});
    }
});
