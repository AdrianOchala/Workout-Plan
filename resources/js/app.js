require('./bootstrap');

window.Vue = require('vue').default;

import router from "./router";
import App from "./App.vue";

Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const app = new Vue({
    router,
    el: '#app',
    render: h => h(App)
});
