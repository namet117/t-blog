import axios from 'axios';
import Qs from 'qs';
import env from '../../build/env';
import router from '@/router';
import store from '@/store';
import iView,{Notice} from 'iview';

const ajaxUrl = env === 'development'
    ? 'http://blog.my.test/admin/v1'
    : 'https://www.namet.xyz/admin/v1';

let http = axios.create({
    baseURL: ajaxUrl,
    timeout: 30000,
    headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
    },
    transformRequest: [function (data) {
        data = data || {};
        data['api_token'] = localStorage.getItem('api_token');
        data = Qs.stringify(data);
        return data;
    }],

    transformResponse: [function (data) {
        try {
            data = JSON.parse(data);
        } catch (err) {}

        return data;
    }],
});

http.interceptors.request.use(
    (config) => {
        iView.LoadingBar.start();
        if (config.method === 'get') {
            config.params = config.params ? config.params : {};
            config.params['api_token'] = localStorage.getItem('api_token');
        }

        return config;
    },
    (error) => {
        iView.LoadingBar.error();
        return Promise.reject(error);
    }
);

http.interceptors.response.use(
    response => {
        iView.LoadingBar.finish();

        return response;
    },
    error => {
        iView.LoadingBar.error();

        Notice.error({
            title: '接口出错啦',
            desc: typeof error.response !== 'undefined'
                ? (error.response.status + ' : ' +  JSON.stringify(error.response))
                : '',
            duration: 0,
        });
        if (error.response) {
            switch (error.response.status) {
                case 401:
                    store.commit('logout');
                    // todo 尚未解决
                //     router.replace({
                //         path: '/login',
                //         query: {}
                //     });
                    break;
                // case 403:
                //     router.replace({
                //         path: '/403',
                //         query: {redirect: router.currentRoute.fullPath}
                //     });
                //     break;
                // case 404:
                //     router.replace({
                //         path: '/404',
                //         query: {redirect: router.currentRoute.fullPath}
                //     });
                //     break;
                //
                // case 500:
                //     router.replace({
                //         path: '/500',
                //         query: {redirect: router.currentRoute.fullPath}
                //     });
                //     break;
            }
        }
        return Promise.reject(error);
    }
);

export default http;
