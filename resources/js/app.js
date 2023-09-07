//axios
window.axios = require('axios');

//vue
window.Vue = require('vue').default;



Vue.component('header-component', require('./components/frontend/layout/HeaderComponent').default);
Vue.component('footer-component', require('./components/frontend/layout/FooterComponent').default);
Vue.component('home-component', require('./components/frontend/HomeComponent').default);
Vue.component('login-component', require('./components/frontend/auth/LoginComponent').default);
Vue.component('register-component', require('./components/frontend/auth/RegisterComponent').default);


const app = new Vue({
    el: '#app',
});
