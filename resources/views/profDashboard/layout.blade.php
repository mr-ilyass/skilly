<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('title')</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{asset('flag-icon.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @yield('style')
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('home')}}" class="nav-link">Home</a>
            </li>

        </ul>

        <!-- SEARCH FORM -->


        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                    <a href="{{route('logout')}}" class="dropdown-item">
                        <p style="text-align: center"> Log out  </p>
                    </a>

                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fa fa-globe-africa"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                        <a href="#" class="dropdown-item">
                            <a  style="text-align: center;" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" hreflang="{{ $localeCode }}"  class="dropdown-item" >

                                <i class="flag-icon float-md-none @if( $localeCode == 'ar') flag-icon-ma @endif
                                @if( $localeCode == 'fr') flag-icon-fr @endif
                                @if( $localeCode == 'en') flag-icon-gb @endif  "></i>
                                @if( $localeCode == 'ar') Arabe  @endif
                                @if( $localeCode == 'fr') Français  @endif
                                @if( $localeCode == 'en')  Anglais @endif
                            </a>
                        </a>

                        <div class="dropdown-divider"></div>
                    @endforeach
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            {{--            <li class="nav-item dropdown">--}}
            {{--                <a class="nav-link" data-toggle="dropdown" href="#">--}}
            {{--                    <i class="far fa-bell"></i>--}}
            {{--                    <span class="badge badge-warning navbar-badge">15</span>--}}
            {{--                </a>--}}
            {{--                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}
            {{--                    <span class="dropdown-item dropdown-header">15 Notifications</span>--}}
            {{--                    <div class="dropdown-divider"></div>--}}
            {{--                    <a href="#" class="dropdown-item">--}}
            {{--                        <i class="fas fa-envelope mr-2"></i> 4 new messages--}}
            {{--                        <span class="float-right text-muted text-sm">3 mins</span>--}}
            {{--                    </a>--}}
            {{--                    <div class="dropdown-divider"></div>--}}
            {{--                    <a href="#" class="dropdown-item">--}}
            {{--                        <i class="fas fa-users mr-2"></i> 8 friend requests--}}
            {{--                        <span class="float-right text-muted text-sm">12 hours</span>--}}
            {{--                    </a>--}}
            {{--                    <div class="dropdown-divider"></div>--}}
            {{--                    <a href="#" class="dropdown-item">--}}
            {{--                        <i class="fas fa-file mr-2"></i> 3 new reports--}}
            {{--                        <span class="float-right text-muted text-sm">2 days</span>--}}
            {{--                    </a>--}}
            {{--                    <div class="dropdown-divider"></div>--}}
            {{--                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>--}}
            {{--                </div>--}}
            {{--            </li>--}}
            <li class="nav-item">
                <a class="nav-link" href="{{url('/Messenger')}}"><i
                        class="fas fa-comments"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #EB5757;  /* fallback for old browsers */
background: -webkit-linear-gradient(to bottom, #000000, #EB5757);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to bottom, #000000, #EB5757); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    position:fixed;

">
        <!-- Brand Logo -->
        <a href="{{route('home')}}" class="brand-link">
            <img src="{{asset('dist/img/LogoCustom.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Skilly Courses</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('dist/img/user8-128x128.jpg')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{Auth::user()->name}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->


                    <li class="nav-item">
                        <a href="#" class="nav-link  @if (\Request::is('prof/course/create'))active  @elseif(\Request::is('prof/course/edit'))active
 @elseif(\Request::is('prof/course/*/Episode'))active @endif">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Courses
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                            <li class="nav-item   ">
                                <a href="{{route('prof/createCourse')}}" class="nav-link @if (\Request::is('prof/course/create'))active @endif ">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>Create course</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('prof/editcourse')}}" class="nav-link @if (\Request::is('prof/course/edit'))active
@elseif(\Request::is('prof/course/*/Episode'))active @endif ">
                                    <i class="fas fa-edit nav-icon"></i>
                                    <p>Edit course</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-md-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">@yield('title')</a></li>
                            <li class="breadcrumb-item active">Dashboard </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
    @yield('content')
    <!-- /.content -->
    </div>
</div>
<footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="https://www.linkedin.com/ilyass-asri">Asri iLyass</a>.</strong>
    All rights reserved.

</footer>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('dist/js/demo.j')}}s"></script>
<script src="{{asset('dist/js/pages/dashboard3.js')}}"></script>
@yield('scripts')

</body>
</html>
