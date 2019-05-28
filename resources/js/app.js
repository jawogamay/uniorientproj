

require('./bootstrap');

window.Vue = require('vue');
import AirlaneRate from './components/AirlaneRate'
import Customer from './components/Customer'
import Passenger from './components/Passenger'
import Employee from './components/Employee'
import Booklet from './components/Booklet'
import Supplier from './components/Supplier'
import ItemCode from './components/ItemCode'
import PettyCash from './components/PettyCash'
import Dashboard from './components/Home'
import SalesAgreement from './components/SalesAgreement'
import VueRouter from 'vue-router'
import Vuetify from 'vuetify'
import swal from 'sweetalert2'
import moment from 'moment'
import { Form, HasError, AlertError } from 'vform';

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form = Form;
window.swal = swal
const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton:false,
    timer:3000
});
window.Fire =  new Vue();
window.toast = toast;
Vue.use(VueRouter)
Vue.use(Vuetify)
Vue.filter('myDate',function(created){
    return moment(created).format('MMM DD,YYYY');
});
Vue.filter('capitalize', function (value) {
  if (!value) {
    return ''
}
else{
  value = value.toString()
  return value.toUpperCase()
}
})
import 'vuetify/dist/vuetify.min.css'


let routes = [
    {path:'/airlanerate',component:AirlaneRate},
    {path:'/customer',component:Customer},
    {path:'/passenger',component:Passenger},
    {path:'/employee',component:Employee},
    {path:'/booklet',component:Booklet},
    {path:'/supplier',component:Supplier},
    {path:'/home',component:Dashboard},
    {path:'/itemcode',component:ItemCode},
    {path:'/petty',component:PettyCash},
    {path:'/salesagreement',component:SalesAgreement}

]

const router = new VueRouter({
    mode: 'history',
    routes
})

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
const app = new Vue({
    el: '#app',
    router
});
