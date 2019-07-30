<template>
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
      <h3 class="card-title">CUSTOMER INFORMATION </h3>
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
      :items="customers"
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
        <td class="text-xs-left">{{ props.item.account_name | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.address | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.nature | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.user.code | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.term | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.contact |capitalize}}</td>   
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
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" v-show="!editmode" id="addNewLabel">ADD CUSTOMER</h5>
                            <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update User's Info</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>   
                        </div>
                       <form @submit.prevent="addCustomer()">
                        <div class="modal-body modal-add">
                             <input type="text" placeholder="NAME OF COMPANY" class="form-control" name="account_name"
                             :class="{'is-invalid': form.errors.has('account_name') }" v-model="form.account_name.toUpperCase()" @input="form.account_name = $event.target.value.toUpperCase()">
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

                                  <input type="text" placeholder="ADDRESS OF COMPANY" class="form-control" name="address" 
                               :class="{'is-invalid': form.errors.has('address') }" v-model="form.address">
                          
                               <!-- <input type="text" placeholder="TYPE OF ACCOUNT" class="form-control" name="service" 
                              :class="{'is-invalid': form.errors.has('nature') }" v-model="form.nature">
                              <br><has-error :form="form" field="nature"></has-error><br> -->
                                   <model-list-select :list="options1"
                                     v-model="form.nature"
                                     option-value="code"
                                     option-text="name"
                                     placeholder="TYPE OF ACCOUNT"
                                     style="margin-top:8px;"
                                     :class="{'is-invalid': form.errors.has('nature') }">
                                     </model-list-select>
                                   
                                   <div class="row">
                              <div class="col-md-6">
                                <input type="number" placeholder="TELEPHONE NUMBER" class="form-control" name="contact"
                                 :class="{'is-invalid': form.errors.has('contact') }" v-model="form.contact">
                             </div>
                             <div class="col-md-6">
                            <input type="text" placeholder="FAX/MOBILE NUMBER" class="form-control" name="fax"
                             :class="{'is-invalid': form.errors.has('fax') }"v-model="form.fax">
                             </div>
                           </div>
                           <input type="email" placeholder="EMAIL ADDRESS" class="form-control" name="email" v-model="form.email" :class="{'is-invalid': form.errors.has('email') }">
                           <br>
                            <div class="row">
                              <div class="col-md-6">
                                  <input type="text" placeholder="CREDIT TERMS" class="form-control" name="term"
                             :class="{'is-invalid': form.errors.has('term') }"v-model="form.term">
                                </div>
                                <div class="col-md-6">
                                  <input type="number" placeholder="CREDIT LIMIT" class="form-control" name="limit" style="width:100%;" 
                             :class="{'is-invalid': form.errors.has('limit') }"v-model="form.limit">
                                </div>
                           </div>
                           <br>
                            <h5>NOTES: </h5>
                            <textarea style="height:150px"  v-model="form.notes">
                                
                            </textarea>                          
                        </div>
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
                              <h5 for="account_name">COMPANY NAME: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
                              <input type="text" name="account_name"  class="form-control" :disabled="disabled == 0 ? true : false"
                              :class="{'is-invalid': form.errors.has('account_name')}" v-model="form.account_name">
                               
                            </div>
                            <div class="form-inline">
                              <h5 for="address">COMPANY ADDRESS: &nbsp;&nbsp;</h5>
                              <input type="text" name="address" v-model="form.address" class="form-control" :disabled="disabled == 0 ? true : false"
                              :class="{'is-invalid': form.errors.has('address') }">
                            </div>
                          <div class="form-inline">
                            <h5 for="nature">TYPE OF COMPANY: &nbsp;&nbsp;</h5>
                             <select v-model="form.nature" name="nature" class="form-control" :disabled="disabled == 0 ? true : false" 
                             :class="{'is-invalid': form.errors.has('address') }">
                                <option value="PERSONAL">PERSONAL</option>
                                 <option value="CORPORATE">CORPORATE</option>
                                 <option value="RESELLER">RESELLER</option>
                             </select>
                           </div>
                            <div class="form-inline">
                              <h5 for="contact">TELEPHONE NUMBER: &nbsp;</h5>
                            <input type="text" name="contact" v-model="form.contact" class="form-control" :disabled="disabled == 0 ? true : false">
                          </div>
                           <div class="form-inline">
                              <h5 for="fax">FAX/MOBILE NUMBER:&nbsp;</h5>
                            <input type="text" name="fax" v-model="form.fax" class="form-control" :disabled="disabled == 0 ? true : false">
                          </div>
                           <div class="form-inline">
                            <h5 for="email">EMAIL-ADDRESS: &nbsp;&nbsp;&nbsp;&nbsp;</h5>
                            <input type="email" name="email" v-model="form.email" class="form-control" :disabled="disabled == 0 ? true : false" 
                            :class="{'is-invalid': form.errors.has('address') }">
                          </div>
                          <div class="form-inline">
                            <h5 for="term">CREDIT TERM: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
                            <input type="text" name="term" v-model="form.term" class="form-control" :disabled="disabled == 0 ? true : false"
                            :class="{'is-invalid': form.errors.has('address') }">
                          </div>
                          <div class="form-inline">
                            <h5 for="limit">CREDIT LIMIT: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
                            <input type="number" name="limit" v-model="form.limit" class="form-control" :disabled="disabled == 0 ? true : false"
                            :class="{'is-invalid': form.errors.has('limit') }">
                          </div>
                          <h5>NOTES: </h5>
                          <textarea v-model="form.notes"  :disabled="disabled == 0 ? true : false">
                                    
                          </textarea>
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
    export default{
        data(){
            return{
                 search: '',
                 spinner:false,
                 customers:[],
                 disabled:0,
                pagination: {
                  sortBy: 'name'
                 },
                        options1: [
          { code: 'PERSONAL', name: 'PERSONAL', },
          { code: 'CORPORATE', name: 'CORPORATE' },
          { code: 'RESELLER', name: 'RESELLER' },
      
        ],
        headers: [
         
          { text: 'ACCOUNT NAME', value: 'account_name',sortable: !1 },
          { text: 'ADDRESS', value: 'address',sortable: !1 },
          { text: 'NATURE', value: 'nature',sortable: !1 },
          { text: 'TC', value: 'user.code',sortable: !1 },
          { text: 'TERM', value: 'term',sortable: !1 },
          {text: 'CONTACT DETAILS', value: 'contact',sortable: !1},
          
        ],
                editmode: false,
                form: new Form({
                    id: '',
                    account_name:'',
                    address:'',
                    contact:'',
                    nature:'',
                    term:'',
                    limit:'',
                    email:'',
                    fax:'',
                    notes:''
                })
            }
        
        },
        created(){
            this.getCustomer();
            this.createdCustomer();
        },
        methods: {
           codeAndNameAndDesc (item) {
        return `${item.account_name | capitalize } `
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
                $('#addNew').modal('show');
            },
            addCustomer(){
              this.form.post('api/customer')
              .then((response)=>{
                  this.spinner = true;
                   $('#addNew').modal('hide')
                   Fire.$emit('createdCustomer');
                     toast.fire({
                      type: 'success',
                      title: 'Customer Created Successfully'
                    });
              })
              setTimeout(()=> {this.spinner = false},1000)
            },
            viewCustomer(customer){
              this.form.id = customer.id
              this.form.account_name = customer.account_name
              this.form.address = customer.address
              this.form.contact = customer.contact
              this.form.email = customer.email
              this.form.nature = customer.nature
              this.form.limit = customer.limit
              this.form.term = customer.term
              this.form.fax = customer.fax
              this.form.notes = customer.notes
                $('#viewdetails').modal('show')

            },
            getCustomer(){
              axios.get('api/customer').then(({data}) => this.customers = data);
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
            createdCustomer(){
              this.getCustomer();
              Fire.$on('createdCustomer',()=>{
                this.getCustomer();
              });
            },
        },
          components:{
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
  margin-top:8px;
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