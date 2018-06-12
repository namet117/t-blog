import Vue from 'vue';
import router from './router';
import { Message } from 'element-ui';
import NProgress from 'nprogress';
import 'nprogress/nprogress.css';
import { title } from '../utils/index';
import { getToken } from '../utils/auth';
NProgress.configure({ showSpinner: false });
const whiteList = ['/login', '/authredirect'];


router.beforeEach((to, from, next) => {
    NProgress.start();
    title(to.meta.title);
    if (getToken()) {
        // 如果是已登陆状态，直接跳转到主页
        if (to.path === '/login') {
            next('/');
        }
        next();
    } else {
        // 在免登录白名单，直接进入
        if (whiteList.indexOf(to.path) !== -1) {
            next()
        } else {
            next('/login');
            NProgress.done();
        }
    }
});

router.afterEach(() => {
    NProgress.done();
});

export default router
