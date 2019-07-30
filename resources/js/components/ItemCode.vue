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
      <h3 class="card-title">ITEM CODE</h3>
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
      :items="itemcodes"
      :search="search"
       :rows-per-page="50" :rows-per-page-items="[50]"
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
        <td class="text-xs-left"><button class="btn btn-success --primary" @click="viewItemCode(props.item)">VIEW <i class="fa fa-eye"></i></button>
        </td>     
        <td class="text-xs-left">{{ props.item.ticket | capitalize }}</td>
        <td class="text-xs-left">{{ props.item.tax | capitalize }}</td>
        <td class="text-xs-left">{{ props.item.hotel | capitalize }}</td>
        <td class="text-xs-left">{{ props.item.package | capitalize }}</td>
        <td class="text-xs-left">{{ props.item.service_fee | capitalize }}</td>
        <td class="text-xs-left">{{ props.item.documentation | capitalize }}</td>
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
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addNewLabel">ADD ITEM CODE</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>   
                        </div>
                       <form @submit.prevent="createItemCode()">
                        <div class="modal-body" id="addmode">
                          <input class="form-control" type="text" style="width:100%;" name="ticket" v-model="form.ticket" placeholder="ENTER TICKET">
                            
                             <input class="form-control" type="text" style="width:100%;" name="tax" v-model="form.tax" placeholder="ENTER TAX">
                             
                              <input class="form-control" type="text" style="width:100%;" name="hotel" v-model="form.hotel" placeholder="ENTER HOTEL">
                              
                               <input class="form-control" type="text" style="width:100%;" name="package" v-model="form.package" placeholder="ENTER PACKAGE">
                               
                              <input class="form-control" type="text" style="width:100%;" name="service_fee" v-model="form.service_fee" placeholder="ENTER SERVICE FEE">
                              
                              <input class="form-control" type="text" style="width:100%;" name="document" v-model="form.document" placeholder="ENTER DOCUMENTATION">
                        </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                        <button v-show="editmode" type="submit" class="btn btn-success">UPDATE</button>
                        <button v-show="!editmode" type="submit" class="btn btn-primary">SUBMIT <i v-if="spinner" class="fa fa-spinner fa-spin"></i></button>
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
                         
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>   
                        </div>
                        <form @submit.prevent = "updateItemCode()">
                          <div class="modal-body">
                              <div class="form-inline">
                                  <h5 for="ticket">TICKETS: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
                                  <input type="text" name="ticket" v-model="form.ticket" class="form-control" :disabled="disabled == 0 ? true : false"
                                  :class="{'is-invalid': form.errors.has('ticket') }">
                              </div>

                              <div class="form-inline">
                                  <h5 for="tax">TAXES: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
                                  <input type="text" name="tax" v-model="form.tax" class="form-control" :disabled="disabled == 0 ? true : false" :class="{'is-invalid': form.errors.has('tax') }">
                              </div>

                              <div class="form-inline">
                                  <h5 for="hotel">HOTEL: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
                                  <input type="text" name="hotel" v-model="form.hotel" class="form-control" :disabled="disabled == 0 ? true : false" :class="{'is-invalid': form.errors.has('hotel') }">
                              </div>

                              <div class="form-inline">
                                  <h5 for="package">PACKAGE: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
                                  <input type="text" name="package" v-model="form.package" class="form-control" :disabled="disabled == 0 ? true : false" :class="{'is-invalid': form.errors.has('package') }">
                              </div>

                              <div class="form-inline">
                                  <h5 for="service_fee">SERVICE FEE: &nbsp;&nbsp;&nbsp;&nbsp;</h5>
                                  <input type="text" name="service_fee" v-model="form.service_fee" class="form-control" :disabled="disabled == 0 ? true : false" :class="{'is-invalid': form.errors.has('service_fee') }">
                              </div>
                                <div class="form-inline">
                                  <h5 for="document">DOCUMENTATIONS: &nbsp;</h5>
                                  <input type="text" name="document" v-model="form.document" class="form-control" :disabled="disabled == 0 ? true : false" :class="{'is-invalid': form.errors.has('document') }">
                              </div>
                          </div>
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
                spinner:false,
                itemcodes:[],
                disabled:0,
                  pagination: {
      sortBy: 'name'
    },
                 form: new Form({
                    id:'',
                    ticket:'',
                    tax:'',
                    hotel:'',
                    package:'',
                    service_fee:'',
                    document:''
                 }),
        headers: [
         
          { text: 'TICKETS', value: 'ticket',sortable: !1},
          {text:'TAXES',value:'tax',sortable:!1},
          {text:'HOTEL',value:'hotel',sortable:!1},
          {text:'Package',value:'package',sortable:!1},
          {text:'SERVICE FEE',value:'service_fee',sortable:!1},
          {text:'DOCUMENTATIONS',value:'documentation',sortable:!1},
          { text: 'ADDED BY', value: 'user.name',sortable: !1 },
          { text: 'DATE CREATED', value: 'created_at',sortable: !1 },
       
      
        ],
  
       }
        
        },
        mounted(){
          this.getItem();
          this.createdItem();
        },
        methods: {
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
            createItemCode(){
                this.form.post('api/itemcode')
                .then((response)=>{
                  this.spinner = true;
                  Fire.$emit('createdItem')
                  $('#addNew').modal('hide');
                  toast.fire({
                    type: 'success',
                    title: 'Item Code Created Successfully'
                  });
                  
                
                })
                setTimeout(()=> {this.spinner = false},1000)
            },
            getItem(){
              axios.get('api/itemcode').then(({data}) => this.itemcodes = data)
            },
            createdItem(){
              this.getItem()
              Fire.$on('createdItem',()=>{
                this.getItem()
              })
            },
            viewItemCode(item){
              this.form.id = item.id
              this.form.ticket = item.ticket
              this.form.hotel = item.hotel
              this.form.tax = item.tax
              this.form.package = item.package
              this.form.service_fee = item.service_fee
              this.form.document = item.documentation
               $('#viewdetails').modal('show')

            },
            updateItemCode(){
              this.form.put('api/itemcode/'+this.form.id)
              .then(()=>{
                 this.spinner = true;
                  $('#viewdetails').modal('hide')
                     toast.fire(
                        'Updated!',
                        'Item Code has been updated.',
                        'success'
                        )
                       Fire.$emit('createdItem')
                        setTimeout(()=> {this.spinner = false},1000)
                    this.disabled = 0
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
#addmode input{
  margin-top: 8px;
}
input[type=number]{
  width:100%;
}
</style>