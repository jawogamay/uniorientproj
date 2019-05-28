<template>
  <v-app>
 <div class="container-fluid">
  <div class="row pt-5">
    <div class="col-md-12">
      <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Customer Information </h3>
                        <div class="card-tools">
                            <button class="btn btn-warning" @click="newModal">Add<v-icon color="#fff">add_box</v-icon></button>
                         </div>
                     </div>
                     <template>
  <v-card>
    <v-card-title>
      Nutrition
      <v-spacer></v-spacer>
      <v-text-field
        v-model="search"
        append-icon="search"
        label="Search"
        single-line
        hide-details
      ></v-text-field>
    </v-card-title>
    <v-data-table
      :headers="headers"
      :items="customers"
      :search="search"
    >
      <template v-slot:items="props">
        <td>{{ props.item.id }}</td>
        <td class="text-xs-left">{{ props.item.account_name | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.address | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.nature | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.user.code | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.term | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.contact |capitalize}}</td>
        <td class="text-xs-left"><a href="#" class="btn btn-success">View</a></td>
      </template>
      <template v-slot:no-results>
        <v-alert :value="true" color="error" icon="warning" style="background-color:red;">
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
                            <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Add Customer</h5>
                            <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update User's Info</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>   
                        </div>
                       <form @submit.prevent="addCustomer()">
                        <div class="modal-body">
                             <input type="text" placeholder="Account Name" class="form-control" name="account_name"
                             :class="{'is-invalid': form.errors.has('account_name') }" v-model="form.account_name">
                             <has-error :form="form" field="account_name"></has-error><br><hr>
                            <input type="text" placeholder="Nature of Service" class="form-control" name="service" 
                            :class="{'is-invalid': form.errors.has('nature') }" v-model="form.nature">
                            <br><has-error :form="form" field="nature"></has-error><br>
                            <input type="text" placeholder="Address" class="form-control" name="address" 
                             :class="{'is-invalid': form.errors.has('address') }" v-model="form.address">
                            <br><has-error :form="form" field="address"></has-error><br>
                             <input type="text" placeholder="Contact Details" class="form-control" name="contact" 
                             :class="{'is-invalid': form.errors.has('contact') }"v-model="form.contact"><br>
                             <has-error :form="form" field="contact"></has-error><br>
                            <input type="text" placeholder="Firstname" class="form-control" name="firstname"
                             :class="{'is-invalid': form.errors.has('firstname') }" v-model="form.firstname"><br>
                             <has-error :form="form" field="firstname"></has-error><br>
                            <input type="text" placeholder="Middlename" class="form-control" name="middlename"
                             :class="{'is-invalid': form.errors.has('middlename') }"v-model="form.middlename"><br>
                             <has-error :form="form" field="middlename"></has-error><br>
                            <input type="text" placeholder="Lastname" class="form-control" name="lastname"
                              :class="{'is-invalid': form.errors.has('lastname') }"v-model="form.lastname"><br>
                              <has-error :form="form" field="lastname"></has-error><br>
                            <input type="text" placeholder="Company" class="form-control" name="company" 
                             :class="{'is-invalid': form.errors.has('company') }"v-model="form.company"><br>
                             <has-error :form="form" field="company"></has-error><br>
                            <input type="text" placeholder="TIN" class="form-control" name="tin" 
                             :class="{'is-invalid': form.errors.has('tin') }"v-model="form.tin"><br>
                             <has-error :form="form" field="tin"></has-error><br>
                            <input type="text" placeholder="SSS No." class="form-control" name="sss" 
                             :class="{'is-invalid': form.errors.has('sss') }"v-model="form.sss"><br><br>
                            <input type="text" placeholder="Sec Reg. No." class="form-control" name="secreg" 
                             :class="{'is-invalid': form.errors.has('secreg') }"v-model="form.secreg"><br><br>
                            <input type="text" placeholder="Credit Terms" class="form-control" name="term" 
                             :class="{'is-invalid': form.errors.has('term') }"v-model="form.term"><br><br>
                        </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
                        <button v-show="!editmode" type="submit" class="btn btn-primary">Submit <i v-if="spinner"class="fa fa-spinner fa-spin"></i></button>
                     </div>
                     </form>
                </div>
            </div>
            </div>
  </div>
</v-app>
</template>
<script type="text/javascript">
    export default{
        data(){
            return{
                 search: '',
                 spinner:false,
                 customers:[],
        headers: [
          {
            text: '',
            align: 'left',
            sortable: false,
            value: 'date'
          },
          { text: 'ACCOUNT NAME', value: 'account_name' },
          { text: 'ADDRESS', value: 'address' },
          { text: 'NATURE', value: 'nature' },
          { text: 'TC', value: 'user.code' },
          { text: 'TERM', value: 'term' },
          {text: 'CONTACT DETAILS', value: 'contact'},
          {text:'ACTIONS',value:'actios'}
        ],
                editmode: false,
                form: new Form({
                    id: '',
                    account_name:'',
                    address:'',
                    contact:'',
                    nature:'',
                    firstname:'',
                    middlename:'',
                    lastname:'',
                    company:'',
                    tin:'',
                    sss:'',
                    secreg:'',
                    assignsales:'',
                    term:''
                })
            }
        
        },
        created(){
            this.getCustomer();
        },
        methods: {
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

                     toast.fire({
                      type: 'success',
                      title: 'Customer Created Successfully'
                    });
              })
              setTimeout(()=> {this.spinner = false},1000)
            },
            getCustomer(){
              axios.get('api/customer').then(({data}) => this.customers = data);
            }
        }
    };
</script>