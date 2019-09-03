s<template>
  <v-app>
 <div class="container-fluid">
  <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                      <!--   <ol class="breadcrumb mt-2">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SETUP FILES</a></li>
                            <li class="breadcrumb-item active">CUSTOMER ACCOUNTS</li>
                        </ol>
 -->                    </div>
                    <div class="col-md-7 col-4 align-self-center">
              
                    </div>
                </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
                      <!-- <div class="card-header">
                        <h3 class="card-title">CUSTOMER INFORMATION </h3>
                        <div class="card-tools">
                            
                         </div>
                     </div> -->
                     <template>
  <v-card>
    <v-card-title>
      <h3 class="card-title">SALES AGREEMENT SUMMARIES </h3>
      <v-spacer></v-spacer>
      <v-text-field
        v-model="search"
        append-icon="search"
        label="SEARCH"
        single-line
        hide-details
        id="search"
      ></v-text-field>
    </v-card-title>

    <v-data-table
      :headers="headers"
      :items="salesall"
      :search="search"
      :rows-per-page="25" :rows-per-page-items="[25]"
       :pagination.sync="pagination"
      class="elevation-1 my-data-table"
    >
  <template slot="headers" slot-scope="props">
  <tr style="height:30px; background:#000;">
    <th>
      <button class="btn btn-warning" @click="newModal">ADD &nbsp;<v-icon color="#fff">add_box</v-icon></button>
    </th>
     <th 
    v-for="header in props.headers"
     :key="header.text"
            :class="['column sortable', pagination.descending ? 'desc' : 'asc', header.value === pagination.sortBy ? 'active' : '']"
            @click="changeSort(header.value)"
    >

        {{header.text}}
        <v-icon small>arrow_upward</v-icon>
    </th>
  </tr>
</template>
      <template v-slot:items="props">
        <td class="text-xs-left">  
         <button  class="btn btn-success --primary" @click="viewCustomer(props.item)">VIEW <i class="fa fa-eye"></i></button> </td>
        <td class="text-xs-left">{{ props.item.salesagreement | capitalize}}</td>
        <td class="text-xs-left">{{ salesagreement.created_at | myDate}}</td>
        <td class="text-xs-left">{{ props.item.soa | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.customer.account_name | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.user.code |capitalize}}</td>  
      </template>
      <template v-slot:no-results>
        <v-alert :value="true" color="error">
          Your search for "{{ search }}" found no results.
        </v-alert>
      </template>
    </v-data-table>
  </v-card>
</template>
                </div>
             </div>
    </div>


           <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" v-show="!editmode" id="addNewLabel">ADD SALES AGREEEMENT SUMMARIES</h5>
                            <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update User's Info</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>   
                        </div>
                       <form @submit.prevent="addSalesSummaries()" id="regForm">
                        <div class="modal-body modal-add">
                            <!--  <input type="text" class="form-control" v-model="salesagreement.saNumber" name="saNumber" disabled> -->
                           <!--  <h6>SA #: {{salesagreement.saNumber}}</h6> -->
                          <!--   <input type="text" v-model="form.saNumber" class="form-control" placeholder="SA NUMBEER"><br> -->
                            <model-list-select :list="salesagreement"
                                v-model="form.saNumber"
                                option-value="saNumber"
                                :custom-text="codeAndNameAndDesc"
                               placeholder="SALES AGREEMENT NUMBER"
                              :class="{'is-invalid': form.errors.has('saNumber') }">
                          </model-list-select>

                      <!--      <select v-model="form.saNumber" class="form-control" required>
                              <option value="" disabled selected>Select something...</option>
                              <option v-for="saleagreement in salesagreement" :value="saleagreement.saNumber">{{saleagreement.saNumber}}</option>
                            </select> -->
                            <!-- <input type=""e="text" class="form-control" v-model="form.soa" name="soa" placeholder="STATEMENT OF ACCOUNT" style="margin-top:8px;"> -->
                           <!--   <div class="row">
                              <div class="col-md-6">
                              <input type="text" placeholder="NATURE OF SERVICE" class="form-control" name="service" 
                              :class="{'is-invalid': form.errors.has('nature') }" v-model="form.nature">
                              <br><has-error :form="form" field="nature"></has-error><br>
                              </div>
                              <div class="col-md-6">
                              <input type="text" placeholder="ADDRESS" class="form-control" name="address" 
                               :class="{'is-invalid': form.errors.has('address') }" v-model="form.address">
                              <br><has-error :form="form" field="address"></has-error><br>
                            </div>
                           </div> -->
                        <!--    <select v-model="customeria" @change="getPassengers()">
                            <option value='0' >Select Country</option>
                            <option v-for="data in customers" :value="data.id">{{data.account_name}}</option>
                           </select>
                           <select v-model="passengeria" >
                            <option value='0' >Select Country</option>
                            <option v-for="data in passengers"  :value='data.id'>{{data.firstname}}</option>
                           </select> -->
