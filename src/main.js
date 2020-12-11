import "bootstrap"
import "bootstrap/dist/css/bootstrap.min.css"
import VueResource from "vue-resource";
Vue.use(VueResource);
Vue.http.options.root = '/api';

import Vue from 'vue'
import App from './App.vue'

Vue.config.productionTip = false

new Vue({
  render: h => h(App),
}).$mount('#app')