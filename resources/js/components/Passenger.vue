<template>
  <v-app>
    <div class="container-fluid">
        <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                       <!--  <ol class="breadcrumb mt-2">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SETUP FILES</a></li>
                            <li class="breadcrumb-item active">PASSENGER DETAILS</li>
                        </ol> -->
                    </div>
                    <div class="col-md-7 col-4 align-self-center">
              
                    </div>
                </div>
      <div class="row">
             <div class="col-md-12">
                <div class="card mt-4">
                    <!--   <div class="card-header">
                        <h3 class="card-title">PASSENGER INFORMATION </h3>
                        <div class="card-tools">
                            
                         </div>
                     </div> -->
                     <template>
  <v-card>
    <v-card-title>
      <h3><b>PASSENGER INFORMATION</b> </h3>
      <v-spacer></v-spacer>

      <v-text-field
        v-model="search"
        append-icon="search"
        label="SEARCH"
        single-line
        hide-details
      ></v-text-field>
    <!--   <div class="text-xs-center pt-2">
      <v-pagination v-model="pagination.page" :length="pages"></v-pagination>
    </div> -->
    </v-card-title>
   <!--  <button class="btn btn-warning" style="margin-left:16px;margin-top:10px;" @click="newModal">ADD<v-icon color="#fff">add_box</v-icon></button> -->
    <v-data-table
      :headers="headers"
      :items="passengers"
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
       <td class="text-xs-left"><button class="btn btn-success --primary" @click="viewPassenger(props.item)">VIEW <i class="fa fa-eye"></i></button>
     </td>
        <td class="text-xs-left" v-if="props.item.prefix != null">{{props.item.lastname | capitalize}}, {{props.item.firstname | capitalize}} {{ props.item.middlename | capitalize}} {{props.item.prefix | capitalize}}.</td>
        <td class="text-xs-left" v-else-if="props.item.prefix === null">{{props.item.lastname | capitalize}}, {{props.item.firstname | capitalize}} {{ props.item.middlename | capitalize}} </td>
        <td class="text-xs-left">{{ props.item.tel | capitalize}}</td>
       <!--  <td class="text-xs-left" v-if="props.item.notes.length<20 && props.item.notes === null">{{ props.item.notes | capitalize}}</td> -->
         <td class="text-xs-left" v-if="props.item.notes === null"></td>
         <td class="text-xs-left" v-else-if="props.item.notes.length<20">{{ props.item.notes | capitalize}}</td>
        <td class="text-xs-left" v-else-if="props.item.notes.length>20">{{ props.item.notes.substring(0,20)+"..." | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.created_at | myDate | capitalize}}</td>


        
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
                            <h5 class="modal-title" v-show="!editmode" id="addNewLabel">ADD PASSENGER</h5>
                            <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update User's Info</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>   
                        </div>
                       <form @submit.prevent="createPassenger()">
                        <div class="modal-body">
                          <!-- <select class="form-control" name="account_name" v-model="form.account_name">
                            <option value="" disabled selected>ACCOUNT NAME</option>
                            <option v-for="customer in customers" :value="customer.id">{{customer.account_name | capitalize }}</option>
                          </select>
                          <br><br> -->
                          <!-- <input type="text" name="account_name" v-model="form.account_name" v-on:keyup="autoComplete()" class="form-control">
                          <div class="panel-footer" v-if="results.length">
                            <ul class="list-group">
                              <li class="list-group-item" v-for="result in results">{{result.name}}</li>
                            </ul>
                          </div>
                          <br><br> -->
            
      <!-- <v-autocomplete
        v-model="form.account_name"
        :items="accounts"
        :readonly="isEditing"
        :label="`Account Name — ${isEditing ? 'Editable' : ''}`"
        persistent-hint
        prepend-icon="mdi-city"
      >
        <template v-slot:append-outer>
          <v-slide-x-reverse-transition
            mode="out-in"
          >
            <v-icon
              :key="`icon-${isEditing}`"
              :color="isEditing ? 'success' : 'info'"
              @click="isEditing = !isEditing"
              v-text="isEditing ? 'mdi-check-outline' : 'mdi-circle-edit-outline'"
            ></v-icon>
          </v-slide-x-reverse-transition>
        </template>
      </v-autocomplete> -->


                           <!--  <input type="text" placeholder="Name" class="form-control"><br>
                              <p style="font-size:12px; color:#c2c2c2;"> (PASSENGER NAME IS COMPOSED OF LAST NAME, FIRST NAME , AND MIDDLE NAME)</p>
                            <br> -->
                            <model-list-select :list="customers"
                            name="account_name"
                            class="mb-2"
                     v-model="form.account_name"
                     option-value="id"
                     option-text="account_name"
                     placeholder="ACCOUNT NAME">
                  </model-list-select>

                            <div class="row mb-2">
                              <div class="col-md-6">
                                
          
                                <model-list-select :list="options1"
                         v-model="form.prefix"
                         option-value="code"
                         option-text="name"
                         placeholder="SELECT PREFIX">
                         </model-list-select>

                            </div>
                 <!--            <input type="text" class="form-control" placeholder="Middle Name" name="middename" 
                            v-model="form.middename"><br><br> -->
                            <div class="col-md-6">
                                 
                                <input type="text" class="form-control" placeholder="FIRST NAME" name="firstname" 
                                v-model="form.firstname"><br>
                            </div>
                           </div>
                           <div class="row">
                            <div class="col-md-6">
                             <input type="text" class="form-control" placeholder="MIDDLE NAME" name="middename" 
                            v-model="form.middename"><br><br>
                      
                            </div>
                            <div class="col-md-6">
                               
                                <input type="text" class="form-control" placeholder="LAST NAME" name="lastname" 
                                v-model="form.lastname">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6 mt-2">
                         
                            <!-- <input type="date" class="form-control" placeholder="Date of Birth" name="dob" v-model="form.dob"  :class="{'is-invalid': form.errors.has('dob') }" id="mdate"><br>
                            <has-error :form="form" field="dob"></has-error><br> -->
                            
                              <v-dialog
                                ref="dialog"
                                v-model="modal"
                                :return-value.sync="form.dob"
                                persistent
                                lazy
                                full-width
                                width="290px"
                              >
                                <template v-slot:activator="{ on }">
                              
                                  <v-text-field
                                    v-model="form.dob"
                                    label="DATE OF BIRTH"
                                    readonly
                                    v-on="on"
                                    class="form-control"
                                  ></v-text-field>
                                </template>
                                <v-date-picker v-model="date" scrollable width="100%">
                                  <v-spacer></v-spacer>
                                  <v-btn flat color="primary" @click="modal = false">Cancel</v-btn>
                                  <v-btn flat color="primary" @click="$refs.dialog.save(date)">OK</v-btn>
                                </v-date-picker>
                              </v-dialog>
                      </div>
                         
                          <div class="col-md-6" style="margin-top:-12px;">
                            <input type="text" class="form-control" placeholder="TEL" name="tel" v-model="form.tel">
                          </div>
                          </div>

                            <label class="mt-2"> NOTES: </label>   
                            <textarea name="notes" v-model="form.notes">
                                
                            </textarea>
                        </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                        <button v-show="editmode" type="submit" class="btn btn-success">UPDATE</button>
                        <button v-show="!editmode" type="submit" class="btn btn-primary">SUBMIT <i v-if="spinner" class="fa fa-spinner fa-spin"></i></button>
                     </div>
                     </form>
                </div>
            </div>
            </div>
               <div class="modal fade" id="viewdetails" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <form @submit.prevent="updatePassenger()">
                        <div class="modal-body">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>   
                            <br><br>
                              <div class="form-inline">
                              <h5 for="account_name">ACCOUNT NAME: &nbsp;&nbsp;</h5>
                              <input class="form-control" style="width:60%;" type="text" id="account_name"  name="account_name"  v-model="form.account_name" disabled>
                            </div>

                            <br>
                            <div class="form-inline">
                              <h5 for="firstname">FIRST NAME: &nbsp;&nbsp;&nbsp;&nbsp;</h5>
                              <input class="form-control" style="width:60%;" type="text" id="firstname"  name="firstname"  v-model="form.firstname" :disabled="disabled == 0 ? true : false">
                            </div>
                            <br>
                           <div class="form-inline">
                              <h5 for="lastname">LAST NAME: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
                              <input class="form-control" style="width:60%;" type="text" id="lastname"  name="lastname"  v-model="form.lastname" :disabled="disabled == 0 ? true : false">
                            </div>
                               <br>
                           <div class="form-inline">
                              <h5 for="tel">CONTACT #: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
                              <input class="form-control" style="width:60%;" type="text" id="tel"  name="tel"  v-model="form.tel" :disabled="disabled == 0 ? true : false">
                            </div>
                                 <br>
                           <div class="form-inline">
                              <h5 for="dob">DATE OF BIRTH: &nbsp;</h5>
                              <input class="form-control" style="width:60%;" type="date" id="dob"  name="dob"  v-model="form.dob" :disabled="disabled == 0 ? true : false">
                            </div>
                            <br>
                            <h5>NOTES: </h5>
                            <textarea v-model="form.notes"  :disabled="disabled == 0 ? true : false">
                                
                            </textarea>
                           
                        </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning" data-dismiss="modal" v-show="disabled == 1" @click="updatePassenger()">UPDATE  <i v-if="spinner" class="fa fa-spinner fa-spin"></i></button>
                        <button @click="disabled = (disabled + 1) % 2" type="button" class="btn btn-success" v-show="disabled == 0">EDIT</button>
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
                spinner:false,
                disabled:0,
                 date: new Date().toISOString().substr(0, 10),
      modal: false,
       pagination: {
      sortBy: 'name'
    },
    editmode:false,

    
                 search: '',
              /*   pagination: {},*/
                 results:[],
                 passengers:[],
               options1: [
          { code: 'MR', name: 'MR', },
          { code: 'MS', name: 'MS' },
          { code: 'MSTR', name: 'MSTR' },
          {code:'MISS',name:'MISS'},
          {code:'INF',name:'INF'},
        ],
                 customers:[],
                 isEditing:false,
                  form: new Form({
                    id: '',
                    account_name:'',
                    lastname:'',
                    firstname:'',
                    tel:'',
                    dob:'',
                    prefix:'',
                    notes:'',

                }),
        headers: [
          
         /* {text:' <button class="btn btn-warning" style="margin-left:16px;margin-top:10px;" @click="newModal">ADD<v-icon color="#fff">add_box</v-icon></button>',value:'',sortable:false},*/
          { text: 'PASSENGER NAME', value: 'lastname',sortable: !1},
          { text: 'DATE OF BIRTH', value: 'date_birth',sortable: !1  },
          { text: 'CONTACT NUMBER', value: 'tel',sortable: !1 },
          { text: 'NOTES', value: 'notes',sortable: !1  },  
          
        ],
        
            }
        
        },
         mounted(){
          axios.get('api/getCustomer').then(({data}) => this.customers = data);
          axios.get('api/getAccountName').then(({data})=> this.accounts = data);
          this.getPassenger();
          this.createdPassenger();
         },

        methods: {
          codeAndNameAndDesc (item) {
        return `${item.account_name | capitalize } `
        },
            changeSort (column) {
      if (this.pagination.sortBy === column) {
        this.pagination.descending = !this.pagination.descending
      } else {
        this.pagination.sortBy = column
        this.pagination.descending = false
      }
    },
    updatePassenger(){
      this.form.put('api/passenger/'+this.form.id)
              .then(()=>{
                 this.spinner = true;
                  $('#viewdetails').modal('hide')
                     toast.fire(
                        'Updated!',
                        'Transaction has been updated.',
                        'success'
                        )
                       Fire.$emit('createdPassenger')
                        setTimeout(()=> {this.spinner = false},1000)
                    this.disabled = 0

              }).catch((err)=>{
                console.log(err);
              })
           
    },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
            autoComplete(){
              this.results = [];
              if(this.form.account_name.length>2){
                axios.get('api/search',{params:{query:this.form.account_name
                }
                }).then(response => {
                  this.results = response.data;
                });
              }
            },
           
            createPassenger(){
                this.form.post('api/passenger')
                .then((response) => {
                    this.spinner = true;
                    $('#addNew').modal('hide');
                    Fire.$emit('createdPassenger');
                    toast.fire({
                      type: 'success',
                      title: 'Passenger Created Successfully'
                    });
                    setTimeout(()=> {this.spinner = false},1000)
                })
            },
            getPassenger(){
              axios.get('api/passenger').then(({data})=> this.passengers = data);
            },
            createdPassenger(){
              this.getPassenger()
              Fire.$on('createdPassenger',()=>{
                this.getPassenger();
              })
            },
            viewPassenger(item){
              this.form.id = item.id
              this.form.account_name = item.customer.account_name
              this.form.prefix = item.prefix
              this.form.firstname = item.firstname
              this.form.middename = item.middename
              this.form.lastname = item.lastname
              this.form.dob = item.date_birth
              this.form.tel = item.tel
              this.form.notes = item.notes
               $('#viewdetails').modal('show')
            }
        },
        components:{
          ModelListSelect
        },
        /* computed: {
      pages () {
        if (this.pagination.rowsPerPage == null ||
          this.pagination.totalItems == null
        ) return 0

        return Math.ceil(this.pagination.totalItems / this.pagination.rowsPerPage)
      }
    }*/

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

.ui.selection.dropdown[data-v-3a0c7bea]{
  min-height: 20px;
  height: 30px;
}

table.v-table tbody td, table.v-table tbody th{
  height: 24px;
}
textarea{
  height:150px; width:100%;border: 1px solid #ced4da;border-radius: .25rem;
                              transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.modal ::placeholder{
 color:rgba(191, 191, 191, 0.87);
}
.item,.text{
    font-family: Inconsalata;
    font-weight: 800;
}


/*.v-input__slot{
  margin-left: 71%;
  width: 10%;
}*/
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


.theme--light.v-table thead th{
  color:#fff;
  font-weight: 800;
}


.v-alert{
    color:#f00;
    border-color:#ffffff;
    padding: 5px;

}

.form-control{
  min-height: 20px !important;
  height: 29px !important;
}

</style>