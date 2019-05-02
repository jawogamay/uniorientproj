<template>
    <div class="container-fluid">
            <div class="pt-5">
                  <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-md-4">
                        <div class="card card-inverse card-primary">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="m-r-20 align-self-center">
                                        <h1 class="text-white"><i class="ti-user"></i></h1>
                                    </div>
                                    <div>
                                        <h3 class="card-title">Customer</h3>
                                        <h6 class="card-subtitle">2019</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 align-self-center">
                                        <h2 class="font-light text-white">34</h2>
                                    </div>
                                    <div class="col-8 p-t-10 p-b-20 align-self-center">
                                        <div class="usage chartist-chart" style="height:65px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-4 col-md-4">
                        <div class="card card-inverse card-success">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="m-r-20 align-self-center">
                                        <h1 class="text-white"><i class="ti-thought"></i></h1>
                                    </div>
                                    <div>
                                        <h3 class="card-title">Employee</h3>
                                        <h6 class="card-subtitle">2019</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 align-self-center">
                                        <h2 class="font-light text-white">21</h2>
                                    </div>
                                    <div class="col-8 p-t-10 p-b-20 text-right">
                                        <div class="spark-count" style="height:65px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-4 col-md-4">
                        <div class="card card-inverse card-warning">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="m-r-20 align-self-center">
                                        <h1 class="text-white"><i class="ti-thought"></i></h1>
                                    </div>
                                    <div>
                                        <h3 class="card-title">Supplier</h3>
                                        <h6 class="card-subtitle">2019</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 align-self-center">
                                        <h2 class="font-light text-white">38</h2>
                                    </div>
                                    <div class="col-8 p-t-10 p-b-20 text-right">
                                        <div class="spark-count" style="height:65px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                  
                    <!-- Column -->
                </div>

             </div>
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