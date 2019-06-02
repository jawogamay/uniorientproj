<template>
    <div class="container-fluid mt-4">
      
            <full-calendar :events="fcEvents" locale="en"></full-calendar>
    </div>
</template>
<script type="text/javascript">
    var demoEvents = [
    {
      title : 'Test',
      start : '2019-04-25',
      end : '2019-04-27'
    },
    {
        title: 'Test ',
         start : '2019-04-05',
        end : '2019-04-15'

    }
]
export default {
  data () {
    return {
      fcEvents : demoEvents,
      customers: [],
      posts:[],
      transactions:[]

    }
  },
  mounted(){
   
  },
  components : {
    'full-calendar': require('vue-fullcalendar')    
  },
  methods:{
    


  }
};
</script>