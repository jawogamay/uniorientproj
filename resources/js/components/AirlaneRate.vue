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
                     <!--  <div class="card-header">
                        
                        <div class="card-tools">
                            
                         </div>
                     </div> -->
                     <template>
  <v-card>
    <v-card-title>
      <h3 class="card-title">AIRLINE RATE INFORMATION</h3>
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
      :items="rates"
      :search="search"
      :rows-per-page="25" :rows-per-page-items="[25]"
      class="elevation-1 my-data-table"
    >
       <template slot="headers" slot-scope="props" v>
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
        <td class="text-xs-left"><button class="btn btn-success --primary" @click="viewAirlaneRate(props.item)">VIEW <i class="fa fa-eye"></i></button>
     </td>
        <td class="text-xs-left">{{props.item.date | myDate | capitalize}}</td>
        <td class="text-xs-left">{{props.item.day | myDate | capitalize}}</td>
        <td class="text-xs-left" >PHP {{ props.item.rate |currency}}</span></td>
        <td class="text-xs-left">{{ props.item.user.name }}</td>
        <td class="text-xs-left">{{ props.item.user.name }}</td>
      <!--   <td class="text-xs-left">{{ props.item.verified }}</td>
        <td class="text-xs-left">{{ props.item.notes }}</td> -->
       
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
                            <h5 class="modal-title"  id="addNewLabel">ADD AIRLINE RATE</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>   
                        </div>
                       <form @submit.prevent="createRate()">
                        <div class="modal-body">
                            <input type="text" class="form-control" placeholder="ENTER RATE" v-model="form.rate" name="rate">
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
             <div class="modal fade" id="viewdetails" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      
                        <form @submit.prevent = "updateAirline()">
                          <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <br><br>
                              <div class="form-inline">
                                  <h5 for="rate">AIRLINE RATE:&nbsp;</h5>
                                  <input type="text" name="rate" v-model="form.rate" class="form-control" :disabled="disabled == 0 ? true : false"
                                  :class="{'is-invalid': form.errors.has('rate') }">
                              </div>
                                <div class="form-inline">
                                  <h5 for="date">DATE: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
                                  <input type="date" name="date" v-model="form.date" class="form-control" :disabled="disabled == 0 ? true : false"
                                  :class="{'is-invalid': form.errors.has('date') }">
                              </div>
                                <div class="form-inline">
                                  <h5 for="day">DAY: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
                                  <input type="date" name="day" v-model="form.day" class="form-control" :disabled="disabled == 0 ? true : false"
                                  :class="{'is-invalid': form.errors.has('day') }">
                              </div>
                             <!--    <div class="form-inline">
                                  <h5 for="input">INPUTTED BY: &nbsp;</h5>
                                  <input type="text" name="input" v-model="form.input" class="form-control" :disabled="disabled == 0 ? true : false"
                                  :class="{'is-invalid': form.errors.has('input') }">
                              </div>
                                <div class="form-inline">
                                  <h5 for="verify">VERIFIED BY: &nbsp;</h5>
                                  <input type="text" name="verify" v-model="form.verify" class="form-control" :disabled="disabled == 0 ? true : false"
                                  :class="{'is-invalid': form.errors.has('verify') }">
                              </div>
 -->                          </div>
                         <div class="modal-footer">
                        <button class="btn btn-success --danger" style="background:#000;" type="button">DELETE</button>
                        <button type="submit" class="btn btn-warning" v-show="disabled == 1">UPDATE  <i v-if="spinner" class="fa fa-spinner fa-spin"></i></button>
                        <button @click="disabled = (disabled + 1) % 2" type="button" class="btn btn-success" v-show="disabled == 0">EDIT</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button> 
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
                count:0,
               pagination:{
                sortBy:'name'
               },
               disabled:0,
        headers: [
         
           {text: 'DATE', value:'date',sortable:!1},
          {text: 'DAY', value:'date',sortable:!1},
          { text: 'AIRLINE RATE', value: 'airlane',sortable:!1 },
           {text: 'VERIFIED BY', value:'date',sortable:!1},
            {text: 'INPUTTED BY', value:'date',sortable:!1},
          
     /*     { text: 'USD TO PHP', value: 'usdphp' },
          { text: 'VERIFIED BY', value: 'verified' },
          { text: 'NOTES', value: 'notes' },*/
         
        ],
    
                editmode: false,
                form: new Form({
                    id: '',
                    rate:'',
                    date:'',
                    day:'',
                    input:'',
                    verify:'',
                })
            }
        
        },
        mounted(){
          this.getRate();
          this.createdRate();
          this.countRate();
      
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
            countRate(){
              axios.get('api/countRate').then(({data})=> this.count = data)
            },
            getRate(){
              axios.get('api/rates').then(({data})=> this.rates = data)
            },
            updateAirline(){
              this.form.put('api/rates/'+this.form.id)
              .then(()=>{
                 this.spinner = true;
                  $('#viewdetails').modal('hide')
                     toast.fire(
                        'Updated!',
                        'Airline Rate has been updated.',
                        'success'
                        )
                       Fire.$emit('createdRate')
                        setTimeout(()=> {this.spinner = false},1000)
                    this.disabled = 0
              })
            },
            createdRate(){
              this.getRate()
              Fire.$on('createdRate',()=>{
                this.getRate()
              })

            },
            viewAirlaneRate(item){
              this.form.id = item.id
              this.form.rate = item.rate
              this.form.date = item.date
              this.form.day = item.day
              this.form.input = item.user.name
              this.form.verify = item.user.name
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