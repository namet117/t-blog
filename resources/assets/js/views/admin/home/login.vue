<template>
    <div class="login-container">
        <el-form class="login-form" autoComplete="on" :model="loginForm" :rules="loginRules" ref="loginForm"
                 label-position="left">
            <div class="title-container">
                <h3 class="title">T-BLOG Admin</h3>
            </div>
            <el-form-item prop="username">
                <!-- <span class="icon-container">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </span> -->
                <el-input name="username" type="text" v-model="loginForm.username" autoComplete="on" placeholder="用户名"/>
            </el-form-item>

            <el-form-item prop="password">
                <!-- <span class="svg-container"></span> -->
                <el-input name="password" :type="passwordType" @keyup.enter.native="handleLogin"
                          v-model="loginForm.password" autoComplete="on" placeholder="密码"/>
                <span class="show-pwd" @click="showPwd"><i class="el-icon-view"></i></span>
            </el-form-item>

            <el-button type="primary" style="width:100%;margin-bottom:30px;" :loading="loading"
                       @click.native.prevent="handleLogin">登陆
            </el-button>
        </el-form>
    </div>
</template>

<script>
    export default {
        name: 'home-login',
        data() {
            const validateUsername = (rule, value, callback) => {
                if (0) {
                    callback(new Error('Please enter the correct user name'))
                } else {
                    callback()
                }
            };
            const validatePassword = (rule, value, callback) => {
                if (value.length < 6) {
                    callback(new Error('The password can not be less than 6 digits'))
                } else {
                    callback()
                }
            };
            return {
                loginForm: {
                    username: 'admin',
                    password: '1111111'
                },
                loginRules: {
                    username: [{required: true, trigger: 'blur', validator: validateUsername}],
                    password: [{required: true, trigger: 'blur', validator: validatePassword}]
                },
                passwordType: 'password',
                loading: false,
                showDialog: false
            }
        },
        methods: {
            showPwd() {
                if (this.passwordType === 'password') {
                    this.passwordType = ''
                } else {
                    this.passwordType = 'password'
                }
            },
            handleLogin() {
                this.$refs.loginForm.validate(valid => {
                    if (valid) {
                        this.loading = true;
                        this.$store.dispatch('LoginByUsername', this.loginForm).then(() => {
                            this.loading = false;
                            this.$message({
                                message: '恭喜，登陆成功',
                                type: 'success'
                            });
                            this.$router.push({path: '/'})
                        }).catch(() => {
                            this.loading = false
                        });
                    } else {
                        console.log('error submit!!');
                        return false
                    }
                })
            }
        },
        created() {
            // window.addEventListener('hashchange', this.afterQRScan)
        },
        destroyed() {
            // window.removeEventListener('hashchange', this.afterQRScan)
        }
    }
</script>

<style lang="scss" scoped>
    $bg: #2d3a4b;
    $dark_gray: #889aa4;
    $light_gray: #eee;

    .login-container {
        position: fixed;
        height: 100%;
        width: 100%;
        .login-form {
            position: absolute;
            left: 0;
            right: 0;
            width: 400px;
            padding: 35px 35px 15px;
            margin: 5% auto;
        }
    }
</style>
