<template>
    <div class="container-fluid">
      <div class="row pt-5">
             <div class="col-md-12">
                <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">ADD PASSENGER </h3>
                        <div class="card-tools">
                            <button class="btn btn-warning" @click="newModal">ADD<v-icon color="#fff">add_box</v-icon></button>
                         </div>
                     </div>
                     <template>
  <v-card>
    <v-card-title>
      PASSENGER INFORMATION
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
        <td>{{ props.item.id }}</td>
        <td class="text-xs-left">{{ props.item.lastname | capitalize}},{{props.item.firstname | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.date_birth | myDate | capitalizes}}</td>
        <td class="text-xs-left">{{ props.item.tel | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.notes | capitalize}}</td>
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
                            <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Add Passenger</h5>
                            <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update User's Info</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>   
                        </div>
                       <form @submit.prevent="createPassenger()">
                        <div class="modal-body">
                          <select class="form-control" name="account_name" v-model="form.account_name">
                            <option value="" disabled selected>Account Name</option>
                            <option v-for="customer in customers" :value="customer.id">{{customer.account_name}}</option>
                          </select>
                          <br><br>
                           <!--  <input type="text" placeholder="Name" class="form-control"><br>
                              <p style="font-size:12px; color:#c2c2c2;"> (PASSENGER NAME IS COMPOSED OF LAST NAME, FIRST NAME , AND MIDDLE NAME)</p>
                            <br> -->
                            <input type="text" class="form-control" placeholder="Last Name" name="lastname" 
                            v-model="form.lastname"><br><br>
                 <!--            <input type="text" class="form-control" placeholder="Middle Name" name="middename" 
                            v-model="form.middename"><br><br> -->
                            <input type="text" class="form-control" placeholder="First Name" name="firstname" 
                            v-model="form.firstname"><br><br>
                            <span>Prefix:</span><select class="form-control" name="prefix" v-model="form.prefix">
                                <option value="" selected disabled> -PREFIX - </option>
                                <option value="MR">MR</option>
                                <option value="MS">MS</option>
                                <option value="MRS">MRS</option>
                            </select>
                            <br><br>
                            <label for="dob">Date of Birth:</label>
                            <input type="date" class="form-control" placeholder="Date of Birth" name="dob" v-model="form.dob"  :class="{'is-invalid': form.errors.has('dob') }"><br>
                            <has-error :form="form" field="dob"></has-error><br>
                            <input type="text" class="form-control" placeholder="Tel" name="tel" v-model="form.tel"><br><br>
                            <span> Notes: </span>   
                            <textarea class="form-control" style="height:150px;" name="notes" v-model="form.notes">
                                
                            </textarea>
                        </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
                        <button v-show="!editmode" type="submit" class="btn btn-primary">Submit <i v-if="spinner" class="fa fa-spinner fa-spin"></i></button>
                     </div>
                     </form>
                </div>
            </div>
            </div>
        </div>
</template>
<script type="text/javascript">
    export default{
        data(){
            return{
                spinner:false,
                 search: '',
                 passengers:[],
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
          {
            text: '',
            align: 'left',
            sortable: false,
            value: 'id'
          },
          { text: 'PASSENGER NAME', value: 'airlane' },
          { text: 'DATE OF BIRTH', value: 'usdphp' },
          { text: 'CONTACT NUMBER', value: 'phpusd' },
          { text: 'NOTES', value: 'verified' },
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
                editmode: false,
        
            }
        
        },
         mounted(){
          axios.get('api/getCustomer').then(({data}) => this.customers = data);
          this.getPassenger();
         },

        methods: {
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
            createPassenger(){
                this.form.post('api/passenger')
                .then((response) => {
                    this.spinner = true;
                    $('#addNew').modal('hide');
                    toast.fire({
                      type: 'success',
                      title: 'Passenger Created Successfully'
                    });
                    setTimeout(()=> {this.spinner = false},1000)
                })
            },
            getPassenger(){
              axios.get('api/passenger').then(({data})=> this.passengers = data);
            }
        }
    };
</script>