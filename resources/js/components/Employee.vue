<template>
  <v-app>
    <div class="container-fluid">
      <div class="row pt-5">
             <div class="col-md-12">
                <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Employee </h3>
                        <div class="card-tools">
                            <button class="btn btn-warning" @click="newModal">Add<v-icon color="#fff">add_box</v-icon></button>
                         </div>
                     </div>
                     <template>
  <v-card>
    <v-card-title>
      Employee Table
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
      :items="desserts"
      :search="search"
    >
      <template v-slot:items="props">
        <td>{{ props.item.date }}</td>
        <td class="text-xs-left">{{ props.item.airlane }}</td>
        <td class="text-xs-left">{{ props.item.usdphp }}</td>
        <td class="text-xs-left">{{ props.item.phpusd }}</td>
        <td class="text-xs-left">{{ props.item.verified }}</td>
        <td class="text-xs-left">{{ props.item.notes }}</td>
        <td class="text-xs-left">{{ props.item.details }}</td>
        <td class="text-xs-left">

            <a href="#" class="btn btn-success">View</a>
            <a href="#" class="btn btn-warning">Edit</a> 
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
                            <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Add Customer</h5>
                            <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update User's Info</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>   
                        </div>
                       <form @submit.prevent="createEmployee()">
                        <div class="modal-body">
                            <input type="text" placeholder="Employee Name" class="form-control" name="name" v-model="form.name"  :class="{'is-invalid': form.errors.has('name') }"><br>
                            <has-error :form="form" field="name"></has-error>
                            <br>
                             <input type="text" placeholder="Code" class="form-control" name="code" v-model="form.code"  :class="{'is-invalid': form.errors.has('code') }"><br><has-error :form="form" field="code"></has-error>
                            <br>
                            <label for="dob">Date of Birth:</label>
                            <input type="date" class="form-control" placeholder="Date of Birth" name="dob" v-model="form.dob"  :class="{'is-invalid': form.errors.has('dob') }"><br>
                            <has-error :form="form" field="dob"></has-error><br>
                            <label for="dob">Hired Date:</label>
                            <input type="date" class="form-control" placeholder="Hired Data" name="hired" v-model="form.hired"  :class="{'is-invalid': form.errors.has('hired') }"><br>
                            <has-error :form="form" field="hired"></has-error><br>
                            <select class="form-control" name="type" v-model="form.type"  :class="{'is-invalid': form.errors.has('type') }">
                               <option value="" disabled selected>--Employee Type--</option>
                               <option value="consultant">Travel Consultant</option>
                               <option value="admin">Admin</option>
                            </select>
                            <br>
                            <has-error :form="form" field="type"></has-error><br>
                            <input type="email" name="email" class="form-control" placeholder="Email address" v-model="form.email"  :class="{'is-invalid': form.errors.has('email') }"><br>
                            <has-error :form="form" field="email"></has-error><br>
                            <input type="password" name="password" class="form-control" placeholder="Password" v-model="form.password"  :class="{'is-invalid': form.errors.has('password') }"><br>
                            <has-error :form="form" field="password"></has-error><br>
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
          {
            text: '',
            align: 'left',
            sortable: false,
            value: 'date'
          },
          { text: 'Account name', value: 'airlane' },
          { text: 'Address', value: 'usdphp' },
          { text: 'Nature', value: 'phpusd' },
          { text: 'TC', value: 'verified' },
          { text: 'Term', value: 'notes' },
          {text: 'Contact Details', value: 'details'},
          {text:'Actions',value:'actios'}
        ],
        desserts: [
          {
            date: '1',
            airlane: '101 Restaurant City Inc',
            usdphp: '',
            phpusd: 'Private',
            verified: 'RCO',
            notes: '30 Days',
            details: ' ',
           
          },

           {
            date: '2',
            airlane: '3-1 Marketing',
            usdphp: '',
            phpusd: 'Private',
            verified: 'LAL',
            notes: 'CASH',
            details: ' ',
           
          },
          {
            date: '3',
            airlane: '77 Living Inc',
            usdphp: '',
            phpusd: 'Sub Agent',
            verified: 'RMR',
            notes: '30 Days',
            details: ' ',
           
          },
          {
            date: '4',
            airlane: 'Ame Travel & Tours',
            usdphp: '',
            phpusd: 'Private',
            verified: 'MNH',
            notes: 'CASH',
            details: ' ',
           
          },
          {
            date: '5',
            airlane: 'Amigo Travel & Tours',
            usdphp: '',
            phpusd: 'Sub Agent',
            verified: 'LAL',
            notes: 'CASH',
            details: ' ',
           
          },
            {
            date: '6',
            airlane: 'Amigo Travel & Tours',
            usdphp: '',
            phpusd: 'Sub Agent',
            verified: 'LAL',
            notes: 'CASH',
            details: ' ',
           
          },
        ],
       }
        
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
                  $('#addNew').modal('hide');
                  toast.fire({
                    type: 'success',
                    title: 'Employee Created Successfully'
                  });
                  
                
                })
                setTimeout(()=> {this.spinner = false},1000)
            }
        }
    };
</script>