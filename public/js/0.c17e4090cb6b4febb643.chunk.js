webpackJsonp([0],{

/***/ "./node_modules/babel-loader/lib/index.js?{\"cacheDirectory\":true,\"presets\":[[\"env\",{\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}}],[\"env\"]],\"plugins\":[\"transform-object-rest-spread\",[\"transform-runtime\",{\"polyfill\":false,\"helpers\":false}]]}!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./resources/assets/js/views/admin/home/login.vue":
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

exports.default = {
    name: 'admin-login',
    data: function data() {
        var validateUsername = function validateUsername(rule, value, callback) {
            if (1) {
                callback(new Error('Please enter the correct user name'));
            } else {
                callback();
            }
        };
        var validatePassword = function validatePassword(rule, value, callback) {
            if (value.length < 6) {
                callback(new Error('The password can not be less than 6 digits'));
            } else {
                callback();
            }
        };
        return {
            loginForm: {
                username: 'admin',
                password: '1111111'
            },
            loginRules: {
                username: [{ required: true, trigger: 'blur', validator: validateUsername }],
                password: [{ required: true, trigger: 'blur', validator: validatePassword }]
            },
            passwordType: 'password',
            loading: false,
            showDialog: false
        };
    },

    methods: {
        showPwd: function showPwd() {
            if (this.passwordType === 'password') {
                this.passwordType = '';
            } else {
                this.passwordType = 'password';
            }
        },
        handleLogin: function handleLogin() {
            var _this = this;

            this.$refs.loginForm.validate(function (valid) {
                if (valid) {
                    _this.loading = true;
                    // this.$store.dispatch('LoginByUsername', this.loginForm).then(() => {
                    //   this.loading = false
                    //   this.$router.push({ path: '/' })
                    // }).catch(() => {
                    //   this.loading = false
                    // })
                } else {
                    console.log('error submit!!');
                    return false;
                }
            });
        }
    },
    created: function created() {
        // window.addEventListener('hashchange', this.afterQRScan)
    },
    destroyed: function destroyed() {
        // window.removeEventListener('hashchange', this.afterQRScan)
    }
};

/***/ }),

/***/ "./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-72d9ea2c\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/sass-loader/lib/loader.js!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/assets/js/views/admin/home/login.vue":
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__("./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.login-container[data-v-72d9ea2c] {\n  position: fixed;\n  height: 100%;\n  width: 100%;\n}\n.login-container .login-form[data-v-72d9ea2c] {\n    position: absolute;\n    left: 0;\n    right: 0;\n    width: 400px;\n    padding: 35px 35px 15px;\n    margin: 5% auto;\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/vue-loader/lib/template-compiler/index.js?{\"id\":\"data-v-72d9ea2c\",\"hasScoped\":true,\"buble\":{\"transforms\":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./resources/assets/js/views/admin/home/login.vue":
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "login-container" },
    [
      _c(
        "el-form",
        {
          ref: "loginForm",
          staticClass: "login-form",
          attrs: {
            autoComplete: "on",
            model: _vm.loginForm,
            rules: _vm.loginRules,
            "label-position": "left"
          }
        },
        [
          _c("div", { staticClass: "title-container" }, [
            _c("h3", { staticClass: "title" }, [_vm._v("T-BLOG Admin")])
          ]),
          _vm._v(" "),
          _c(
            "el-form-item",
            { attrs: { prop: "username" } },
            [
              _c("el-input", {
                attrs: {
                  name: "username",
                  type: "text",
                  autoComplete: "on",
                  placeholder: "用户名"
                },
                model: {
                  value: _vm.loginForm.username,
                  callback: function($$v) {
                    _vm.$set(_vm.loginForm, "username", $$v)
                  },
                  expression: "loginForm.username"
                }
              })
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "el-form-item",
            { attrs: { prop: "password" } },
            [
              _c("el-input", {
                attrs: {
                  name: "password",
                  type: _vm.passwordType,
                  autoComplete: "on",
                  placeholder: "密码"
                },
                nativeOn: {
                  keyup: function($event) {
                    if (
                      !("button" in $event) &&
                      _vm._k($event.keyCode, "enter", 13, $event.key, "Enter")
                    ) {
                      return null
                    }
                    return _vm.handleLogin($event)
                  }
                },
                model: {
                  value: _vm.loginForm.password,
                  callback: function($$v) {
                    _vm.$set(_vm.loginForm, "password", $$v)
                  },
                  expression: "loginForm.password"
                }
              }),
              _vm._v(" "),
              _c(
                "span",
                { staticClass: "show-pwd", on: { click: _vm.showPwd } },
                [_c("i", { staticClass: "el-icon-view" })]
              )
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "el-button",
            {
              staticStyle: { width: "100%", "margin-bottom": "30px" },
              attrs: { type: "primary", loading: _vm.loading },
              nativeOn: {
                click: function($event) {
                  $event.preventDefault()
                  return _vm.handleLogin($event)
                }
              }
            },
            [_vm._v("登陆\n        ")]
          )
        ],
        1
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-72d9ea2c", module.exports)
  }
}

/***/ }),

/***/ "./node_modules/vue-style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-72d9ea2c\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/sass-loader/lib/loader.js!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/assets/js/views/admin/home/login.vue":
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__("./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-72d9ea2c\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/sass-loader/lib/loader.js!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/assets/js/views/admin/home/login.vue");
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__("./node_modules/vue-style-loader/lib/addStylesClient.js")("867248dc", content, false, {});
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../../node_modules/css-loader/index.js!../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-72d9ea2c\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./login.vue", function() {
     var newContent = require("!!../../../../../../node_modules/css-loader/index.js!../../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-72d9ea2c\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../../../node_modules/sass-loader/lib/loader.js!../../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./login.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ "./resources/assets/js/views/admin/home/login.vue":
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__("./node_modules/vue-style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-72d9ea2c\",\"scoped\":true,\"hasInlineConfig\":true}!./node_modules/sass-loader/lib/loader.js!./node_modules/vue-loader/lib/selector.js?type=styles&index=0!./resources/assets/js/views/admin/home/login.vue")
}
var normalizeComponent = __webpack_require__("./node_modules/vue-loader/lib/component-normalizer.js")
/* script */
var __vue_script__ = __webpack_require__("./node_modules/babel-loader/lib/index.js?{\"cacheDirectory\":true,\"presets\":[[\"env\",{\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}}],[\"env\"]],\"plugins\":[\"transform-object-rest-spread\",[\"transform-runtime\",{\"polyfill\":false,\"helpers\":false}]]}!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./resources/assets/js/views/admin/home/login.vue")
/* template */
var __vue_template__ = __webpack_require__("./node_modules/vue-loader/lib/template-compiler/index.js?{\"id\":\"data-v-72d9ea2c\",\"hasScoped\":true,\"buble\":{\"transforms\":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./resources/assets/js/views/admin/home/login.vue")
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = "data-v-72d9ea2c"
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/assets/js/views/admin/home/login.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-72d9ea2c", Component.options)
  } else {
    hotAPI.reload("data-v-72d9ea2c", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ })

});