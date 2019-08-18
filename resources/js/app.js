

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
/*import OR from './components/OfficialReciept'
import AR from './components/AR'
import PR from './components/PR'
import PO from './components/PO'
import CHV from './components/CHV'
import CV from './components/CV'
import SOA from './components/SOA'*/
import StartFiles from './components/StartingFiles'
import SalesAgreement from './components/SalesAgreement'
import StartBooklet from './components/StartBooklet'
import IataAmadeus from './components/IataAmadeus'
import VueRouter from 'vue-router'
import Vuetify from 'vuetify'
import swal from 'sweetalert2'
import moment from 'moment'
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';
Vue.component('v-select', vSelect)
/*import AutoComplete from './components/AutoComplete'*/
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
Vue.filter('currency',function(value){
    let val = (value/1).toFixed(2).replace('.', '.')
        return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
})
     

import 'vuetify/dist/vuetify.min.css'


let routes = [
    {path:'/airlinerate',component:AirlaneRate},
    {path:'/customer',component:Customer},
    {path:'/passenger',component:Passenger},
    {path:'/employee',component:Employee},
    {path:'/booklet',component:Booklet},
    {path:'/supplier',component:Supplier},
    {path:'/home',component:Dashboard},
    {path:'/itemcode',component:ItemCode},
    {path:'/petty',component:PettyCash},
    {path:'/salesagreement',component:SalesAgreement},
    /*{path:'/startbooklet',component:StartBooklet},
    {path:'/or',component:OR},
    {path:'/ar',component:AR},
    {path:'/pr',component:PR},
    {path:'/po',component:PO},
    {path:'/chv',component:CHV},
    {path:'/cv',component:CV},
    {path:'/soa',component:SOA}*/
    {path:'/startfiles',component:StartBooklet},
    {path:'/amadeus',component:IataAmadeus},
    


]

const router = new VueRouter({
    mode: 'history',
    routes
})

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('auto-complete',require('./components/AutoComplete.vue').default);
const app = new Vue({
    el: '#app',
    router,
 
});
