<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin panel for Applications">
    <meta name="author" content="backstage">

    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <title>SWIPE - Admin Dashboard</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'swipe') }}</title>

    <!-- Styles -->
    {{-- <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{  asset('plugins/morris/morris.css') }}">

    <!-- App css -->
    <link href={{  asset('css/bootstrap.min.css')  }} rel="stylesheet" type="text/css" />
    <link href={{  asset('css/core.css')  }} rel="stylesheet" type="text/css" />
    <link href={{  asset('css/components.css')  }} rel="stylesheet" type="text/css" />
    <link href={{  asset('css/icons.css')  }} rel="stylesheet" type="text/css" />
    <link href={{  asset('css/pages.css')  }} rel="stylesheet" type="text/css" />
    <link href={{  asset('css/menu.css')  }} rel="stylesheet" type="text/css" />
    <link href={{  asset('css/responsive.css')  }} rel="stylesheet" type="text/css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="{{  asset('js/modernizr.min.js') }}"></script>
</head>
<body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="home" class="logo"><span>SWIPE</span></span><i class="zmdi zmdi-layers"></i>SG</a>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">

                        <!-- Page title -->
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <button class="button-menu-mobile open-left">
                                    <i class="zmdi zmdi-menu"></i>
                                </button>
                            </li>
                            <li>
                                <h4 class="page-title">Dashboard</h4>
                            </li>
                        </ul>

                        <!-- Right(Notification and Searchbox -->
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <!-- Notification -->
                                <div class="notification-box">
                                    <ul class="list-inline m-b-0">
                                        <li>
                                            <a href="javascript:void(0);" class="right-bar-toggle">
                                                <i class="zmdi zmdi-notifications-none"></i>
                                            </a>
                                            <div class="noti-dot">
                                                <span class="dot"></span>
                                                <span class="pulse"></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- End Notification bar -->
                            </li>
                            <li class="hidden-xs">
                                <form role="search" class="app-search">
                                    <input type="text" placeholder="Search..."
                                           class="form-control">
                                    <a href=""><i class="fa fa-search"></i></a>
                                </form>
                            </li>
                        </ul>

                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <!-- User -->
                    {{-- <div class="user-box">
                        <div class="user-img">
                            <img src="{{  asset('images/users/avatar-1.jpg') }}" alt="user-img" title="Mat Helme" class="img-circle img-thumbnail img-responsive">
                            <div class="user-status offline"><i class="zmdi zmdi-dot-circle"></i></div>
                        </div>
                        <h5><a href="#">Shashank</a> </h5>
                        <ul class="list-inline">
                            <li>
                                <a href="#" >
                                    <i class="zmdi zmdi-settings"></i>
                                </a>
                            </li>

                            <li>
                                <a href="#" class="text-custom">
                                    <i class="zmdi zmdi-power"></i>
                                </a>
                            </li>
                        </ul>
                    </div> --}}
                    <!-- End User -->

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul>
                            <li class="text-muted menu-title">Navigation</li>

                            <li>
                                <a href="{{ url('admin/home')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i> <span> Dashboard </span> </a>
                            </li>

                           <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-invert-colors"></i> <span> Users</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('admin/userlists')}}">User List</a></li>                                   
                                    <li><a href="{{ url('admin/washerlists')}}">Washer List</a></li>                                   
                                </ul>
                            </li>
                            {{-- <li class="has_sub">
                               <a href="javascript:void(0);" class="waves-effect"> <i class="fa fa-arrows-h"></i> <span> Slider Images</span><span class="menu-arrow"></span> </a>
                               <ul class="list-unstyled">
                                   <li><a href="{{ url('admin/slider_img')}}">Slider image list</a></li>
                                   <li><a href="{{ url('admin/slider_img/create')}}">Add slider image</a></li>
                               </ul>
                           </li> --}}
                           {{-- <li class="has_sub">
                               <a href="javascript:void(0);" class="waves-effect"> <i class="fa fa-cog"></i> <span>Services</span><span class="menu-arrow"></span> </a>
                               <ul class="list-unstyled">
                                   <li><a href="{{ url('admin/services')}}">Services list</a></li>
                                   <li><a href="{{ url('admin/services/create')}}">Add Service</a></li>
                               </ul>
                           </li> --}}

                           <li class="has_sub">
                               <a href="javascript:void(0);" class="waves-effect"> <i class="fa fa-angellist"></i> <span>Car Brand</span><span class="menu-arrow"></span> </a>
                               <ul class="list-unstyled">
                                   <li><a href="{{ url('admin/brands')}}">Brand list</a></li>
                                   <li><a href="{{ url('admin/brands/create')}}">Add Brand</a></li>
                               </ul>
                           </li>
                            <li><a href="{{ url('admin/carmodels')}}"> <i class="fa fa-maxcdn"></i> Car Model</a></li>


                           <li class="has_sub">
                               <a href="{{ url('admin/car_wash')}}" class="waves-effect"> <i class="fa fa-file"></i> <span>Packages</span></a>
                           </li>


                            {{-- <li><a href="{{ url('admin/seo')}}"> <i class="fa fa-file"></i> SEO</a></li> --}}
                            <li><a href="{{ url('admin/cars')}}"> <i class="fa fa-file"></i> Car List</a></li>
                            <li><a href="{{ url('admin/faqs')}}"> <i class="fa fa-file"></i> FAQ List</a></li>
                            {{-- <li><a href="{{ url('admin/accessories')}}"> <i class="fa fa-cog"></i> Car Accessories</a></li> --}}
                            {{-- <li><a href="{{ url('admin/slider_img')}}"> <i class="fa fa-arrows-h"></i> Slider Images</a></li> --}}
                            {{-- <li><a href="{{ url('admin/services')}}"> <i class="fa fa-cog"></i> Services</a></li> --}}
                            {{-- <li><a href="{{ url('admin/slider_images')}}"> <i class="fa fa-arrows-h"></i> Slider Images</a></li>
                            <li><a href="{{ url('admin/services')}}"> <i class="fa fa-cog"></i> Services</a></li> --}}
                            <li class="has_sub">
                               <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-collection-text"></i><span> Queries</span><span class="menu-arrow"></span> </a>
                               <ul class="list-unstyled">
                                   <li><a href="{{ url('admin/complains')}}">Complains</a></li>
                                   <li><a href="{{ url('admin/requests')}}">FeedBack Queries</a></li>
                                   <li><a href="{{ url('admin/callbacks')}}">FAQ Queries</a></li>
                                   
                               </ul>
                           </li>
                           {{-- 
                           <li class="has_sub">
                               <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-view-list"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
                               <ul class="list-unstyled">
                                   <li><a href="tables-basic.html">Basic Tables</a></li>
                                   <li><a href="tables-datatable.html">Data Table</a></li>
                                   <li><a href="tables-responsive.html">Responsive Table</a></li>
                                   <li><a href="tables-editable.html">Editable Table</a></li>
                                   <li><a href="tables-tablesaw.html">Tablesaw Table</a></li>
                               </ul>
                           </li>
                           
                           <li class="has_sub">
                               <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-chart"></i><span> Charts </span> <span class="menu-arrow"></span></a>
                               <ul class="list-unstyled">
                                   <li><a href="chart-flot.html">Flot Chart</a></li>
                                   <li><a href="chart-morris.html">Morris Chart</a></li>
                                   <li><a href="chart-chartist.html">Chartist Charts</a></li>
                                   <li><a href="chart-chartjs.html">Chartjs Chart</a></li>
                                   <li><a href="chart-other.html">Other Chart</a></li>
                               </ul>
                           </li>
                           
                           <li>
                               <a href="calendar.html" class="waves-effect"><i class="zmdi zmdi-calendar"></i><span> Calendar </span></a>
                           </li>
                           
                           <li>
                               <a href="inbox.html" class="waves-effect"><i class="zmdi zmdi-email"></i><span class="label label-purple pull-right">New</span><span> Mail </span></a>
                           </li>
                           
                           <li class="has_sub">
                               <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-collection-item"></i><span> Pages </span> <span class="menu-arrow"></span></a>
                               <ul class="list-unstyled">
                                   <li><a href="page-starter.html">Starter Page</a></li>
                                   <li><a href="page-login.html">Login</a></li>
                                   <li><a href="page-register.html">Register</a></li>
                                   <li><a href="page-recoverpw.html">Recover Password</a></li>
                                   <li><a href="page-lock-screen.html">Lock Screen</a></li>
                                   <li><a href="page-confirm-mail.html">Confirm Mail</a></li>
                                   <li><a href="page-404.html">Error 404</a></li>
                                   <li><a href="page-500.html">Error 500</a></li>
                               </ul>
                           </li>
                           
                           <li class="has_sub">
                               <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-layers"></i><span>Extra Pages </span> <span class="menu-arrow"></span></a>
                               <ul class="list-unstyled">
                                   <li><a href="extras-projects.html">Projects</a></li>
                                   <li><a href="extras-tour.html">Tour</a></li>
                                   <li><a href="extras-taskboard.html">Taskboard</a></li>
                                   <li><a href="extras-taskdetail.html">Task Detail</a></li>
                                   <li><a href="extras-profile.html">Profile</a></li>
                                   <li><a href="extras-maps.html">Maps</a></li>
                                   <li><a href="extras-contact.html">Contact list</a></li>
                                   <li><a href="extras-pricing.html">Pricing</a></li>
                                   <li><a href="extras-timeline.html">Timeline</a></li>
                                   <li><a href="extras-invoice.html">Invoice</a></li>
                                   <li><a href="extras-faq.html">FAQ</a></li>
                                   <li><a href="extras-gallery.html">Gallery</a></li>
                                   <li><a href="extras-email-template.html">Email template</a></li>
                                   <li><a href="extras-maintenance.html">Maintenance</a></li>
                                   <li><a href="extras-comingsoon.html">Coming soon</a></li>
                               </ul>
                           </li> --}}

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>

            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
             @yield('content')

             </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    2018 - 2019 © Backstage.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <div class="side-bar right-bar">
                <a href="javascript:void(0);" class="right-bar-toggle">
                    <i class="zmdi zmdi-close-circle-o"></i>
                </a>
                <h4 class="">Notifications</h4>
                <div class="notification-list nicescroll">
                    <ul class="list-group list-no-border user-list">
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="avatar">
                                    <img src="{{  asset('images/users/avatar-2.jpg') }}" alt="">
                                </div>
                                <div class="user-desc">
                                    <span class="name">Michael Zenaty</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">2 hours ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-info">
                                    <i class="zmdi zmdi-account"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">New Signup</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">5 hours ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-pink">
                                    <i class="zmdi zmdi-comment"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">New Message received</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">1 day ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item active">
                            <a href="#" class="user-list-item">
                                <div class="avatar">
                                    <img src="{{  asset('images/users/avatar-3.jpg') }}" alt="">
                                </div>
                                <div class="user-desc">
                                    <span class="name">James Anderson</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">2 days ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item active">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-warning">
                                    <i class="zmdi zmdi-settings"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">Settings</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">1 day ago</span>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/detect.js') }}"></script>
        <script src="{{ asset('js/fastclick.js') }}"></script>
        <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('js/waves.js') }}"></script>
        <script src="{{ asset('js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>

        <!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="assets/plugins/jquery-knob/excanvas.js"></script>
        <![endif]-->
        <script src="{{ asset('plugins/jquery-knob/jquery.knob.js')}}"></script>

        <!--Morris Chart-->
        <script src="{{ asset('plugins/morris/morris.min.js') }}"></script>
        <script src="{{ asset('plugins/raphael/raphael-min.js') }}"></script>

        <!-- Dashboard init -->
        <script src="{{ asset('pages/jquery.dashboard.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('js/jquery.core.js') }}"></script>
        <script src="{{ asset('js/jquery.app.js') }}"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"></link>

        <script src="{{ asset('js/custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
{{-- <script>
    CKEDITOR.replace('ckeditor');
</script> --}}

    </body>

</html>
