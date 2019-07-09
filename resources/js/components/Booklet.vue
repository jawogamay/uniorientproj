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
      <h3 class="card-title">BOOKLET SERIES</h3>
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
      :items="booklets"
      :search="search"
       :rows-per-page="25" :rows-per-page-items="[25]"
      class="elevation-1 my-data-table"
     
    >
     <template slot="headers" slot-scope="props">
  <tr style="height:30px;">
    <th>
      <button class="btn btn-warning" @click="newModal">ADD<v-icon color="#fff">add_box</v-icon></button>
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
  
               <td  class="text-xs-left"><a href="#" class="fa fa-eye" @click="viewEmployee(props.item)"></a>
    </td>     
        <td class="text-xs-left">{{ props.item.bookletNumber | capitalize }}</td>
        <td class="text-xs-left">{{ props.item.user.name | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.created_at | myDate | capitalize }}</td>
       
    
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
                <div class="modal-dialog modal-dialog-centered  modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" v-show="!editmode" id="addNewLabel">GENERATE BOOKLET SERIES</h5>
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
                           
                           
                        </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
                        <button v-show="!editmode" type="submit" class="btn btn-primary">GENERATE <i v-if="spinner" class="fa fa-spinner fa-spin"></i></button>
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
                  pagination: {
                    sortBy: 'name'
                },
                form: new Form({
                    id: '',
                    iniital:'',
                    end:'',
                    name_assign:'',
                }),
                 travelconsultants:[],
        headers: [
       
          { text: 'SA BOOKLET SERIES', value: 'airlane',sortable:!1 },
          { text: 'TRAVEL CONSULTANT', value: 'usdphp',sortable:!1 },
          { text: 'DATE CREATED', value: 'phpusd',sortable:!1 },
         /* { text: 'STATUS', value: 'verified' ,sortable:!1},
          { text: 'NOTES', value: 'notes',sortable:!1 },
          {text:'ACTIONS',value:'actions',sortable:!1}*/
        ],
     
              
            }
        
        },
        mounted(){
          this.getTC();
          this.getBooklet();
          this.createdBooklet();
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
                  Fire.$emit('createdBooklet');
                      toast({
                        type: 'success',
                        title: 'Booklet Created Successfully'
                    })
                    setTimeout(()=> {this.spinner = false},1000)
                })
            },
            getBooklet(){
              axios.get('api/booklet').then(({data})=> this.booklets = data)
            },
            createdBooklet(){
              this.getBooklet();
              Fire.$on('createdBooklet',()=>{
                this.getBooklet();
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