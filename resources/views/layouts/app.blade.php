<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Dashboard</title>
    <script src="{{ asset('') }}assets/xlxs/xlsx.core.min.js"></script>
    <script src="{{ asset('') }}assets/jQuery/jquery311.min.js"></script>
    <script src="{{ asset('') }}assets/jQuery.printElement/jquery.printelement.min.js"></script>
    <script src="{{ asset('') }}assets/jQuery/jquery.table2excel.min.js"></script>

    <link rel="stylesheet" href="{{ asset('') }}assets/jQueryCSS/jquery-ui.css">
    <script src="{{ asset('') }}assets/jQuery/jquery-ui.js"></script>
    <script>
        $(document).ready(function () {
            $( function() {
                $( ".dPick" ).datepicker({
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: 'yy-mm-dd',
                });
            });
        });

    </script>

    {{--<script src="{{ asset('') }}assets/jQuery/jquery.dataTables.min.js"></script>--}}
    {{--<script src="https://cdn.datatables.net/plug-ins/1.10.12/filtering/row-based/range_dates.js"></script>--}}
    {{--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">--}}
    <script src="{{ asset('') }}assets/malsup/jquery.form.min.js"></script>
    <script src="{{ asset('') }}assets/malsup/jquery.hoverpulse.js"></script>
    <!-- SweetAlert This is what you need -->
    <script src="{{ asset('') }}assets/sweetalert/sweetalert.min.js"></script>
    <link rel="stylesheet" href="{{ asset('') }}assets/sweetalert/sweetalert.css">
    <!--.......................-->
    {{--jqueryValidation--}}
    <script src="{{ asset('') }}assets/jqueryValidation/jquery.validate.min.js"></script>
    {{--jqueryValidation--}}

    <!-- mousetrap -->
    {{--mousetrap--}}
    <script src="{{ asset('') }}assets/mousetrap/mousetrap.min.js"></script>
    {{--mousetrap--}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{ asset('') }}assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/dist/js/script.js') }}"></script>

    {{--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">--}}

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset('') }}assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('') }}assets/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('') }}assets/ionicons/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('') }}assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('') }}assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('') }}assets/dist/css/skins/_all-skins.min.css">


    <link rel="stylesheet" href="{{ asset('') }}assets/css/layout.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/components-rounded.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/tStyle.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/animate.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <link rel="stylesheet" href="{{ asset('') }}assets/bootstrap-social/bootstrap-social.css">

    <script>
        //dashboard page load function
        function loadPageKey(key, action) {
            Mousetrap.bind(key, function() {
                $.ajax({
                    cache: false,
                    global: false,
                    url: "{{ url('/home') }}",
                    success: function () {
                        $('.content-wrapper:eq(0)').load(action);
                        $('.content-wrapper:eq(1)').remove();
                    },
                    error: function () {
                        window.location.reload();
                    }
                });
            }, 'keyup');
        };

        function phploadPageKey(key, action) {
            Mousetrap.bind(key, function() {
                $.ajax({
                    cache: false,
                    global: false,
                    url: "{{ url('/home') }}",
                    success: function () {
                        document.location.href= action;
                    },
                    error: function () {
                        window.location.reload();
                    }
                });
            }, 'keyup');
        };
        //p l = production.index
        phploadPageKey('p l', '{{ route('production.index') }}');
        //p c = production.create
        phploadPageKey('p c', '{{ route('production.create') }}');
        //p d = dateWisePrData
        phploadPageKey('p d', '{{ url('production/dateWisePrData') }}');
        //p d = dateWisePrData
        phploadPageKey('k c', '{{ url('knitAndDyeing/Entry') }}');

        //t l = tnaList
        phploadPageKey('t l', '{{ route('tna.index') }}');

        //t c = tnaCreate
        loadPageKey('t c', '{{ route('tna.create') }}');

        //o l = orderList
        loadPageKey('o l', '{{ route('Order.index') }}');

        //o c = orderCreate
        loadPageKey('o c', '{{ route('Order.create') }}');

        //e l = newEmployeeList
        loadPageKey('e l', '{{ route('newEmployee.index') }}');

        //e c = newEmployeeCreate
        loadPageKey('e c', '{{ route('newEmployee.create') }}');

        //f1 = focus first input
        Mousetrap.bind('f1', function(event) {
            event.preventDefault();
            $('[type="text"]:eq(1)').focus();
        }, 'keyup');


        //$('input').attr('class', 'mousetrap');

        // Constant amount of padding an element should be from the bottom of the window
        var padding = 500;
        // Add focus event to all your different form elements
        $("input, textarea, select").focus(function(){

            // Check their position relative to the window's scroll
            var elementBottom = $(this).offset().top + $(this).height();
            var windowScroll = $(window).scrollTop();
            var windowBottom = windowScroll + $(window).height();

            if(elementBottom + padding > windowBottom){
                $(window).scrollTop( windowScroll + padding);
            }
        });
    </script>
    <style>

        /* width */
        ::-webkit-scrollbar {
            width: 12px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
            border-radius: 10px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #4a42a9;
            border-radius: 10px;
            transition: 1s;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #4a42a9;
        }

        .scrollright {
            position: fixed;
            right: 5px;
        }
        #scrollBtn {
            width:100%;
            padding:3px;
            position:fixed;
            bottom:0;
            background-color: rgba(150, 152, 255, 0.32);
            border:1px solid #343eff;
            z-index: 10;
            transition: 1s;
        }
        #scrollBtn:hover {
            border:1px solid #ffc6b5;
        }
        .scroll-btn {
            padding: 5px;
            height: 30px;
            border-radius: 5px;
            border: 1px solid rgba(150, 152, 255, 0.51);
            width: 39%;
            float: left;
            color: rgba(150, 152, 255, 0.51);
            letter-spacing: 6px;
            font-family: "Roboto", sans-serif;
            font-weight: bold;
            transition: 0.5s;
            cursor: pointer;
        }
        .scroll-btn:hover {
            background: rgb(91, 0, 255);
            color: white;
        }

        .main-sidebar {
            //position: fixed;
        }
        /*.sidebar-menu {
            height: 400px;
            overflow-y: scroll;
        }*/

        .tnaClass a {
            background: white;
            color: black;
            text-decoration: none;
        }
        .blackCol{
            color: #000;
        }
        .clkAbl{
            cursor: pointer;
        }

        .swal-wide{
            width:250px !important;
            height: 15em;
            margin-left: -9%;
            //background: transparent;
            border: solid black 1px;
            color: white !important;
        }

        .popWindowCls{
            width:550px !important;
            height: 35em;
            margin-left: -9%;
            color: white !important;
        }

        .shipmntSts{
            cursor: pointer;
        }
        #drop{
            border:2px dashed #bbb;
            -moz-border-radius:5px;
            -webkit-border-radius:5px;
            border-radius:5px;
            padding:25px;
            text-align:center;
            font:20pt bold,"Vollkorn";color:#bbb
        }
        .ajax-modal {
            text-align: center;
        }

        @media screen and (min-width: 768px) {
            .ajax-modal:before {
                display: inline-block;
                vertical-align: middle;
                content: " ";
                height: 100%;
            }
        }

        .ajax-modal-dialog {
            display: inline-block;
            text-align: left;
            vertical-align: middle;
        }
        .modal-backdrop
        {
            opacity:0.1 !important;
        }
        .ajax-modal-content{
            background: transparent;
            -webkit-box-shadow: 0 5px 15px rgba(0,0,0,0);
            -moz-box-shadow: 0 5px 15px rgba(0,0,0,0);
            -o-box-shadow: 0 5px 15px rgba(0,0,0,0);
            box-shadow: 0 5px 15px rgba(0,0,0,0);
        }
        .btn-default:hover, .btn-default:focus, .btn-default:active, .btn-default.active {
            background-color: #c60b0f;
            color: #ffffff;
        }
    </style>
    {{--<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->--}}
