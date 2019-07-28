<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
       <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Uniorient Travel Agency</title>
    <!-- Bootstrap Core CSS -->
    <link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- chartist CSS -->
   {{--  <link href="/assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="/assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet"> --}}
    <!--This page css - Morris CSS -->
    <link href="/assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
  
    <!-- You can change the theme colors from here -->
    <link href="/css/colors/blues.css" id="theme" rel="stylesheet">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
     <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">
       <link href="/css/test.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->s
     <style type="text/css">
            
         .collapse.in{
            background: #156772;
         }
         @font-face{
  font-family: Inconsalata;
  src:url(/fonts/Inconsolata.otf);
}
.page-wrapper,.card-header,.card-title,.form-control,label { 
    font-family: Inconsalata;
}
.my-data-table {
  display: flex;
  flex-direction: column;
}
.v-card__title{
        padding: 1px 10px !important;
}
.my-data-table .v-datatable.v-table {
  order: -1;
}
.fa-eye{
    color:#ffffff !important;
}
.theme--light.v-datatable .v-datatable__actions{
    margin-top:-10px !important;
}
.v-input{
   margin-right: 20% !important;
}
.card .v-input__slot{
    margin-left: 50% !important;
    max-width: 56% !important;
}
.v-datatable__actions__range-controls{
            margin-top: -36px;
}

p,h1,h2,h3,h4,h5,h6,th,textarea{
    font-family:Inconsalata !important;
}
th{
    font-size:14px !important;
}
.fa-eye{
    color:#03317a;
}
::placeholder{
    color:#ededed;
}
.form-control{
    color:#4d4f50;
}
.ui.search.selection.dropdown > input.search[data-v-3a0c7bea],.ui.search.selection.dropdown > input.search[data-v-3a0c7bea]{
    font-family: Inconsalata;
    font-size: 15px;
}

.form-control,label{
    font-size:15px;
}
.modal ::placeholder{
 color:rgba(191, 191, 191, 0.87);
}
.card .v-input__slot{
  margin-left: 60%;
  max-width: 40%;
  
}
.fa-eye{
    font-size: 15px;
}
.theme--light.v-table tbody tr:hover:not(.v-datatable__expand-row){
    background: #bae2ff  !important;
}
.v-text-field{
    margin-top:-21px !important;

}
.btn-primary,.btn-success{
background: #03317a;
border-color: #03317a;
}
.btn-warning{
  background: green;
border-color: green;  
}
.btn-warning:hover{
     background: green;
border-color: green;  
}
label{
    color:#676464;
   
}
.v-text-field>.v-input__control>.v-input__slot:before{
  border-style: none !important;
}
body{
    font-family: Inconsalata;
}
.ui.search.dropdown > .text[data-v-3a0c7bea]{
  font-family: Inconsalata;
    font-weight: 400;
    color:rgba(39, 38, 38, 0.87);
}   

table.v-table tbody td, table.v-table tbody th{
    height: 20px;
    
     font-family: Inconsalata;
}
tbody tr:nth-of-type(odd) {
   background-color: rgba(0, 0, 0, .05);
 }
 .primary{
    background: #03317a !important;
 }
#this-left{
    margin-left: 43%;
}

.v-icon{
    font-size:14px;
}
.sidebar-nav ul li .left-nav {
    right: 0;
}
.v-text-field input{
  height: 24px;
}
.theme--light.v-label{
  color: rgba(167, 161, 161, 0.54) !important;
}
.modal-body .v-text-field .v-label{
  top:-7px !important;
}
/*.ui.fluid.dropdown[data-v-3a0c7bea]{
  height: 31px !important;
}*/
.ui.search.dropdown > .text[data-v-3a0c7bea]{
  left: 0px;
  top:-3px !important;
}
.modal-body [disabled]{
    background: #e9ecef;
}
.theme--light.v-datatable thead th.column.sortable.active, .theme--light.v-datatable thead th.column.sortable.active .v-icon, .theme--light.v-datatable thead th.column.sortable:hover{
    color:#005ef5;
}
.v-datatable__actions .v-btn:last-of-type{
      margin-left: -23px;
}
.theme--light.v-table thead th{
  color:#fff;
  font-weight: 800;
}
     </style>

</head>

<body class="fix-header fix-sidebar card-no-border logo-center">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div id="app">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">PERSONAL</li>
                        <li style="padding-left: 10px;">
                            <img src="/assets/images/logo.jpg" width="40" height="40">
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="hide-menu">DASHBOARD |</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="index.html" class="dropdown-item">COMPANY PROFILE</a></li>
                                <li><a href="index2.html" class="dropdown-item">BRANCHES</a></li>
                                <li><a href="index3.html" class="dropdown-item">USER GROUP</a></li>
                                <li><a href="index4.html" class="dropdown-item">BANKS</a></li>
                            </ul>
                        </li>
<!-- 
                           <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="hide-menu">| SETUP FILES |</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/airlanerate">AIRLINE RATE</a></li>
                                <li><a href="/customer">CUSTOMER ACCOUNTS</a></li>
                                <li><a href="/passenger">PASSENGER DETAILS</a></li>
                                <li><a href="/itemcode">ITEM CODE</a></li>
                                <li><a href="/booklet">SA BOOKLET SERIES</a></li>
                                <li><a href="/employee">USER</a></li>
                                <li><a href="/supplier">SUPPLIER</a></li>
                                <li><a href="#" class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                    <span class="hide-menu">START SERIES</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                         <li><a href="/petty">BOX PETTY CASH</a></li>
                                         <li><a href="/petty">SOA#</a></li>
                                         <li><a href="/petty">BOOKLET</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li> -->
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="hide-menu">SALES |</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/salesagreement" class="dropdown-item">SALES AGREEMENT</a></li>
                                <li><a href="app-email-detail.html" class="dropdown-item">TC MONITORING</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="hide-menu">AIRLINE TICKETS |</span></a>
                            <ul aria-expanded="false" class="collapse">
                                  <li><a href="ui-cards.html" class="dropdown-item">IATA - AMADEUS</a></li>
                                <li><a href="ui-user-card.html" class="dropdown-item">IATA - SABRE</a></li>
                                <li><a href="ui-buttons.html" class="dropdown-item">PAL - DOM</a></li>
                                <li><a href="ui-modals.html" class="dropdown-item">SKYLINER</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="hide-menu">PURCHASES |</span></a>
                            <ul aria-expanded="false" class="collapse">
                                 <li><a href="form-basic.html" class="dropdown-item">PO</a></li>
                                <li><a href="form-layout.html" class="dropdown-item">CASH SLIP</a></li>
                            </ul>
                        </li>
                         <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="hide-menu">PAYMENTS |</span></a>
                            <ul aria-expanded="false" class="collapse">
                                 <li><a href="table-basic.html" class="dropdown-item">OFFICIAL RECIEPT</a></li>
                                <li><a href="table-layout.html" class="dropdown-item">PROVISIONAL RECEIPT</a></li>
                                <li><a href="table-data-table.html" class="dropdown-item">DISCOUNT SLIP</a></li>
                                <li><a href="table-footable.html" class="dropdown-item">CHECK VOUCHER</a></li>
                                <li><a href="table-jsgrid.html" class="dropdown-item">CASH VOUCHER</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="hide-menu"> REFUNDS</span></a>
                          
                        </li>
                          <li id="this-left">
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="fas fa-cog"></i></a>
                                <ul aria-expanded="false" class="collapse left-nav" >
                                <li><a href="/airlinerate" class="dropdown-item">AIRLINE RATE</a></li>
                                <li><a href="/customer" class="dropdown-item">CUSTOMER ACCOUNTS</a></li>
                                <li><a href="/passenger" class="dropdown-item">PASSENGER DETAILS</a></li>
                                <li><a href="/itemcode" class="dropdown-item">ITEM CODE</a></li>
                                <li><a href="/booklet" class="dropdown-item">SA BOOKLET SERIES</a></li>
                                <li><a href="/employee" class="dropdown-item">USER</a></li>
                                <li><a href="/supplier" class="dropdown-item">SUPPLIER</a></li>
                                <li><a href="#" class="has-arrow" href="#" aria-expanded="false">
                                    <span class="hide-menu">START SERIES</span></a>
                                    <ul aria-expanded="false" class="collapse left-nanv">
                                         <li><a href="/petty">BOX PETTY CASH</a></li>
                                         <li><a href="/soa">SOA#</a></li>
                                         <li><a href="/startbooklet">BOOKLET</a></li>
                                         <li><a href="/or">OR</a></li>
                                         <li><a href="/ar">AR</a></li>
                                         <li><a href="/pr">PR</a></li>
                                         <li><a href="/po">PO</a></li>
                                         <li><a href="/chv">CHV</a></li>
                                         <li><a href="/cv">CV</a></li>
                                    </ul>
                                </li>
                            </ul>
                          
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="fas fa-user"></i></a>
                            <ul aria-expanded="false" class="collapse left-nav" style="text-align: center; margin: 0 auto;">
                              <img src="/assets/images/user.png"> 
                              <h4 style="color:#fff;">{{Auth::user()->name}}</h4> 
                              <p>{{Auth::user()->name[0].substr(Auth::user()->name,strpos(Auth::user()->name, " "))}}{{-- {{substr(Auth::user()->name,strpos(Auth::user()->name, " "))}} --}}</p>
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                            </ul>
                        </li>
        
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>


        <div class="page-wrapper">
             <router-view></router-view>


        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
       
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
</div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="/js/app.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
  {{--   <script src="/assets/plugins/popper/popper.min.js"></script>
    <script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script> --}}
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    {{-- <script src="/js/waves.js"></script> --}}
    <!--Menu sidebar -->
    <script src="/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
   {{--  <script src="/assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script> --}}
    <!--c3 JavaScript -->
    <script src="/assets/plugins/d3/d3.min.js"></script>
    <script src="/assets/plugins/c3-master/c3.min.js"></script>
    <!-- Chart JS -->
    <script src="/js/dashboard6.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
