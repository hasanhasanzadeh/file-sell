<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap-theme.css')}}">
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="{{asset('dist/css/rtl.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/skins/skin-blue.min.css')}}">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css')}}" rel="stylesheet">

    <script src="{{asset('js/sweet-alert.min.js')}}"></script>
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- customize adminlte -->
    <link rel="stylesheet" href="{{asset('dist/css/customize-adminlte.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/back-style.css')}}">
    @yield('style')
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">
        <!-- Logo -->
        <a href="{{route('panel')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">پنل</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>کنترل پنل مدیریت</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            @if($user->photo_id)
                                <img src="{{$user->photo->path}}" class="img-circle rounded-circle" width="30" height="30"  alt="User Image">
                            @else
                                <img src="{{asset('images/profile-icon.png')}}" class="img-circle rounded-circle" width="30" height="30" alt="User Image">
                            @endif
                            <span class="hidden-xs">{{$user->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                @if($user->photo_id)
                                    <img src="{{$user->photo->path}}" class="img-circle rounded-circle" width="44" height="44"  alt="User Image">
                                @else
                                    <img src="{{asset('images/profile-icon.png')}}" class="img-circle rounded-circle" width="40" height="40" alt="User Image">
                                @endif
                                <p>
                                    {{$user->name}}
                                    <small>
                                        @if($user->level=='admin')
                                            <span>مدیر کل سایت</span>
                                        @elseif($user->level=='author')
                                            <span>نویسنده سایت</span>
                                        @elseif($user->level=='editor')
                                            <span> ویرایشگر سایت</span>
                                        @endif
                                    </small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{url('admin/profile')}}" class="btn btn-default btn-flat">پروفایل</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{route('logout')}}" class="btn btn-default btn-flat">خروج</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- right side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-right image">
                    @if($user->photo_id)
                    <img src="{{$user->photo->path}}" class="img-circle rounded-circle" width="30" height="30"  alt="User Image">
                    @else
                        <img src="{{asset('images/profile-icon.png')}}" class="img-circle rounded-circle" width="30" height="30" alt="User Image">
                    @endif
                </div>
                <div class="pull-right info">
                    <p>{{$user->name}}</p>
                    <!-- Status -->
                    <a href="{{url('admin/profile')}}"><i class="fa fa-circle text-success"></i> آنلاین</a>
                    <br>
                </div>
            </div>

            <!-- search form (Optional) -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="جستجو">
                    <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
                </div>
            </form>
            <!-- /.search form -->

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <!-- Optionally, you can add icons to the links -->
                <li class="active"><a href="{{route('panel')}}"><i class="fa fa-tachometer-alt"></i> <span>پیشخوان</span></a></li>
                <li><a href="{{url('/admin/categories')}}"><i class="fa fa-tags"></i> <span>دسته بندی</span></a></li>
                <li><a href="{{url('/admin/courses')}}"><i class="fa fa-video"></i> <span>دوره های آموزشی</span></a></li>
                <li><a href="{{url('/admin/episodes')}}"><i class="fa fa-file-video-o"></i> <span>آپلود قسمت دوره ها</span></a></li>
                <li><a href="{{url('/admin/articles')}}"><i class="fa fa-archive"></i> <span>مقالات</span></a></li>
                <li><a href="{{url('/admin/podcasts')}}"><i class="fa fa-microphone-alt"></i> <span>کتاب صوتی</span></a></li>
                <li><a href="{{url('/admin/parts')}}"><i class="fa fa-microphone"></i> <span>آپلود کتاب صوتی </span></a></li>
                <li><a href="{{url('/admin/gazettes')}}"><i class="fa fa-file-alt"></i> <span>مجله</span></a></li>
                @can('isAdmin')
                <li><a href="{{url('/admin/users')}}"><i class="fa fa-users"></i> <span>کاربران</span></a></li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-comments"></i> <span>دیدگاه ها</span>
                            <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('admin/comments/true-status')}}" class="p-2"> نظرات تأیید شده  </a>  </li>
                            <li><a href="{{url('admin/comments/false-status')}}" class="p-2">نظرات تأیید نشده  </a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-user-graduate"></i> <span>موفقیت ها</span>
                            <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('admin/achievements/true-status')}}" class="p-2"> موفقیت تأیید شده  </a>  </li>
                            <li><a href="{{url('admin/achievements/false-status')}}" class="p-2">موفقیت تأیید نشده  </a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-bullhorn"></i> <span>آگهی ها</span>
                            <span class="pull-left-container">
                <i class="fa fa-angle-right pull-left"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('admin/advertisements/true-status')}}" class="p-2"> آگهی های تأیید شده  </a>  </li>
                            <li><a href="{{url('admin/advertisements/false-status')}}" class="p-2">آگهی های تأیید نشده  </a></li>
                        </ul>
                    </li>
                @endcan
                <li><a href="{{url('/admin/orders')}}"><i class="fa fa-shopping-cart"></i> <span>سفارشات</span></a></li>

                <li><a href="{{url('/admin/newsletter')}}"><i class="fa fa-envelope"></i> <span>خبرنامه</span></a></li>
                <li><a href="{{url('/admin/coupons')}}"><i class="fa fa-percent"></i> <span>تخفیفات</span></a></li>
                 @can('isAdmin')
                    <li><a href="{{url('/admin/contacts')}}"><i class="fa fa-commenting"></i> <span>ارتباط با ما</span></a></li>
                    <li><a href="{{url('/admin/settings')}}"><i class="fa fa-sliders-h"></i> <span>تنظیمات </span></a></li>
                 @endcan
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @yield('header')

    <!-- Main content -->
        <section class="content container-fluid">
            @include('sweet::alert')
            <!--------------------------
            | Your Page Content Here |
            -------------------------->
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer text-center">
        <strong>Copyleft &copy; 2014-2017 </strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane active" id="control-sidebar-home-tab">
                <!-- <h3 class="control-sidebar-heading">فعالیت ها</h3>
                 <ul class="control-sidebar-menu">
                     <li>
                         <a href="javascript:;">
                             <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                             <div class="menu-info">
                                 <h4 class="control-sidebar-subheading">تولد غلوم</h4>

                                 <p>۲۴ مرداد</p>
                             </div>
                         </a>
                     </li>
                 </ul>
                 -->

                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">پیشرفت کارها</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:;">
                            <h4 class="control-sidebar-subheading">
                                آپدیت لاراول
                                <span class="pull-left-container">
                    <span class="label label-danger pull-left">70%</span>
                  </span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">تب وضعیت</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">تنظیمات عمومی</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            گزارش کنترلر پنل
                            <input type="checkbox" class="pull-left" checked>
                        </label>

                        <p>
                            ثبت تمامی فعالیت های مدیران
                        </p>
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
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>

@yield('script')

</body>

</html>
