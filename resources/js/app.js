require('./bootstrap');
import Vue from 'vue';
Vue.config.devtools = true;
window.Vue = require('vue');
import vuetify from "./vuetify";
import router from "./router";
import common from "./common";
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";
import store from "./store";
import Vuelidate from 'vuelidate';
Vue.use(Vuelidate);
Vue.mixin(common);
Vue.use(Toast);
import Chartkick from 'vue-chartkick'
import {Chart, registerables } from 'chart.js'
Chart.register(...registerables);

Vue.use(Chartkick.use(Chart))

Vue.component('index', require('./pages/MainComponent.vue').default);
Vue.component('welcome', require('./pages/welcome.vue').default);
const app = new Vue({
    el: '#app',
    vuetify,
    router,
    store
});
