<template>
    <div class="container-fluid">
      <div class="row pt-5">
             <div class="col-md-12">
                <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Customer Table </h3>
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
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Add Customer</h5>
                            <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update User's Info</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>   
                        </div>
                       <form @submit.prevent="editmode ? updateUser() :createPost()">
                        <div class="modal-body">
                            <input type="text" placeholder="Nature of Service" class="form-control"><br><br>
                            <input type="text" placeholder="Firstname" class="form-control"><br><br>
                            <input type="text" placeholder="Middlename" class="form-control"><br><br>
                            <input type="text" placeholder="Lastname" class="form-control"><br><br>
                            <input type="text" placeholder="Company" class="form-control"><br><br>
                            <input type="text" placeholder="TIN" class="form-control"><br><br>
                            <input type="text" placeholder="SSS No." class="form-control"><br><br>
                            <input type="text" placeholder="Sec Reg. No." class="form-control"><br><br>
                            <input type="text" placeholder="Assigned Salesman" class="form-control"><br><br>
                            <input type="text" placeholder="Credit Terms" class="form-control"><br><br>
                        </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
                        <button v-show="!editmode" type="submit" class="btn btn-primary">Post</button>
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
                editmode: false,
                form: new Form({
                    id: '',
                    content:'',
                    title:'',
                    image:'',
                })
            }
        
        },

        methods: {
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            }
        }
    };
</script>