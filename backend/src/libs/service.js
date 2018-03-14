import axios from 'axios';
import env from '../../build/env';

const ajaxUrl = env === 'development'
    ? 'http://wangergou.cn'
    : 'http://wangergou.cn';

service.ajax = axios.create({
    baseURL: ajaxUrl,
    timeout: 30000
});
let service = {

};

service.login = function () {

}

export default service;
