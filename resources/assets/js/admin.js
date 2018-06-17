window.Vue = require('vue');

import 'normalize.css/normalize.css'
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import router from './router';
import App from './views/admin/App';
import store from './store';
import 'font-awesome/css/font-awesome.css';
import '../sass/admin/index.scss';
// import './errorLog'
import './icon';
import './permission';
import i18n from './lang';

Vue.use(ElementUI, {
    size: 'medium',
    i18n: (key, value) => i18n.t(key, value)
});
// Vue.prototype.$http = http;
Vue.config.productionTip = false;

new Vue({
    el: '#app',
    router,
    store,
    i18n,
    render: h => h(App)
});
