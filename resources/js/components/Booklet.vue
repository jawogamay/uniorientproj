<template>
    <div class="container-fluid">
      <div class="row pt-5">
             <div class="col-md-12">
                <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">BOOKLET </h3>
                        <div class="card-tools">
                            <button class="btn btn-warning" @click="newModal">ADD<v-icon color="#fff">add_box</v-icon></button>
                         </div>
                     </div>
                     <template>
  <v-card>
    <v-card-title>
      BOOKLET TABLE
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
        <td class="text-xs-left">{{ props.item.airlane | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.usdphp | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.phpusd | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.verified | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.notes | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.details | capitalize}}</td>
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
                <div class="modal-dialog modal-dialog-centered  modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Add Customer</h5>
                            <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update User's Info</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>   
                        </div>
                       <form @submit.prevent="editmode ? updateUser() :createBooklet()">
                        <div class="modal-body">
  
                            <span>Travel Consultant:</span><select class="form-control" name="name_assign" v-model="form.name_assign">
                                <option value="" disabled selected> -Assign Travel Consultant - </option>
                                <option v-for="travelconsultant in travelconsultants" :value="travelconsultant.id">
                                  {{travelconsultant.name}}
                                </option>
                            </select>
                            <br><br>
                             <p><b> Booklet Number: </b></p>
                                 <div class="row" style="margin:0 auto; text-align:center;">
                                 <div class="col-md-6">
                                    <input type="number" placeholder="Enter first number" class="form-control mr-5 ml-3" name="initial" v-model="form.initial" :class="{ 'is-invalid': form.errors.has('initial') }" style="width:100%;">
                                     <has-error :form="form" field="initial"></has-error>
                                 </div>
                                  <div class="col-md-6">
                                    <input type="number" placeholder="Enter second number" class="form-control" name="end" v-model="form.end" :class="{ 'is-invalid': form.errors.has('end') }" style="width:100%;">
                                    <has-error :form="form" field="end"></has-error>
                                  </div>
                                 </div>
                                 <br> 
                           
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
                 search: '',
                 spinner:false,
                   editmode: false,
                form: new Form({
                    id: '',
                    iniital:'',
                    end:'',
                    name_assign:'',
                }),
                 travelconsultants:[],
        headers: [
          {
            text: '',
            align: 'left',
            sortable: false,
            value: 'date'
          },
          { text: 'ACCOUNT NAME', value: 'airlane' },
          { text: 'ADDRESS', value: 'usdphp' },
          { text: 'NATURE', value: 'phpusd' },
          { text: 'TC', value: 'verified' },
          { text: 'TERM', value: 'notes' },
          {text: 'CONTACT DETAILS', value: 'details'},
          {text:'ACTIONS',value:'actios'}
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
        mounted(){
          this.getTC();
        },
        methods: {
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
            getTC(){
              axios.get('api/getTC').then(({data})=>{
                this.travelconsultants = data;
              })
            },
            createBooklet(){
                this.form.post('api/booklet')
                .then((response)=>{
                  this.spinner = true;
                  $('#addNew').modal('hide');
                      toast({
                        type: 'success',
                        title: 'Book;et Created Successfully'
                    })
                    setTimeout(()=> {this.spinner = false},1000)
                })
            }
        }
    };
</script>
<style>

</style>