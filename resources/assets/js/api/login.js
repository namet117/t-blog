import request from '../utils/request'

export function loginByUsername(username, password) {
    const data = {
        username,
        password
    }
    console.log(data);
    return request({
        url: '/admin/login',
        method: 'post',
        data
    });
}

export function logout() {
    return request({
        url: '/admin/logout',
        method: 'post'
    })
}

export function getUserInfo(token) {
    return request({
        url: '/admin/user/info',
        method: 'get',
        params: { token }
    })
}
