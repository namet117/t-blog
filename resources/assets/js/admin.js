window.Vue = require('vue');

import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import VueRouter from 'vue-router';
import router from './router';
import http from './tools/http';
import App from './views/admin/App';
import store from './store';
import 'font-awesome/css/font-awesome.css'

Vue.use(ElementUI);

Vue.prototype.$http = http;

new Vue({
    el: '#app',
    router,
    store,
    render: h => h(App)
});
