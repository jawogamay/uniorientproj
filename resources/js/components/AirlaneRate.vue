<template>
  <v-app>
    <div class="container-fluid">
      <div class="row pt-5">
             <div class="col-md-12">
                <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Airlane Rate </h3>
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
        <td class="text-xs-left">PHP {{ props.item.airlane }}</td>
        <td class="text-xs-left">PHP {{ props.item.usdphp }}0</td>
        <td class="text-xs-left">PHP {{ props.item.phpusd }}.00</td>
        <td class="text-xs-left">{{ props.item.verified }}</td>
        <td class="text-xs-left">{{ props.item.notes }}</td>
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
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Add Post</h5>
                            <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update User's Info</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>   
                        </div>
                       <form @submit.prevent="editmode ? updateUser() :createPost()">
                        <div class="modal-body">
                            <input type="">
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
      </v-app>
</template>
<script type="text/javascript">
    export default{
        data(){
            return{
                 search: '',
        headers: [
          {
            text: 'DATE',
            align: 'left',
            sortable: false,
            value: 'date'
          },
          { text: 'AIRLANTE RATE', value: 'airlane' },
          { text: 'USD to PHP', value: 'usdphp' },
          { text: 'PHP to USD', value: 'phpusd' },
          { text: 'VERIFIED BY', value: 'verified' },
          { text: 'NOTES', value: 'notes' },
          {text: 'ACTIONS', value: 'action'}
        ],
        desserts: [
          {
            date: 'JAN 15, 2019',
            airlane: 52.22,
            usdphp: 54.20,
            phpusd: 50.00,
           
          },
          {
            date: 'JAN 19, 2019',
            airlane: 52.22,
            usdphp: 54.20,
            phpusd: 50.00,
           
          },
          {
            date: 'JAN 24, 2019',
            airlane: 52.22,
            usdphp: 54.20,
            phpusd: 50.00,
           
          },
          {
            date: 'Feb 15, 2019',
            airlane: 52.22,
            usdphp: 54.20,
            phpusd: 50.00,
           
          },
          {
            date: 'AUG 15, 2019',
            airlane: 52.22,
            usdphp: 54.20,
            phpusd: 50.00,
           
          }
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