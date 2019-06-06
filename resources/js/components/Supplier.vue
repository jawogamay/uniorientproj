<template>
    <div class="container-fluid">
       <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                 <!--        <ol class="breadcrumb mt-2">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SETUP FILES</a></li>
                            <li class="breadcrumb-item active">SUPLLIER</li>
                        </ol> -->
                    </div>
                    <div class="col-md-7 col-4 align-self-center">
              
                    </div>
                </div>
      <div class="row">
             <div class="col-md-12">
                <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">SUPPLIER INFORMATION </h3>
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
                            <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Add Supplier</h5>
                            <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update User's Info</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>   
                        </div>
                       <form @submit.prevent="editmode ? updateUser() :createSupplier()">
                        <div class="modal-body">
                            <input type="text" class="form-control" placeholder="Account Name" v-model="form.account" name="account"><br><br>
                            <select class="form-control" name="category" v-model="form.category"> 
                                <option value="" disabled selected>Select Category</option>
                                <option value="operator">Operator</option>
                                <option value="test">Test</option>
                            </select>
                            <br><br>
                            <select class="form-control" name="purchasetype" v-model="form.purchasetype">
                                <option value="" disabled selected>Select Purchase Type</option>
                                <option value="ticket-am-sb">TICKET-AM-SB</option>
                            </select>
                        </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
                        <button v-show="!editmode" type="submit" class="btn btn-primary">Submit</button>
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
                     editmode: false,
                form: new Form({
                    id: '',
                    account:'',
                    category:'',
                    purchasetype:''
                }),
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
            airlane: '101 RESTAURANT CITY INC',
            usdphp: '',
            phpusd: 'PRIVATE',
            verified: 'RCO',
            notes: '30 DAYS',
            details: ' ',
           
          },

           {
            date: '2',
            airlane: '3-1 MARKETING',
            usdphp: '',
            phpusd: 'PRIVATE',
            verified: 'LAL',
            notes: 'CASH',
            details: ' ',
           
          },
          {
            date: '3',
            airlane: '77 LIVING INC',
            usdphp: '',
            phpusd: 'SUB AGENT',
            verified: 'RMR',
            notes: '30 DAYS',
            details: ' ',
           
          },
          {
            date: '4',
            airlane: 'AME TRAVEL & TOURS',
            usdphp: '',
            phpusd: 'PRIVATE',
            verified: 'MNH',
            notes: 'CASH',
            details: ' ',
           
          },
          {
            date: '5',
            airlane: 'AMIGO TRAVEL & TOURS',
            usdphp: '',
            phpusd: 'SUB AGENT',
            verified: 'LAL',
            notes: 'CASH',
            details: ' ',
           
          },
            {
            date: '6',
            airlane: 'AMIGO TRAVEL & TOURS',
            usdphp: '',
            phpusd: 'SUB AGENT',
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
            createSupplier(){
                this.form.post('api/supplier')
                .then((response)=>{
                    
                });
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
</style>