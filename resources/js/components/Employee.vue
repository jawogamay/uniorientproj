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
                   <!--   <div class="card-header">
                        <h3 class="card-title">EMPLOYEE INFORMATION</h3>
                        <div class="card-tools">
                            
                         </div>
                     </div> -->
                     <template>
  <v-card>
    <v-card-title>
      <h3 class="card-title">EMPLOYEE INFORMATION</h3>
      <v-spacer></v-spacer>
      <v-text-field
        v-model="search"
        append-icon="search"
        label="SEARCH"
        single-line
        hide-details
      ></v-text-field>
    </v-card-title>
     
    <v-data-table
      :headers="headers"
      :items="employees"
      :search="search"
      :rows-per-page="25" :rows-per-page-items="[25]"
       :pagination.sync="pagination"
      class="elevation-1 my-data-table"
     
    >
     <template slot="headers" slot-scope="props">
  <tr style="height:30px;background:#000;">
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
  
               <td  class="text-xs-left"><button class="btn btn-success --primary" @click="viewEmployee(props.item)">VIEW <i class="fa fa-eye"></i></button>
    </td>     
        <td class="text-xs-left">{{ props.item.name | capitalize }}</td>
        <td class="text-xs-left">{{ props.item.code | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.dob | myDate | capitalize }}</td>
        <td class="text-xs-left">{{ props.item.hired | myDate | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.type | capitalize}}</td>
    
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
                            <h5 class="modal-title" id="addNewLabel">ADD EMPLOYEE</h5>
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
                        <button type="submit" class="btn btn-primary">SUBMIT <i v-if="spinner"class="fa fa-spinner fa-spin"></i></button>
                     </div>
                     </form>
                </div>
            </div>
            </div>

                <div class="modal fade" id="viewdetails" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                          <!--   <h5 class="modal-title" id="addNewLabel">View Transaction</h5> -->
                          <img src="/assets/images/user.jpg" style="width:100px; height:100px;"><h4 style="margin-top:50px;">{{form.name}}<br> {{form.code}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>   
                        </div>
                        <div class="modal-body">
                            <h5><b>EMAIL:</b> {{form.email}}</h5>
                            <h5><b>TYPE:</b> {{form.type | capitalize}}</h5>
                            <h5><b>DATE OF BIRTH:</b> {{form.dob | capitalize | myDate}}</h5>
                            <h5><b>HIRED DATE:</b> {{form.hired | capitalize | myDate}}</h5>
                        </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                     </div>
              
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
                pagination: {
                  sortBy: 'name'
                },
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
         
          { text: 'EMPLOYEE NAME', value: 'name',sortable: !1},
          { text: 'CODE', value: 'code',sortable: !1 },
          { text: 'DATE OF BIRTH', value: 'dob',sortable: !1 },
          { text: 'HIRED DATE', value: 'hired',sortable: !1 },
          {text: 'EMPLOYEE TYPE', value: 'type',sortable: !1},
      
        ],
  
       }
        
        },
        mounted(){
          this.getEmployee();
          this.createdEmployee();
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
            newModal(){
               
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
            },
            viewEmployee(item){
              this.form.name = item.name
              this.form.email = item.email
              this.form.type = item.type
              this.form.code = item.code
              this.form.dob = item.dob
              this.form.hired = item.hired
               $('#viewdetails').modal('show')

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
</style>