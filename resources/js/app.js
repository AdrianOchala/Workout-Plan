require('./bootstrap');

window.Vue = require('vue').default;

import router from "./router";
import App from "./App.vue";
import vuetify from "./vuetify";
import axios from 'axios';
import VueAxios from 'vue-axios';
Vue.use(VueAxios, axios);
import Vuelidate from 'vuelidate';
Vue.use(Vuelidate);
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";
Vue.use(Toast);
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    router,
    vuetify,
    axios,
    el: '#app',
    render: h => h(App)
});
