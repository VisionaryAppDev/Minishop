require('./bootstrap');


// ----- importing template ----- //
//import Vue from 'vue';
//import myheader from './components/Header.vue';
//import adminRegisteringaccount from './components/RegisterAccount';
//Vue.component('example-component.vue', require('./components/ExampleComponent.vue'));
//let myheader = require('./components/header.vue')



// adding plugin/dependency
window.Vue = require('vue');
window.VueRouter = require('vue-router').default;
window.VueAxios = require("vue-axios").default;
window.Axios = require("axios").default;
window.VeeValidate = require('vee-validate').default;

import Vue from 'vue'
import VueRouter from 'vue-router'
import VeeValidate from 'vee-validate'
//import Ckeditor from '../../../vendor/unisharp/laravel-ckeditor/ckeditor.js';




Vue.use(VueRouter, VueAxios, Axios, VeeValidate );




// template/component
let registerAccount = require('./components/account/RegisterAccount.vue').default;
let updateAccountInfo = require('./components/account/UpdateAccountInfo.vue').default;
let updateAccountPassword = require('./components/account/UpdateAccountPassword.vue').default
let registerProduct = require('./components/product/RegisterProduct.vue').default
let addStockProduct = require('./components/product/AddStockProduct.vue').default
let registerSale = require('./components/sale/RegisterSale.vue').default
let inquiryReceipt = require('./components/sale/InquirySaleReceipt.vue').default
let dailyReport = require('./components/sale/InquiryDailyReport.vue').default
let header = require('./components/Header.vue').default




// router
const routes = [
    { path: '/users/create', component: registerAccount},
    { path: '/users/edit/info', component: updateAccountInfo},
    { path: '/users/edit/password', component: updateAccountPassword},
    { path: '/products/create', component: registerProduct},
    { path: '/products/edit/stock', component: addStockProduct},
    { path: '/sales/create', component: registerSale},
    { path: '/sales/inquiry/receipt', component: inquiryReceipt},
    { path: '/sales/inquiry/daily-report', component: dailyReport},
]

const router = new VueRouter({
    routes,
   // mode: 'history'
})




// const
const app = new Vue({
    el: '#app',
    components:{
        'register-account': registerAccount,
        'update-account-info': updateAccountInfo,
        'update-account-password': updateAccountPassword,
        'register-product': registerProduct,
        'add-stock-product': addStockProduct,  
        'header-template': header,
        'register-sale': registerSale,
        'inquiry-receipt': inquiryReceipt,
        'daily-report': dailyReport,
    },
    router,
}).$mount('#app');
