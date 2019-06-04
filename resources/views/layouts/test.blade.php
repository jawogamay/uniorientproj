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
    <link href="/assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="/assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
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
<![endif]-->
     <style type="text/css">

         .collapse.in{
            background: #e8e8e8;
         }
         @font-face{
  font-family: Inconsalata;
  src:url(/fonts/Inconsolata.otf);
}
.page-wrapper,.card-header,.card-title,.form-control,label { 
    font-family: Inconsalata;
}
::placeholder{
    color:#000000;
}

.form-control{
    color:#000000;
}
.form-control,label{
    font-size:18px;
}
label{
    color:#1e88e5;
   
}


body{
    font-family: Inconsalata;
}
table.v-table tbody td, table.v-table tbody th{
    height: 20px;
    
     font-family: Inconsalata;
}


table.v-table thead th.sortable{
    font-weight: 800;
    font-size: 14px;
    color:rgb(0,0,0);
}
#this-left{
    padding-left: 22%;
}
.v-icon{
    font-size:14px;
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
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="hide-menu">DASHBOARD |</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="index.html">COMPANY PROFILE</a></li>
                                <li><a href="index2.html">BRANCHES</a></li>
                                <li><a href="index3.html">USER GROUP</a></li>
                                <li><a href="index4.html">BANKS</a></li>
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
                                <li><a href="/salesagreement">SALES AGREEMENT</a></li>
                                <li><a href="app-email-detail.html">TC MONITORING</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="hide-menu">AIRLINE TICKETS |</span></a>
                            <ul aria-expanded="false" class="collapse">
                                  <li><a href="ui-cards.html">IATA - AMADEUS</a></li>
                                <li><a href="ui-user-card.html">IATA - SABRE</a></li>
                                <li><a href="ui-buttons.html">PAL - DOM</a></li>
                                <li><a href="ui-modals.html">SKYLINER</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="hide-menu">PURCHASES |</span></a>
                            <ul aria-expanded="false" class="collapse">
                                 <li><a href="form-basic.html">PO</a></li>
                                <li><a href="form-layout.html">CASH SLIP</a></li>
                            </ul>
                        </li>
                         <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="hide-menu">PAYMENTS |</span></a>
                            <ul aria-expanded="false" class="collapse">
                                 <li><a href="table-basic.html">OFFICIAL RECIEPT</a></li>
                                <li><a href="table-layout.html">PROVISIONAL RECEIPT</a></li>
                                <li><a href="table-data-table.html">DISCOUNT SLIP</a></li>
                                <li><a href="table-footable.html">CHECK VOUCHER</a></li>
                                <li><a href="table-jsgrid.html">CASH VOUCHER</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="hide-menu"> REFUNDS</span></a>
                          
                        </li>
                          <li id="this-left">
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="fas fa-cog"></i></a>
                                <ul aria-expanded="false" class="collapse">
                                <li><a href="/airlinerate">AIRLINE RATE</a></li>
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
                          
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="fas fa-user"></i></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="index.html">COMPANY PROFILE</a></li>
                                <li><a href="index2.html">BRANCHES</a></li>
                                <li><a href="index3.html">USER GROUP</a></li>
                                <li><a href="index4.html">BANKS</a></li>
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
    <script src="/assets/plugins/popper/popper.min.js"></script>
    <script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="/js/waves.js"></script>
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
    <script src="/assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
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
