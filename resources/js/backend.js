window.axios = require('axios');

window.Vue = require('vue').default;

//backend component
Vue.component('header-component', require('./components/backend/layout/HeaderComponent').default);
Vue.component('sidebar-component', require('./components/backend/layout/SidebarComponent').default);
Vue.component('footer-component', require('./components/backend/layout/FooterComponent').default);
Vue.component('dashboard-component', require('./components/backend/DashboardComponent').default);
//auth
Vue.component('login-component', require('./components/backend/auth/LoginComponent').default);
Vue.component('profile-component', require('./components/backend/auth/ProfileComponent').default);
Vue.component('change_password-component', require('./components/backend/auth/ChangePasswordComponent').default);
Vue.component('user_list-component', require('./components/backend/user/UserListComponent').default);
Vue.component('user_details-component', require('./components/backend/user/UserDetailsComponent').default);
//links
Vue.component('view_link-component', require('./components/backend/link/ViewLinkComponent').default);
//web-settings
Vue.component('web_settings-component', require('./components/backend/web_settings/WebSettingsComponent').default);
//web-settings
Vue.component('settings-component', require('./components/backend/settings/SettingsComponent').default);




//pagination
Vue.component('pagination', require('laravel-vue-pagination'));

const app = new Vue({
    el: '#backend',
});