</head>
<body class="hold-transition skin-blue sidebar-mini">


<div class="wrapper">

    <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>News</b>Technology</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{ asset('') }}assets/img/{{ Auth::user()->avatar }}" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{ asset('') }}assets/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                AdminLTE Design Team
                                                <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{ asset('') }}assets/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Developers
                                                <small><i class="fa fa-clock-o"></i> Today</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{ asset('') }}assets/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Sales Department
                                                <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{ asset('') }}assets/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Reviewers
                                                <small><i class="fa fa-clock-o"></i> 2 days</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <!-- Tasks: style can be found in dropdown.less -->
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                                            page and may cause design problems
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-red"></i> 5 new members joined
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-user text-red"></i> You changed your username
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('') }}assets/img/{{ Auth::user()->avatar }}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ Auth::user()->first_name.' '.Auth::user()->last_name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{ asset('') }}assets/img/{{ Auth::user()->avatar }}" class="img-circle" alt="User Image">
                                <p>
                                    {{ Auth::user()->first_name.' '.Auth::user()->last_name }} - {{ Auth::user()->designation }}
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ url('profile') }}" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a id="signOut" href="{{ url('/logout') }}" class="btn btn-default btn-flat"><i class="fa fa-btn fa-sign-out"></i>Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                    {{--Logout Commenting--}}
                    {{--<li>
                        <a href="#"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
                    </li>--}}
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ asset('') }}assets/img/{{ Auth::user()->avatar }}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->first_name.' '.Auth::user()->last_name }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control datepicker" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" style="/*height: 500px; overflow-y: scroll*/">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active treeview">
                    <a href="{{ url('/home') }}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                </li>

                {{--<li class="treeview">
                    <a href="{{ route('admin.employees.index') }}"><i class="fa fa-circle-o"></i> Employees </a>
                </li>--}}
                <li class="treeview">
                    <a id="newEmployeeSection"><i class="fa fa-circle-o"></i> New Employees Section</a>
                </li>
                <script>
                    $('#newEmployeeSection').click(function () {
                        $('.content-wrapper:eq(0)').load('{{ route('newEmployee.index') }}');
                        $('.content-wrapper:eq(1)').remove();
                    });
                </script>

                <li class="treeview">
                    <a id="managementList"><i class="fa fa-diamond "></i> Management User </a>

                </li>
                <script>
                    $('#managementList').click(function () {
                        $('.content-wrapper:eq(0)').load('{{ route('managementUser.index') }}');
                        $('.content-wrapper:eq(1)').remove();
                    });
                </script>
                <li class="treeview">
                    <a href="{{ route('admin.departments.index') }}">
                        <i class="fa fa-building-o"></i>
                        <span>Department </span>
                        <span class="pull-right-container">
                        <span class="label label-primary pull-right">4</span>
                        </span>
                    </a>
                </li>

                <li class="treeview">
                    <a id="">
                        <i class="fa fa-files-o"></i>
                        <span>Order Management </span>
                        <span class="pull-right-container">
                        <span class="label label-primary pull-right"> > </span>
                        </span>
                    </a>
                    <ul class="treeview-menu">

                        <li class="treeview">
                            <a id="OrderM">
                                <i class="fa fa-pie-chart"></i>
                                <span>Shipment Entry</span>
                                <span class="pull-right-container">
                                        <i class=""></i>
                                    </span>
                            </a>
                        </li>

                        <li class="treeview">
                            <a id="" href="{{ route('production.create') }}">
                                <i class="fa fa-pie-chart"></i>
                                <span>Production Entry</span>
                                <span class="pull-right-container">
                                        <i class=""></i>
                                </span>
                            </a>
                        </li>

                        <li class="treeview">
                            <a id="" href="{{ url('knitAndDyeing/Entry') }}">
                                <i class="fa fa-pie-chart"></i>
                                <span>KnitDyeing Program</span>
                                <span class="pull-right-container">
                                        <i class=""></i>
                                </span>
                            </a>
                        </li>

                    </ul>
                    <ul class="treeview-menu">
                        <li>

                        </li>

                    </ul>
                </li>
                <script>
                    $('#OrderM').click(function () {
                        $('.content-wrapper:eq(0)').load('{{ route('Order.create') }}');
                        $('.content-wrapper:eq(1)').remove();
                    });
                </script>
                <li class="treeview">
                    <a id="cnclOrder">
                        <i class="fa fa-files-o"></i>
                        <span>Pending Order</span>
                        <span class="pull-right-container">
                        <span class="label label-primary pull-right">4</span>
                        </span>
                    </a>
                </li>
                <li class="treeview">
                    <a id="tnaList" href="{{ route('tna.index') }}">
                        <i class="fa fa-files-o"></i>
                        <span>TNA</span>
                        <span class="pull-right-container">
                        <span class="label label-primary pull-right">4</span>
                        </span>
                    </a>
                </li>
                <li class="treeview">
                    <a id="tnaList" href="{{ route('budget.index') }}">
                        <i class="fa fa-files-o"></i>
                        <span>Budget</span>
                        <span class="pull-right-container">
                        <span class="label label-primary pull-right">4</span>
                        </span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Report</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a id="shipmentS" href="#ShipmentSchedule">
                                <i class="fa fa-pie-chart"></i>
                                <span>Shipment Schedule</span>
                                <span class="pull-right-container">
                                    <i class=""></i>
                                </span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a id="" href="">
                                <i class="fa fa-pie-chart"></i>
                                <span>Production</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a id="" href="{{ route('production.index') }}">
                                        <i class="fa fa-pie-chart"></i>
                                        <span>Old Order Wise</span>
                                        <span class="pull-right-container">
                                        <i class=""></i>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a id="" href="{{ route('production.index') }}">
                                        <i class="fa fa-pie-chart"></i>
                                        <span>New Order Wise</span>
                                        <span class="pull-right-container">
                                        <i class=""></i>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a id="" href="{{ url('production/dateWisePrData') }}">
                                        <i class="fa fa-pie-chart"></i>
                                        <span>Date Wise</span>
                                        <span class="pull-right-container">
                                        <i class=""></i>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a id="" href="">
                                <i class="fa fa-pie-chart"></i>
                                <span>Knit&Dyeing</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a id="" href="{{ route('knitDying.index') }}">
                                        <i class="fa fa-pie-chart"></i>
                                        <span>Order Wise</span>
                                        <span class="pull-right-container">
                                        <i class=""></i>
                                        </span>
                                    </a>

                                </li>
                                <li>
                                    <a id="" href="{{ url('knitAndDyeing/dateWiseKDdata') }}">
                                        <i class="fa fa-pie-chart"></i>
                                        <span>Date Wise</span>
                                        <span class="pull-right-container">
                                        <i class=""></i>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </li>
                <li class="treeview">
                    <a id="tnaList" href="{{ route('settings.index') }}">
                        <i class="fa fa-book"></i>
                        <span>Library</span>
                        <span class="pull-right-container">
                        <span class="label label-primary pull-right"></span>
                        </span>
                    </a>
                </li>
                <li class="treeview">
                    <a id="tnaList" href="{{ url('factSettings/factory') }}">
                        <i class="fa fa-cog"></i>
                        <span>Settings</span>
                        <span class="pull-right-container">
                        <span class="label label-primary pull-right"></span>
                        </span>
                    </a>
                </li>
                <script>
                    $('#shipmentS').click(function () {
                        $('.content-wrapper:eq(0)').load('{{ route('Order.index', 'chart='.date('Y')) }}');
                        $('.content-wrapper:eq(1)').remove();
                        //alert('{{ route('Order.index', 'chart='.date('Y')) }}');
                    });
                    $('#cnclOrder').click(function () {
                        $('.content-wrapper:eq(0)').load('{{ route('pending.index') }}');
                        $('.content-wrapper:eq(1)').remove();
                    });
                    /*$('#tnaList').click(function () {
                        $('.content-wrapper:eq(0)').load('{{ route('tna.index') }}');
                        $('.content-wrapper:eq(1)').remove();
                    });*/
                    $('#prodRep').click(function () {
                        $('.content-wrapper:eq(0)').load('{{ route('production.index') }}');
                        $('.content-wrapper:eq(1)').remove();
                    });
                </script>
                {{--
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Inventory</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#">
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-pie-chart"></i>
                                <span>Yarn Store</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ route('yarnStore.create') }}"><i class="fa fa-circle-o"></i>Yarn Receive</a></li>
                                <li><a href="{{ route('yarnStore.show', 'id') }}"><i class="fa fa-circle-o"></i>Yarn Receive Return</a></li>
                                <li><a href="{{ route('yarnIssue.create') }}"><i class="fa fa-circle-o"></i>Yarn Issue</a></li>
                                <li><a href="{{ route('yarnIssue.show', 'id') }}"><i class="fa fa-circle-o"></i>Yarn Issue Return</a></li>
                            </ul>
                        </li>
                        </a>
                        </li>
                        <li><a href="#"><li class="treeview">
                            <a href="#">
                                <i class="fa fa-pie-chart"></i>
                                <span>Gray Fabric Store</span>
                                <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                                <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                                <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                                <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                            </ul>
                        </li></a></li>
                        <li><a href="#"><li class="treeview">
                            <a href="#">
                                <i class="fa fa-pie-chart"></i>
                                <span>Finish Fabric Store</span>
                                <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                                <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                                <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                                <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                            </ul>
                        </li></a></li>
                    </ul>
                </li>
                <li>
                    <a href="pages/widgets.html">
                        <i class="fa fa-book"></i> <span>Library</span>
                        <span class="pull-right-container">
                            <small class="label pull-right bg-green">new</small>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="pages/widgets.html">
                        <i class="fa fa-users"></i> <span>Attendance</span>
                        <span class="pull-right-container">
                            <small class="label pull-right bg-green">new</small>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="pages/widgets.html">
                        <i class="fa fa-user-times"></i> <span>Leave Applications</span>
                        <span class="pull-right-container">
                            <small class="label pull-right bg-green">new</small>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="pages/widgets.html">
                        <i class="fa fa-paypal"></i> <span>Payroll</span>
                        <span class="pull-right-container">

                        </span>
                    </a>
                </li>
                <li>
                    <a href="pages/widgets.html">
                        <i class="fa fa-microphone"></i> <span>Announcement</span>
                        <span class="pull-right-container">
                            <small class="label pull-right bg-green">new</small>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="pages/widgets.html">
                        <i class="fa fa-trophy"></i> <span>Award</span>
                        <span class="pull-right-container">
                            <small class="label pull-right bg-green">new</small>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="pages/widgets.html">
                        <i class="fa fa-credit-card"></i> <span>Expense</span>
                        <span class="pull-right-container">
                            
                        </span>
                    </a>
                </li>


                <li>
                    <a href="pages/widgets.html">
                        <i class="fa fa-newspaper-o"></i> <span>Notice Board </span>
                        <span class="pull-right-container">
                            <small class="label pull-right bg-green">new</small>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="pages/widgets.html">
                        <i class="fa fa-file-text-o"></i> <span>Job List</span>
                        <span class="pull-right-container">
                            <small class="label pull-right bg-green">new</small>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="pages/widgets.html">
                        <i class="fa fa-file-word-o"></i> <span>Job Application</span>
                        <span class="pull-right-container">
                            <small class="label pull-right bg-green">new</small>
                        </span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Charts</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                        <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                        <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                        <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>Production</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
                        <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
                        <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
                        <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
                        <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
                        <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-edit"></i> <span>HRMS</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
                        <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                        <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-table"></i> <span>Task</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                        <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
                    </ul>
                </li>
                <li>
                    <a href="pages/calendar.html">
                        <i class="fa fa-calendar"></i> <span>Holidays</span>
                        <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
                    </a>
                </li>
                <li>
                    <a href="pages/mailbox/mailbox.html">
                        <i class="fa fa-envelope"></i> <span>Mailbox</span>
                        <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder"></i> <span>Finance & Accounting</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                        <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
                        <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                        <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                        <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                        <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                        <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                        <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
                        <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-share"></i> <span>Setting</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                        <li>
                            <a href="#"><i class="fa fa-circle-o"></i> Level One
                                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                                <li>
                                    <a href="#"><i class="fa fa-circle-o"></i> Level Two
                                        <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                    </ul>
                </li>
                <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
