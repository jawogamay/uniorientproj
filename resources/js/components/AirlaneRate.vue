<template>
  <v-app>
    <div class="container-fluid">
          <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <!-- <ol class="breadcrumb mt-1">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">SETUP FILES</a></li>
                            <li class="breadcrumb-item active">AIRLINE RATE</li>
                        </ol> -->
                    </div>
                    <div class="col-md-7 col-4 align-self-center">
              
                    </div>
                </div>
      <div class="row">
             <div class="col-md-12">
                <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">AIRLINE RATE INFORMATION</h3>
                        <div class="card-tools">
                            
                         </div>
                     </div>
                     <template>
  <v-card>
    <v-card-title>
    <button class="btn btn-warning" @click="newModal">ADD <v-icon color="#fff">add_box</v-icon></button>
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
      :items="rates"
      :search="search"
    >
      <template v-slot:items="props">
  
        <td class="text-xs-left">{{props.item.date | myDate | capitalize}}</td>

        <td class="text-xs-left" >PHP {{ props.item.rate |currency}}</span></td>
        
      <!--   <td class="text-xs-left">{{ props.item.verified }}</td>
        <td class="text-xs-left">{{ props.item.notes }}</td> -->
        <td class="text-xs-left"><a href="#" class="btn btn-success">View</a></td>
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
                            <h5 class="modal-title" v-show="!editmode" id="addNewLabel">ADD AIRLINE RATE</h5>
                            <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update User's Info</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>   
                        </div>
                       <form @submit.prevent="editmode ? updateUser() :createRate()">
                        <div class="modal-body" style="margin:0 auto; text-align:center;">

                            <input type="text" class="form-control" placeholder="Enter Rate" v-model="form.rate" name="rate" style="width:30%;">
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
      </v-app>
</template>
<script type="text/javascript">
    export default{
        data(){
            return{
                 search: '',
               rates:[],
        headers: [
           {text: 'DATE', value:'date'},
          { text: 'AIRLINE RATE', value: 'airlane' },
          
     /*     { text: 'USD TO PHP', value: 'usdphp' },
          { text: 'VERIFIED BY', value: 'verified' },
          { text: 'NOTES', value: 'notes' },*/
          {text: 'ACTIONS', value: 'action'}
        ],
    
                editmode: false,
                form: new Form({
                    id: '',
                    rate:'',
                   
                })
            }
        
        },
        mounted(){
          this.getRate();
          this.createdRate();
        },
        methods: {
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
            createRate(){
              this.form.post('api/rates')
              .then((response) => {
                this.spinner = true;
                $('#addNew').modal('hide');
                Fire.$emit('createdRate')
                toast.fire({
                  type: 'success',
                  title: 'Rate successfull created'
                })
                 setTimeout(()=> {this.spinner = false},1000)
              })
            },
            getRate(){
              axios.get('api/rates').then(({data})=> this.rates = data)
            },
            createdRate(){
              this.getRate()
              Fire.$on('createdRate',()=>{
                this.getRate()
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
  height: 24px;
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