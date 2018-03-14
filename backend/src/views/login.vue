<style lang="less">
    @import './login.less';
    @import '../styles/loading.less';
</style>

<template>
    <div class="login" @keydown.enter="handleSubmit">
        <div class="login-con">
            <Card :bordered="false">
                <p slot="title">
                    <Icon type="log-in"></Icon>
                    欢迎登录
                </p>
                <div class="form-con">
                    <Form ref="loginForm" :model="form" :rules="rules">
                        <FormItem prop="userName">
                            <Input v-model="form.userName" placeholder="请输入用户名">
                                <span slot="prepend">
                                    <Icon :size="16" type="person"></Icon>
                                </span>
                            </Input>
                        </FormItem>
                        <FormItem prop="password">
                            <Input type="password" v-model="form.password" placeholder="请输入密码">
                                <span slot="prepend">
                                    <Icon :size="14" type="locked"></Icon>
                                </span>
                            </Input>
                        </FormItem>
                        <FormItem>
                            <Button @click="handleSubmit" type="primary" long>登录</Button>
                        </FormItem>
                    </Form>
                    <!-- <p class="login-tip">输入任意用户名和密码即可</p> -->
                </div>
            </Card>
            <Spin fix v-if="spin">
                <Icon type="load-c" size=18 class="spin-icon-load"></Icon>
                <div>{{ spanHtml }}</div>
            </Spin>
        </div>
    </div>
</template>

<script>
import Cookies from 'js-cookie';
import Util from '@/libs/util.js';
export default {
    data () {
        return {
            spin: false,
            spanHtml: '登录中...',
            form: {
                userName: '',
                password: ''
            },
            rules: {
                userName: [
                    { required: true, message: '账号不能为空', trigger: 'blur' }
                ],
                password: [
                    { required: true, message: '密码不能为空', trigger: 'blur' }
                ]
            }
        };
    },
    methods: {
        handleSubmit () {
            this.$refs.loginForm.validate((valid) => {
                if (valid) {
                    let _this = this;
                    // ------ Test Begin ------//
                    // Cookies.set('user', this.form.userName);
                    // Cookies.set('access', 1);
                    // _this.$store.commit('setToken', '123456789');
                    // _this.$store.commit('setAvator', 'http://file.namet.xyz/users/2/avatar.jpg');
                    // _this.$router.push({
                    //     name: 'home_index'
                    // });
                    // return ;
                    // ------ Test End ------//
                    _this.spin = true;
                    Util.ajax.post('/login', {
                        username: _this.form.userName,
                        password: _this.form.password,
                    }).then(response => {
                        _this.spin = false;
                        let user = response.data;
                        Cookies.set('user', this.form.userName);
                        Cookies.set('access', 1);
                        _this.$store.commit('setToken', user.api_token);
                        _this.$store.commit('setAvator', user.avatar);
                        _this.$router.push({
                            name: 'home_index'
                        });
                    }).catch(error => {
                        _this.spin = false;
                        let msg;
                        if (error.response.status === 500) {
                            msg = '服务器错误!';
                        } else if (error.response.status === 422) {
                            msg = error.response.data.message
                        }
                        this.$Message.error(msg);
                    });
                }
            });
        }
    },
    mounted () {
        if(Cookies.get('user')) {
            this.spin = true;
            this.spinHtml = '自动登录中...';
            let _this = this;
            setTimeout(function(){
                _this.$router.push({
                    name: 'home_index'
                })
            }, 3000);
        }
    }
};
</script>

<style>
</style>
