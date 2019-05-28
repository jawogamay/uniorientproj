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
    <title>Material Pro Admin Template - The Most Complete & Trusted Bootstrap 4 Admin Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="/assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="/assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="/assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="/css/colors/blue.css" id="theme" rel="stylesheet">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
     <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">
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
body{
    font-family: Inconsalata;
}
table.v-table tbody td, table.v-table tbody th{
    height: 20px;
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
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                         <!-- Light Logo text -->    
                         <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                                          </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                       
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/users/1.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="../assets/images/users/1.jpg" alt="user"></div>
                                            <div class="u-text">
                                                <h4>Steave Jobs</h4>
                                                <p class="text-muted">varun@gmail.com</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                                    <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                                    <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                     
                    </ul>
                </div>
            </nav>
        </header>
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
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">DASHBOARD </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="index.html">COMPANY PROFILE</a></li>
                                <li><a href="index2.html">BRANCHES</a></li>
                                <li><a href="index3.html">USER GROUP</a></li>
                                <li><a href="index4.html">BANKS</a></li>
                            </ul>
                        </li>

                           <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="fas fa-file"></i><span class="hide-menu">SETUP FILES </span></a>
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
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="fas fa-shopping-cart"></i><span class="hide-menu">SALES </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/salesagreement">SALES AGREEMENT</a></li>
                                <li><a href="app-email-detail.html">TC MONITORING</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="fas fa-plane"></i><span class="hide-menu">AIRLINE TICKETS </span></a>
                            <ul aria-expanded="false" class="collapse">
                                  <li><a href="ui-cards.html">IATA - AMADEUS</a></li>
                                <li><a href="ui-user-card.html">IATA - SABRE</a></li>
                                <li><a href="ui-buttons.html">PAL - DOM</a></li>
                                <li><a href="ui-modals.html">SKYLINER</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">PURCHASES</span></a>
                            <ul aria-expanded="false" class="collapse">
                                 <li><a href="form-basic.html">PO</a></li>
                                <li><a href="form-layout.html">CASH SLIP</a></li>
                            </ul>
                        </li>
                         <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">PAYMENTS</span></a>
                            <ul aria-expanded="false" class="collapse">
                                 <li><a href="table-basic.html">OFFICIAL RECIEPT</a></li>
                                <li><a href="table-layout.html">PROVISIONAL RECEIPT</a></li>
                                <li><a href="table-data-table.html">DISCOUNT SLIP</a></li>
                                <li><a href="table-footable.html">CHECK VOUCHER</a></li>
                                <li><a href="table-jsgrid.html">CASH VOUCHER</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="fas fa-shopping-cart"></i><span class="hide-menu">REFUNDS</span></a>
                          
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
