<template>
  <v-app>
    <div class="container-fluid">
        <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <!-- <ol class="breadcrumb mt-2">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SETUP FILES</a></li>
                            <li class="breadcrumb-item active">USER</li>
                        </ol> -->
                    </div>
                    <div class="col-md-7 col-4 align-self-center">
              
                    </div>
                </div> 
      <div class="row">
             <div class="col-md-12">
                <div class="card">
                     <div class="card-header">
                        <h3 class="card-title">EMPLOYEE INFORMATION</h3>
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
      :items="employees"
      :search="search"
    >
      <template v-slot:items="props">
       
        <td class="text-xs-left">{{ props.item.name | capitalize }}</td>
        <td class="text-xs-left">{{ props.item.code | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.dob | myDate | capitalize }}</td>
        <td class="text-xs-left">{{ props.item.hired | myDate | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.type | capitalize}}</td>
        <td class="text-xs-left">

            <a href="#" class="btn btn-success">VIEW</a>
            <a href="#" class="btn btn-warning">EDIT</a> 
        </td>
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
                            <h5 class="modal-title" v-show="!editmode" id="addNewLabel">ADD EMPLOYEE</h5>
                            <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update User's Info</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>   
                        </div>
                       <form @submit.prevent="createEmployee()" >
                        <div class="modal-body">
                          <div class="form-group">
                            <input type="text" placeholder="EMPLOYEE NAME" class="form-control" name="name" v-model="form.name"  :class="{'is-invalid': form.errors.has('name') }"><br>
                            <has-error :form="form" field="name"></has-error>
                            <br>
                             <input type="text" placeholder="CODE" class="form-control" name="code" v-model="form.code"  :class="{'is-invalid': form.errors.has('code') }"><br><has-error :form="form" field="code"></has-error>
                            <br>
                            <label for="dob">DATE OF BIRTH:</label>
                            <input type="date" class="form-control" placeholder="Date of Birth" name="dob" v-model="form.dob"  :class="{'is-invalid': form.errors.has('dob') }"><br>
                            <has-error :form="form" field="dob"></has-error><br>
                            <label for="dob">HIRED DATE:</label>
                            <input type="date" class="form-control" placeholder="Hired Data" name="hired" v-model="form.hired"  :class="{'is-invalid': form.errors.has('hired') }"><br>
                            <has-error :form="form" field="hired"></has-error><br>
                            <select class="form-control" name="type" v-model="form.type"  :class="{'is-invalid': form.errors.has('type') }">
                               <option value="" disabled selected>--EMPLOYEE TYPE--</option>
                                <option value="admin">ADMIN</option>
                                 <option value="supervisor">ACCOUNTING SUPERVISOR</option>
                                  <option value="accounting">ACCOUNTING</option>
                               <option value="consultant">TRAVEL CONSULTANT</option>
                            </select>
                            <br>
                            <has-error :form="form" field="type"></has-error><br>
                            <input type="email" name="email" class="form-control" placeholder="EMAILD ADDRESS" v-model="form.email"  :class="{'is-invalid': form.errors.has('email') }"><br>
                            <has-error :form="form" field="email"></has-error><br>
                            <input type="password" name="password" class="form-control" placeholder="PASSWORD" v-model="form.password"  :class="{'is-invalid': form.errors.has('password') }"><br>
                            <has-error :form="form" field="password"></has-error><br>
                        </div>
                      </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                        <button v-show="editmode" type="submit" class="btn btn-success">UPDATE</button>
                        <button v-show="!editmode" type="submit" class="btn btn-primary">SUBMIT <i v-if="spinner"class="fa fa-spinner fa-spin"></i></button>
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
                employees:[],
                 form: new Form({
                    id:'',
                    name:'',
                    email:'',
                    password:'',
                    type:'',
                    dob:'',
                    hired:'',
                    code:'',
                 }),
        headers: [
       
          { text: 'EMPLOYEE NAME', value: 'airlane' },
          { text: 'CODE', value: 'usdphp' },
          { text: 'DATE OF BIRTH', value: 'phpusd' },
          { text: 'HIRED DATE', value: 'verified' },
          {text: 'EMPLOYEE TYPE', value: 'details'},
          {text:'ACTIONS',value:'actions'}
        ],
  
       }
        
        },
        mounted(){
          this.getEmployee();
          this.createdEmployee();
        },
        methods: {
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
            createEmployee(){
                this.form.post('api/user')
                .then((response)=>{
                  this.spinner = true;
                  Fire.$emit('createdEmployee')
                  $('#addNew').modal('hide');
                  toast.fire({
                    type: 'success',
                    title: 'Employee Created Successfully'
                  });
                  
                
                })
                setTimeout(()=> {this.spinner = false},1000)
            },
            getEmployee(){
              axios.get('api/user').then(({data}) => this.employees = data)
            },
            createdEmployee(){
              this.getEmployee()
              Fire.$on('createdEmployee',()=>{
                this.getEmployee()
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
    font-size: 18px;
  }
table.v-table tbody td, table.v-table tbody th{
  height: 26px;
}
</style>