--}}
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
@yield('content')
<!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.6
        </div>
        <strong>Copyright &copy; 2016 <a href="http://newstechnologyltd.com/">News Technology Ltd.</a></strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->

            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

</div>
<!-- ajax Modal -->
<div class="modal fade ajax-modal" id="loadingDiv" role="dialog">
    <div class="modal-dialog ajax-modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="ajax-modal-content">

            <div class="modal-body">
                <img class="center-block" id="" src="{{ asset('') }}assets/img/ring-alt.svg">
            </div>

        </div>

    </div>
</div>

<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->

<!-- FastClick -->
<script src="{{ asset('') }}plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('') }}assets/dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('') }}plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="{{ asset('') }}plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{ asset('') }}plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{ asset('') }}plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 2.4.0 -->
<script src="{{ asset('') }}assets/plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('') }}assets/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('') }}assets/dist/js/demo.js"></script>

<script>
    $(document).ajaxStart( function() {
        swal({
            imageUrl: "{{ asset('') }}assets/img/ring-alt.svg",
            title: 'Processing...',
            html: true,
            customClass: 'swal-wide',
            showConfirmButton: false
        });
        //$('#loadingDiv').modal({ backdrop: 'static', keyboard: false, show: true });
    }).ajaxStop ( function(){
        var alert = document.querySelector(".swal-wide"),
        okButton = alert.getElementsByTagName("button")[1];
        $(okButton).trigger("click");
        //$('#loadingDiv').modal('hide');
    });
</script>
<script src="{{ asset('') }}assets/BackJS/jquery.ba-hashchange.js"></script>
<script src="{{ asset('') }}assets/BackJS/backJS.js"></script>
</body>
</html>