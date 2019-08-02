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
      <h3 class="card-title">START SERIES</h3>
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
      :items="startfiles"
      :search="search"
       :rows-per-page="50" :rows-per-page-items="[50]"
      class="elevation-1 my-data-table"
     
    >
     <template slot="headers" slot-scope="props">
  <tr style="height:30px;background:#000;">
    <th>
      <button class="btn btn-warning" @click="newModal" v-show="count == 0 ">ADD &nbsp;<v-icon color="#fff">add_box</v-icon></button>
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
    <td class="text-xs-left"><button class="btn btn-success --primary" @click="viewStartFiles(props.item)">VIEW <i class="fa fa-eye"></i></button>
     </td>
        <td class="text-xs-left">{{ props.item.startbooklet}}</td>
        <td class="text-xs-left">{{ props.item.startsoa}}</td>
        <td class="text-xs-left">{{ props.item.startor}}</td>
        <td class="text-xs-left">{{ props.item.startar}}</td>
        <td class="text-xs-left">{{ props.item.startpr}}</td>
        <td class="text-xs-left">{{ props.item.startpo}}</td>
        <td class="text-xs-left">{{ props.item.startchv}}</td>
        <td class="text-xs-left">{{ props.item.startcv}}</td>
        <td class="text-xs-left">{{ props.item.startboxpetty}}</td>
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
                            <h5 class="modal-title" v-show="!editmode" id="addNewLabel">ADD STARTING SERIES</h5>
                            <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update User's Info</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>   
                        </div>
                       <form @submit.prevent="createStartFiles()">
                        <div class="modal-body modal-add">
                          <input class="form-control" type="text" name="startbooklet" v-model="form.startbooklet" placeholder="BOOKLET STARTING SERIES">
                          <br>
                          <input class="form-control" type="text" name="startsoa" v-model="form.startsoa" placeholder="STATEMENT OF ACCOUNT STARTING SERIES">
                          <br>
                          <input type="text" name="startor" class="form-control" v-model="form.startor" placeholder="OFFICIAL RECEIPT STARTING SERIES">
                          <br>
                          <input type="text" class="form-control" name="startar" v-model="form.startar" placeholder="AR STARTING SERIES">
                          <br>
                          <input type="text" class="form-control" name="startpr" v-model="form.startpr" placeholder="PR STARTING SERIES">
                          <br>
                           <input type="text" class="form-control" name="startpo" v-model="form.startpo" placeholder="PURCHASE ORDER STARTING SERIES">
                           <br>
                           <input type="text" class="form-control" name="startchv" v-model="form.startchv" placeholder="CHECK VOUCHER STARTING SERIES">
                           <br>
                            <input type="text" class="form-control" name="startcv" v-model="form.startcv" placeholder="CASH VOUCHER STARTING SERIES">
                            <br>
                            <input type="text" class="form-control" name="startpettycash" v-model="form.startpettycash" placeholder="BOX PETTY CASH STARTING SERIES">
                            <br>
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
                        <form @submit.prevent = "updateStartFiles()">
                          <div class="modal-body">
                              <div class="form-inline">
                                  <h5 for="startbooklet">BOOKLET: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
                                  <input type="text" name="startbooklet" v-model="form.startbooklet" class="form-control" :disabled="disabled == 0 ? true : false"
                                  :class="{'is-invalid': form.errors.has('startbooklet') }">
                              </div>

                              <div class="form-inline">
                                  <h5 for="startsoa">STATEMENT OF ACCOUNT: </h5>
                                  <input type="text" name="startsoa" v-model="form.startsoa" class="form-control" :disabled="disabled == 0 ? true : false" :class="{'is-invalid': form.errors.has('startsoa') }">
                              </div>

                              <div class="form-inline">
                                  <h5 for="startor">OFFICIAL RECEIPT: &nbsp;&nbsp;&nbsp;</h5>
                                  <input type="text" name="startor" v-model="form.startor" class="form-control" :disabled="disabled == 0 ? true : false" :class="{'is-invalid': form.errors.has('startor') }">
                              </div>

                              <div class="form-inline">
                                  <h5 for="startar">AR: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
                                  <input type="text" name="startar" v-model="form.startar" class="form-control" :disabled="disabled == 0 ? true : false" :class="{'is-invalid': form.errors.has('startar') }">
                              </div>

                              <div class="form-inline">
                                  <h5 for="startpr">PROVISIONAL: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
                                  <input type="text" name="startpr" v-model="form.startpr" class="form-control" :disabled="disabled == 0 ? true : false" :class="{'is-invalid': form.errors.has('startpr') }">
                              </div>
                                <div class="form-inline">
                                  <h5 for="startpo">PURCHASE ORDER: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
                                  <input type="text" name="startpo" v-model="form.startpo" class="form-control" :disabled="disabled == 0 ? true : false" :class="{'is-invalid': form.errors.has('startpo') }">
                              </div>
                                 <div class="form-inline">
                                  <h5 for="startchv">CHECK VOUCHER: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
                                  <input type="text" name="startchv" v-model="form.startchv" class="form-control" :disabled="disabled == 0 ? true : false" :class="{'is-invalid': form.errors.has('startchv') }">
                              </div>
                                 <div class="form-inline">
                                  <h5 for="startcv">CASH VOUCHER: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
                                  <input type="text" name="startcv" v-model="form.startcv" class="form-control" :disabled="disabled == 0 ? true : false" :class="{'is-invalid': form.errors.has('startcv') }">
                              </div>
                                 <div class="form-inline">
                                  <h5 for="startpettycash">BOX PETTY CASH: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
                                  <input type="text" name="startpettycash" v-model="form.startpettycash" class="form-control" :disabled="disabled == 0 ? true : false" :class="{'is-invalid': form.errors.has('startpettycash') }">
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
                startfiles:[],
                disabled:0,
                count:0,
                  pagination: {
      sortBy: 'name'
    },
                 form: new Form({
                    id:'',
                    startbooklet:'',
                    startar:'',
                    startsoa:'',
                    startor:'',
                    startpr:'',
                    startpo:'',
                    startchv:'',
                    startcv:'',
                    startpettycash:''

                 }),
        headers: [
         
          { text: 'BOOKLET', value: 'startbooklet',sortable: !1},
          { text: 'SOA', value: 'startsoa',sortable: !1},
          { text: 'OR', value: 'startor',sortable: !1},
          { text: 'AR', value: 'startar',sortable: !1},
          { text: 'PR', value: 'startpr',sortable: !1},
          { text: 'PO', value: 'startpo',sortable: !1 },
          { text: 'CHV', value: 'startchv',sortable: !1},
          { text: 'CV', value: 'startcv',sortable: !1},
          { text: 'BOX PETTY CASH', value: 'startpettycash',sortable: !1},
          { text: 'DATE CREATED', value: 'created_at',sortable: !1 },
       
      
        ],
  
       }
        
        },
        mounted(){
          this.getStartFiles();
          this.createdStartFiles();
          this.countStart();

        },
        methods: {
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
            updateStartFiles(){
              this.form.put('api/start/'+this.form.id)
              .then(()=>{
                 this.spinner = true;
                  $('#viewdetails').modal('hide')
                     toast.fire(
                        'Updated!',
                        'StartFiles has been updated.',
                        'success'
                        )
                       Fire.$emit('createdStartFiles')
                        setTimeout(()=> {this.spinner = false},1000)
                    this.disabled = 0
              })
            },
            countStart(){
              axios.get('api/countStart').then(({data})=> this.count = data)
            },
            createStartFiles(){
                this.form.post('api/start')
                .then((response)=>{
                  this.spinner = true;
                  Fire.$emit('createdStartFiles')
                  $('#addNew').modal('hide');
                  toast.fire({
                    type: 'success',
                    title: 'Start Files Series Created Successfully'
                  });
                  
                
                })
                setTimeout(()=> {this.spinner = false},1000)
            },
            getStartFiles(){
              axios.get('api/start').then(({data}) => this.startfiles = data)
            },
            createdStartFiles(){
              this.getStartFiles()
              Fire.$on('createdStartFiles',()=>{
                this.getStartFiles()
              })
            },
            viewStartFiles(item){
              this.form.id = item.id
              this.form.startbooklet = item.startbooklet
              this.form.startsoa = item.startsoa
              this.form.startcv = item.startcv
              this.form.startchv = item.startchv
              this.form.startpettycash = item.startboxpetty
              this.form.startpo = item.startpo
              this.form.startpr = item.startpr
              this.form.startor = item.startor
              this.form.startar = item.startar
               $('#viewdetails').modal('show')

            },
         /*   viewEmployee(item){
              this.form.name = item.name
              this.form.email = item.email
              this.form.type = item.type
              this.form.code = item.code
              this.form.dob = item.dob
              this.form.hired = item.hired
               $('#viewdetails').modal('show')

            }*/
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
.modal-add input{
  margin-top:8px;
}
.v-alert{
    color:#f00;
    border-color:#ffffff;
    padding: 5px;

}
</style>