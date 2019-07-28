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
      <h3 class="card-title">SUPPLIER INFORMATION</h3>
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
      :items="suppliers"
      :search="search"
      :rows-per-page="25" :rows-per-page-items="[25]"
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
  
               <td  class="text-xs-left"><button class="btn btn-success --primary" @click="viewEmployee(props.item)">VIEW <i class="fa fa-eye"></i></button>
    </td>     
        <td class="text-xs-left">{{ props.item.company | capitalize }}</td>
        <td class="text-xs-left">{{ props.item.address | capitalize}}</td>
        <td class="text-xs-left">{{ props.item.tel | capitalize }}</td>
        <td class="text-xs-left">{{ props.item.email | capitalize}}</td>
       <td class="text-xs-left" v-if="props.item.notes === null"></td>
         <td class="text-xs-left" v-else-if="props.item.notes.length<20">{{ props.item.notes | capitalize}}</td>
        <td class="text-xs-left" v-else-if="props.item.notes.length>20">{{ props.item.notes.substring(0,20)+"..." | capitalize}}</td>
    
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
                            <h5 class="modal-title" id="addNewLabel">ADD SUPPLIER</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>   
                        </div>
                       <form @submit.prevent="createSupplier()" >
                        <div class="modal-body">
                          <input type="text" class="form-control" name="company" placeholder="ENTER COMPANY NAME" v-model="form.company">
                          <br>
                          <input type="text" class="form-control" name="address" placeholder="ENTER COMPANY ADDRESS" v-model="form.address">
                          <div class="row">
                            <div class="col-md-6">
                                <input type="number" class="form-control" placeholder="ENTER TELEPHONE NUMBER" name="tel" v-model="form.tel">
                            </div>

                            <div class="col-md-6">
                                <input type="number" class="form-control" placeholder="ENTER FAX NUMBER" name="fax" v-model="form.fax">
                            </div>
                          </div>
                          <input type="number" class="form-control" placeholder="ENTER MOBILE NUMBER" name="mobile" v-model="form.mobile">
                          <br>
                          <input type="email" class="form-control" placeholder="ENTER EMAIL ADDRESS" name="email" v-model="form.email">
                          <br>
                          <label class="mt-2"> NOTES: </label>   
                           <textarea name="notes" v-model="form.notes">  
                            </textarea>
                      </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                        <button type="submit" class="btn btn-primary">SUBMIT <i v-if="spinner"class="fa fa-spinner fa-spin"></i></button>
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
                          <img src="/assets/images/user.jpg" style="width:100px; height:100px;"><h4 style="margin-top:50px;">{{form.name}}<br> {{form.code}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>   
                        </div>
                        <div class="modal-body">
                            <h5><b>EMAIL:</b> {{form.email}}</h5>
                            <h5><b>TYPE:</b> {{form.type | capitalize}}</h5>
                            <h5><b>DATE OF BIRTH:</b> {{form.dob | capitalize | myDate}}</h5>
                            <h5><b>HIRED DATE:</b> {{form.hired | capitalize | myDate}}</h5>
                        </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                     </div>
              
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
                suppliers:[],
                pagination: {
                  sortBy: 'name'
                },
                 form: new Form({
                    id:'',
                    company:'',
                    address:'',
                    tel:'',
                    fax:'',
                    mobile:'',
                    email:'',
                    notes:''
                 }),
        headers: [
         
          { text: 'NAME OF COMPANY', value: 'company',sortable: !1},
          { text: 'ADDRESS OF COMPANY', value: 'address',sortable: !1 },
          { text: 'TELEPHONE NUMBER', value: 'tel',sortable: !1 },
          { text: 'EMAIL', value: 'email',sortable: !1 },
          {text: 'NOTES', value: 'notes',sortable: !1},
      
        ],
  
       }
        
        },
        mounted(){
          this.getSupplier();
          this.createdSuppier();
        },
        methods: {
            codeAndNameAndDesc (item) {
        return `${item.account_name | capitalize } `
        },
            changeSort (column) {
      if (this.pagination.sortBy === column) {
        this.pagination.descending = !this.pagination.descending
      } else {
        this.pagination.sortBy = column
        this.pagination.descending = false
      }
    },
            newModal(){
               
                this.form.reset();
                $('#addNew').modal('show');
            },
            createSupplier(){
                this.form.post('api/supplier')
                .then((response)=>{
                  this.spinner = true;
                  Fire.$emit('createdSuppier')
                  $('#addNew').modal('hide');
                  toast.fire({
                    type: 'success',
                    title: 'Supplier Created Successfully'
                  });
                  
                
                })
                setTimeout(()=> {this.spinner = false},1000)
            },
            getSupplier(){
              axios.get('api/supplier').then(({data}) => this.suppliers = data)
            },
            createdSuppier(){
              this.getSupplier()
              Fire.$on('createdSuppier',()=>{
                this.getSupplier()
              })
            },
            viewEmployee(item){
              this.form.name = item.name
              this.form.email = item.email
              this.form.type = item.type
              this.form.code = item.code
              this.form.dob = item.dob
              this.form.hired = item.hired
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
  font-size:18px;
}

.ui.selection.dropdown[data-v-3a0c7bea]{
  min-height: 20px;
  height: 30px;
}

table.v-table tbody td, table.v-table tbody th{
  height: 24px;
}
textarea{
  height:150px; width:100%;border: 1px solid #ced4da;border-radius: .25rem;
                              transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.item,.text{
    font-family: Inconsalata;
    font-weight: 800;
}


/*.v-input__slot{
  margin-left: 71%;
  width: 10%;
}*/
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

.form-control{
  min-height: 20px !important;
  height: 29px !important;
}
.modal-body .form-control{
  margin-top: 10px;
}
input[type=number]{
  width:100%;
}
</style>