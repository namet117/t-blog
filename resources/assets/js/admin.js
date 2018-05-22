window.Vue = require('vue');

import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css';
import VueRouter from 'vue-router'
import router from './router'
import axios from 'axios'
import App from './components/App'

Vue.use(ElementUI)
Vue.use(VueRouter)

const app = new Vue({
    el: '#app',
    router,
    render: h => h(App)
})
// .$mount('');
