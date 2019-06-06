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
                      <div class="card-header">
                        <h3 class="card-title">PASSENGER INFORMATION </h3>
                        <div class="card-tools">
                            
                         </div>
                     </div>
                     <template>
  <v-card>
    <v-card-title>
      <button class="btn btn-warning" @click="newModal">ADD<v-icon color="#fff">add_box</v-icon></button>
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
      :items="passengers"
      :search="search"
    >
      <template v-slot:items="props">
       
        <td class="text-xs-left">{{ props.item.lastname | capitalize}} {{props.item.firstname | capitalize}},{{props.item.prefix}}</td>
        <td class="text-xs-left">{{ props.item.date_birth | myDate | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.tel | capitalize}}</td>
        <td class="text-xs-left" v-if="props.item.notes.length<20">{{ props.item.notes | capitalize}}</td>
        <td class="text-xs-left" v-if="props.item.notes.length>20">{{ props.item.notes.substring(0,20)+"..." | capitalize}}</td>
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
                            <h5 class="modal-title" v-show="!editmode" id="addNewLabel">ADD PASSENGER</h5>
                            <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update User's Info</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>   
                        </div>
                       <form @submit.prevent="createPassenger()">
                        <div class="modal-body">
                          <select class="form-control" name="account_name" v-model="form.account_name">
                            <option value="" disabled selected>ACCOUNT NAME</option>
                            <option v-for="customer in customers" :value="customer.id">{{customer.account_name | capitalize }}</option>
                          </select>
                          <br><br>
                           <!--  <input type="text" placeholder="Name" class="form-control"><br>
                              <p style="font-size:12px; color:#c2c2c2;"> (PASSENGER NAME IS COMPOSED OF LAST NAME, FIRST NAME , AND MIDDLE NAME)</p>
                            <br> -->
                            <div class="row">
                              <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="LASTNAME" name="lastname" 
                                v-model="form.lastname"><br><br>
                              </div>
                 <!--            <input type="text" class="form-control" placeholder="Middle Name" name="middename" 
                            v-model="form.middename"><br><br> -->
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="FIRSTNAME" name="firstname" 
                                v-model="form.firstname"><br><br>
                            </div>
                           </div>

                           <div class="row">
                            <div class="col-md-6">
                              <label>PREFIX:</label><select class="form-control" name="prefix" v-model="form.prefix">
                                  <option value="MR" selected>MR</option>
                                  <option value="MS">MS</option>
                                  <option value="MRS">MRS</option>
                              </select>
                              <br><br>
                            </div>
                            <div class="col-md-6">
                            <label for="dob">DATE OF BIRTH:</label>
                            <input type="date" class="form-control" placeholder="Date of Birth" name="dob" v-model="form.dob"  :class="{'is-invalid': form.errors.has('dob') }" id="mdate"><br>
                            <has-error :form="form" field="dob"></has-error><br>
                          </div>
                          </div>
                            <input type="text" class="form-control" placeholder="TEL" name="tel" v-model="form.tel"><br><br>
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
    export default{
        data(){
            return{
                spinner:false,
                 search: '',
                 passengers:[],
                 customers:[],
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
        
          { text: 'PASSENGER NAME', value: 'lastname' },
          { text: 'DATE OF BIRTH', value: 'dob' },
          { text: 'CONTACT NUMBER', value: 'tel' },
          { text: 'NOTES', value: 'notes' },
          {text:'ACTIONS',value:'actios'}
        ],
       
                editmode: false,
        
            }
        
        },
         mounted(){
          axios.get('api/getCustomer').then(({data}) => this.customers = data);
          this.getPassenger();
          this.createdPassenger();
         },

        methods: {
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
            datePicker(){
              $('#mdate').bootstrapMaterialDatePicker({
                weekStart: 0,
                time: false
              });
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
</style>