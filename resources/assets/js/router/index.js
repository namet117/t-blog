import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);

const routes = [
    // {
    //     path: '/*',
    //     name: 'error-404',
    //     meta: {
    //         title: '404-页面不存在'
    //     },
    //     component: resolve => { require(['../views/error-page/404.vue'], resolve); }
    // },
    {
        path: '/login',
        name: 'admin-log',
        component: resolve => require(['../views/admin/home/login'], resolve),
        hidden: true
    },
    // {
    //     path: '/',
    //     component: resolve => require(['../components/home/home'], resolve),
    //     hidden: true
    // },
    // {
    //     path: '/',
    //     component: resolve => require(['../components/home/home'], resolve),
    //     name: '焦点图管理',
    //     iconCls: 'el-icon-picture',
    //     hidden: false,
    //     children: [
    //         {
    //             name: '登录焦点图',
    //             path: '/focus/index',
    //             component: resolve => require(['../components/focus/focus-index'], resolve)
    //          },
    //         {
    //             name: '首页焦点图',
    //             path: '/focus/login',
    //             component: resolve => require(['../components/focus/focus-login'], resolve)
    //         }
    //     ]
    // },
];

const router = new Router({ routes });

export default router;
