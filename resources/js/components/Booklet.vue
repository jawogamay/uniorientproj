<template>
  <v-app>
    <div class="container-fluid">
        <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">BOOKLET</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SETUP FILES</a></li>
                            <li class="breadcrumb-item active">SA BOOKLET SERIES</li>
                        </ol>
                    </div>
                    <div class="col-md-7 col-4 align-self-center">
              
                    </div>
                </div>
      <div class="row pt-5">
             <div class="col-md-12">
                <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">BOOKLET SERIES INFORMATION </h3>
                        <div class="card-tools">
                            <button class="btn btn-warning" @click="newModal">ADD<v-icon color="#fff">add_box</v-icon></button>
                         </div>
                     </div>
                     <template>
  <v-card>
    <v-card-title>
      BOOKLET SERIES DATA
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
      :items="booklets"
      :search="search"
    >
      <template v-slot:items="props">
        <td></td>
        <td class="text-xs-left">{{ props.item.bookletNumber | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.user.name | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.created_at | myDate | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.notes | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.details | capitalize}}</td>
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
  
                            <label>Travel Consultant:</label><select class="form-control" name="name_assign" v-model="form.name_assign">
                                <option value="" disabled selected> -Assign Travel Consultant - </option>
                                <option v-for="travelconsultant in travelconsultants" :value="travelconsultant.id">
                                  {{travelconsultant.name}}
                                </option>
                            </select>
                            <br><br>
                             <label><b> Booklet Number: </b></label>
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
      </v-app>
</template>
<script type="text/javascript">
    export default{
        data(){
            return{
                 search: '',
                 spinner:false,
                   editmode: false,
                   booklets:[],
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
          { text: 'SA BOOKLET SERIES', value: 'airlane' },
          { text: 'TRAVEL CONSULTANT', value: 'usdphp' },
          { text: 'DATE CREATED', value: 'phpusd' },
          { text: 'STATUS', value: 'verified' },
          { text: 'NOTES', value: 'notes' },
          {text:'ACTIONS',value:'actions'}
        ],
     
              
            }
        
        },
        mounted(){
          this.getTC();
          this.getBooklet();
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
            },
            getBooklet(){
              axios.get('api/booklet').then(({data})=> this.booklets = data)
            }
        }
    };
</script>
<style type="text/css" scoped>
  table.v-table tbody td{
    font-weight: 300;
    font-size: 15px;
}
</style>