<!-- 
                          <model-list-select :list="customers"
                           name="account_name"
                           class="mb-2"
                           v-model="form.account_name"
                           style="margin-top:8px;"
                           option-value="id"
                           option-text="account_name"
                          placeholder="ACCOUNT NAME"
                          :class="{'is-invalid': form.errors.has('account_name') }"
                          @input="getPassengers()">
                          </model-list-select> -->
                             <div class="form-check" style="margin-top:8px;">
                              <input type="checkbox" class="form-check-input" id="exampleCheck1" v-model="form.child">
                              <label class="form-check-label" for="exampleCheck1">CHILD SOA {{form.child}}</label>
                            </div>
                                 <model-list-select :list="usedsa"
                                v-model="form.parent"
                                 option-value="saNumber"
                                :custom-text="codeAndNameAndDesc"
                               placeholder="PARENT SALES AGREEMENT NUMBER"
                               v-show="form.child==true"
                              :class="{'is-invalid': form.errors.has('saNumber') }">
                          </model-list-select>
                          <div style="margin-top:8px;">
                            <multiselect v-model="form.account_name" :options="customers" :preselect-first="true" placeholder="ENTER CUSTOMER ACCOUNT" label="account_name"
                              :close-on-select="true" :clear-on-select="true" :disabled="isDisabled"  clearOnSelect="true" track-by="test" name="test" open-direction="bottom"
                              @input="getPassengers()"></multiselect>
                              <!-- <pre class="language-json"><code>{{ form.account_name  }}</code></pre> -->
                              
                           <!-- <span slot="noResult"><button class="btn btn-primary">TEST</button></span> -->
                           
                          </div>       
                             <div>
                       
                          <multiselect v-model="form.passenger_name" :options="passengers" :multiple="true" :clear-on-select="true" :close-on-select="false" :preserve-search="true" placeholder="ENTER PASSENGER NAME" label="fullname" track-by="fullname" :preselect-first="true" name="account_name[]"  open-direction="bottom">
                          <!--   <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">{{ values.length }} options selected</span></template> -->
                          <span slot="noResult"><button class="btn btn-warning" @click="addPassenger()">ADD &nbsp;<v-icon color="#fff">add_box</v-icon></button></span>
                          </multiselect>
                            <!-- <pre class="language-json"><code>{{ form.passenger_name  }}</code></pre> -->
                          </div>     
                                
                                <table class="table table-bordered" id="dynamic_field">  
                                    <tr v-for="(sale,index) in form.sales">  
                                      <td>

                                        <!-- <select class="form-control" v-model="sale.itemcode" style="width:100px;">
                                          <option disabled selected value="">ITEM CODE</option>
                                          <option v-for="itemcode in itemcodes" :value="itemcode.itemcode">{{itemcode.itemcode | capitalize}}</option>
                                        </select> -->
                                           <model-list-select :list="itemcodes"
                                           v-model="sale.itemcode"
                                           option-value="itemcode"
                                           option-text="itemcode"
                                           placeholder="ITEMCODE"
                                           style="width:120px;"
                                           :class="{'is-invalid': form.errors.has('prefix') }">
                                           </model-list-select>
                                      </td>
                                        <td><input type="text" name="description" placeholder="Description" class="form-control name_list" 
                                          v-model="sale.description"style="width:260px;"/></td>  
                                        <td>
                                         <!--  <select class="form-control name_list" style="width:55px;" name="currency" v-model="sale.currency">
                                            <option value="USD" selected>USD</option>
                                            <option value="PHP">PHP</option>
                                          </select> -->
                                          <model-list-select :list="options1"
                                         v-model="sale.currency"
                                         style="width:75px;"
                                         option-value="code"
                                         option-text="name"
                                         placeholder="RATE"
                                         :class="{'is-invalid': form.errors.has('prefix') }">
                                         </model-list-select>

                                        </td>
                                        <td><input type="text" name="cost" placeholder="Cost" class="form-control name_list" style
                                          ="width:100px;" v-model="sale.cost"/></td>
                                        <td><input type="text" name="quantity" placeholder="QTY" class="form-control name_list" v-model="sale.quantity" /></td>
                                        <td>
                                          <button class="btn btn-danger" @click="removeInput(index)">X</button>
                                        </td>
                                    </tr>  
                              
                                </table>  
                               <button type="button" name="add" id="add" class="btn btn-warning" @click="addInput()">ADD MORE</button>
    
                              <!-- <pre class="language-json"><code>{{ form.account_name  }}</code></pre> -->
                              
                           <!-- <span slot="noResult"><button class="btn btn-primary">TEST</button></span> -->
                           
                          </div> 
                     <!--          <model-list-select :list="passengers"
                           name="passenger_name"
                           class="mb-2"
                           v-model="form.passenger_name"
                           style="margin-top:8px;"
                           option-value="fullname"
                           option-text="fullname"
                          placeholder="PASSENGER NAME"
                          :class="{'is-invalid': form.errors.has('passenger_name') }"
                          >
                          </model-list-select> -->
                               <!-- <input type="text" placeholder="TYPE OF ACCOUNT" class="form-control" name="service" 
                              :class="{'is-invalid': form.errors.has('nature') }" v-model="form.nature">
                              <br><has-error :form="form" field="nature"></has-error><br> -->
                                  
                     <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                        <button type="submit" class="btn btn-primary">SUBMIT <i v-if="spinner"class="fa fa-spinner fa-spin"></i></button>
                     </div>
                     </form>
                </div>
            </div>
            </div>
          <div class="modal fade" id="viewdetails" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <form @submit.prevent="updateCustomer()">
                        <div class="modal-body">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>  
                            <br>
                            <div class="form-inline">
                              <h5 for="soa">SOA: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;</h5>
                              <input type="text" name="soa"  class="form-control" :disabled="disabled == 0 ? true : false"
                              :class="{'is-invalid': form.errors.has('soa')}" v-model="form.soa">
                            </div>
                            <div class="form-inline">
                              <h5 for="account_name">CUSTOMER ACCOUNT: &nbsp;</h5>
                              <input type="text" name="account_name"  class="form-control" :disabled="disabled == 0 ? true : false"
                              :class="{'is-invalid': form.errors.has('account_name')}" v-model="form.account_name">
                               
                            </div>
                            <div class="form-inline">
                              <h5 for="payment">PAYMENT: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</h5>
                              <input type="text" name="payment"  class="form-control" :disabled="disabled == 0 ? true : false"
                              :class="{'is-invalid': form.errors.has('payment')}" v-model="form.payment">
                            </div>
                            <button class="btn btn-primary">VIEW ITEMS</button>
    
                        </div>
                     <div class="modal-footer">
                         <button class="btn btn-success --danger" type="button" style="background:#000;">DELETE</button>
                        <button type="submit" class="btn btn-warning"  v-show="disabled == 1" >UPDATE  <i v-if="spinner" class="fa fa-spinner fa-spin"></i></button>
                        <button @click="disabled = (disabled + 1) % 2" type="button" class="btn btn-success" v-show="disabled == 0">EDIT</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button> 
                        
                     </div>
                   </form>
              
                </div>
            </div>
          </div>
  </div>
