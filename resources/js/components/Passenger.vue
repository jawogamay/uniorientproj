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
                <div class="card">
                    <!--   <div class="card-header">
                        <h3 class="card-title">PASSENGER INFORMATION </h3>
                        <div class="card-tools">
                            
                         </div>
                     </div> -->
                     <template>
  <v-card>
    <v-card-title>
      <h3>PASSENGER INFORMATION </h3>
      <v-spacer></v-spacer>

      <v-text-field
        v-model="search"
        append-icon="search"
        label="Search"
        single-line
        hide-details
      ></v-text-field>
    </v-card-title>
   <!--  <button class="btn btn-warning" style="margin-left:16px;margin-top:10px;" @click="newModal">ADD<v-icon color="#fff">add_box</v-icon></button> -->
    <v-data-table
      :headers="headers"

      :items="passengers"
      :search="search"
    >
    <template slot="headers" slot-scope="props">
  <tr style="height:30px;">
    <th>
      <button class="btn btn-warning" @click="newModal">ADD<v-icon color="#fff">add_box</v-icon></button>
    </th>
    <th 
    v-for="header in props.headers"
    >
        {{header.text}}
    </th>
  </tr>
</template>
      <template v-slot:items="props">
       <td class="text-xs-left"><a href="#" class="btn btn-success">VIEW</a></td>
        <td class="text-xs-left">{{props.item.prefix}}. {{props.item.firstname | capitalize}} {{ props.item.lastname | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.date_birth | myDate | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.tel | capitalize}}</td>
        <td class="text-xs-left" v-if="props.item.notes.length<20">{{ props.item.notes | capitalize}}</td>
        <td class="text-xs-left" v-if="props.item.notes.length>20">{{ props.item.notes.substring(0,20)+"..." | capitalize}}</td>
        
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
                     v-model="form.account_name"
                     option-value="id"
                     option-text="account_name"
                     placeholder="ACCOUNT NAME">
                  </model-list-select>
                            <div class="row">
                              <div class="col-md-6">
                                <br>
          
                                <model-list-select :list="options1"
                         v-model="form.prefix"
                         option-value="code"
                         option-text="name"
                         placeholder="SELECT PREFIX">
                         </model-list-select>
                              <br><br>
                            </div>
                 <!--            <input type="text" class="form-control" placeholder="Middle Name" name="middename" 
                            v-model="form.middename"><br><br> -->
                            <div class="col-md-6">
                                 <label></label>
                                <input type="text" class="form-control" placeholder="FIRST NAME" name="firstname" 
                                v-model="form.firstname"><br><br>
                            </div>
                           </div>
                           <div class="row" style="margin-top:-25px;">
                            <div class="col-md-6">
                             <input type="text" class="form-control" placeholder="MIDDLE NAME" name="middename" 
                            v-model="form.middename"><br><br>
                      
                            </div>
                            <div class="col-md-6">
                               
                                <input type="text" class="form-control" placeholder="LAST NAME" name="lastname" 
                                v-model="form.lastname"><br><br>
                            </div>
                          </div>
                          <div class="row" style="margin-top:-25px;">
                            <div class="col-md-6">
                         
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
                                  <br>
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
                         
                          <div class="col-md-6" style="margin-top:5px;">
                            <br>
                            <input type="text" class="form-control" placeholder="TEL" name="tel" v-model="form.tel"><br><br>
                          </div>
                          </div>

                            <label> NOTES: </label>   
                            <textarea class="form-control" style="height:150px;" name="notes" v-model="form.notes">
                                
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
        </div>
      </v-app>
</template>
<script type="text/javascript">
 import { ModelListSelect } from 'vue-search-select'
    export default{
        data(){
            return{
                spinner:false,
                 date: new Date().toISOString().substr(0, 10),
      modal: false,
    
                 search: '',
                 results:[],
                 passengers:[],
               options1: [
          { code: 'MR', name: 'MR', },
          { code: 'MRS', name: 'MRS' },
          { code: 'MS', name: 'MS' },
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
          { text: 'PASSENGER NAME', value: 'lastname' },
          { text: 'DATE OF BIRTH', value: 'date_birth' },
          { text: 'CONTACT NUMBER', value: 'tel' },
          { text: 'NOTES', value: 'notes' },
          
        ],
       
                editmode: false,
        
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
            }
        },
        components:{
          ModelListSelect
        }
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
  height: 24px;
}
::placeholder{
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
  color:#000;
  font-weight: 800;
}


.v-alert{
    color:#f00;
    border-color:#ffffff;
    padding: 5px;

}

</style>