</v-app>
</template>
<script type="text/javascript">
import { ModelListSelect } from 'vue-search-select'
 import Multiselect from 'vue-multiselect'
    export default{
        data(){
            return{
                 search: '',
                 initial:0,
                 spinner:false,
                  customers:[],
                  itemcodes:[],
                  isDisabled: false,
                 disabled:0,
                 passengers:[],
                 usedsa:[],
                 salesall:[],
                 salesagreement:[],
                pagination: {
                  sortBy: 'name'
                 },
                        options1: [
          { code: 'UNPAID', name: 'UNPAID', },
          { code: 'INSTALLMENT', name: 'INSTALLMENT' },
          { code: 'PAID', name: 'PAID' },
      
        ],
        headers: [
         
          { text: 'SA#', value: 'account_name',sortable: !1 },
          { text: 'DATE OF SA', value: 'address',sortable: !1 },
          { text: 'SOA #', value: 'nature',sortable: !1 },
          { text: 'CUSTOMER ACCOUNT', value: 'term',sortable: !1 },
          {text: 'TC', value: 'contact',sortable: !1},

          
        ],
             options1: [
          { code: 'USD', name: 'USD', },
          { code: 'PHP', name: 'PHP' }
          ],
                editmode: false,
                datenow: new Date(),
                form: new Form({
                    id: '',
                    status:'',
                    soa:'',
                    notes:'',
                    saNumber:'',
                    child:false,
                    account_name:'',
                    passenger_name:'',
                    payment:'',
                    sales:[]
              
                })
            }
        
        },
        created(){
            this.getCustomer()
            this.getSalesAll()
            this.createdSalesAgreement();
            this.getSalesAgreement();
            this.getPassengers();
            this.createdSA();
            this.getItemCode();
           axios.get('api/getUsedSA').then(({data})=> this.usedsa = data);  
           

        },
        methods: {
           codeAndNameAndDesc (item) {
        return `${item.saNumber} `
        },
        getItemCode(){
          axios.get('api/getItemCode').then(({data}) => this.itemcodes = data)
        },
        createdSA(){
          this.getSalesAgreement()
             Fire.$on('createdSA',()=>{
                this.getSalesAgreement();
              });
        },
        uppercaseInput(value){
         return console.log(this.value = this.value.toUpperCase())
        },
            changeSort (column) {
      if (this.pagination.sortBy === column) {
        this.pagination.descending = !this.pagination.descending
      } else {
        this.pagination.sortBy = column
        this.pagination.descending = false
      }
     },
            newModal(){
                this.editmode = false;
                this.form.reset();
                this.isDisabled = false;
                $('#addNew').modal('show');
            },
           
            getPassengers(){
               axios.get('api/getPassengers',{
                 params: {
                   customer_id: this.form.account_name.id 
                 }
              }).then(function(response){
                if (response.data != 0) this.isDisabled = true     
                    this.passengers = response.data; 
                  }.bind(this));
            },
            addSalesSummaries(){
              this.form.busy = true

              this.form.post('api/salesummaries')
              .then((response)=>{
                  this.spinner = true;
                   $('#addNew').modal('hide')
                   this.form.reset(); 
                   this.form.clear();
              /*     $('.ui.dropdown:not(.button)').addClass('default');
                   $('.item').remove('display','block');*/
                   this.form.sales = []
                   Fire.$emit('createdSalesAgreement');
                   Fire.$emit('createdSA');
                     toast.fire({
                      type: 'success',
                      title: 'SALES SUMMARIES CREATED SUCCESSFULLY'
                    });

              })
              setTimeout(()=> {this.spinner = false},1000)

            },
            viewCustomer(customer){
              this.form.id = customer.id
              this.form.account_name = customer.customer.account_name
              this.form.passenger_name = customer.passenger_name
              this.form.soa = customer.soa
              this.form.payment = customer.payment
                $('#viewdetails').modal('show')

            },
            getSalesAgreement(){
              axios.get('api/salesagreement').then(({data})=> this.salesagreement = data);
            },
            getCustomer(){
                axios.get('api/getSalesCustomer')
              .then(function (response) {
                 this.customers = response.data;
               
              }.bind(this));
            },
            updateCustomer(){
              this.form.put('api/customer/'+this.form.id)
                .then(()=>{
                  this.spinner = false
                  $('#viewdetails').modal('hide')
                   toast.fire(
                        'Updated!',
                        'Customer has been updated.',
                        'success'
                        )
                       Fire.$emit('createdCustomer')
                        setTimeout(()=> {this.spinner = false},1000)
                    this.disabled = 0
                })
                .catch(()=>{
                  $('#viewdetails').modal('show')
                })
            },
            getSalesAll(){
              axios.get('api/salesummaries').then(({data})=> this.salesall = data);
            },
            createdSalesAgreement(){
              this.getSalesAll();
              Fire.$on('createdSalesAgreement',()=>{
                this.getSalesAll();
              });
            },
            addInput(){
              /*++this.initial
              $('#dynamic_field').append('<tr id="row'+this.initial+'" class="dynamic-added"><td><input type="text" name="addmore['+this.initial+'][itemcode]" placeholder="Item Code" class="form-control name_list" /></td><td><input type="text" name="addmore['+this.initial+'][description]" placeholder="Description" class="form-control name_list" /></td><td><select class="form-control name_list" style="width:150px;" name="addmore['+this.initial+'][currency]"><option value="" selected disabled>CURRENCY</option><option value="USD">USD</option><option value="PHP">PHP</option></select></td> <td><input type="text" name="addmore['+this.initial+'][cost]" placeholder="Cost" class="form-control name_list" /></td> <td><input type="text" name="addmore['+this.initial+'][quantity]" placeholder="Quantity" class="form-control name_list" /></td></tr>');*/
              this.form.sales.push({
                    itemcode:'',
                    description:'',
                    currency:'',
                    cost:'',
                    quantity:'',
              })
            },
            removeInput(index){
                this.form.sales.splice(index,1)
            }
        },
          components:{
          Multiselect,
          ModelListSelect
        },
    };
</script>
<style type="text/css" scoped>
  table.v-table tbody td{
    font-weight: 300;
    font-size: 15px;
}
.v-icon{
  font-size:18px;
}
table.v-table tbody td, table.v-table tbody th{
  height: 26px;
}
.error{
    background-color: #ffffff !important;
    border-color:#ffffff !important;
    border-color:#fff !important;
    font-weight: 800;
     text-align: center;
}

.v-alert.v-alert{
  border-color:#ffffff !important;

}
.v-alert{
    color:#f00;
    border-color:#ffffff;
    padding: 5px;

}

.modal-add input,.modal-add textarea,.modal-add select{
  margin-top:0px;
}
::placeholder{
 color:rgba(191, 191, 191, 0.87);
}
.form-control{
  min-height: 20px !important;
  height: 29px !important;
}
.ui.selection.dropdown[data-v-3a0c7bea]{
  min-height: 20px;
  height: 30px;
  font-size: 15px !important;
}
.invalid-feedback{
  margin-left: 11rem;
}

</style>