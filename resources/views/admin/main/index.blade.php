@extends('admin.layouts.master')

@section('title')
    صفحه مدیریت وب سایت
@endsection

@section('header')
    <section class="content-header">
        <h1>
            خانه
            <small>پیشخوان</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('panel')}}"><i class="fa fa-tachometer-alt"></i> خانه</a></li>
            <li class="active">پیشخوان</li>
        </ol>
    </section>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <a href="{{url('admin/courses')}}">
                        <span class="info-box-icon bg-aqua">
                            <i class="fa fa-film"></i>
                        </span>
                    </a>

                    <div class="info-box-content">
                        <span class="info-box-text">دوره های آموزشی</span>
                        <span class="info-box-number">{{$arrays['courseCount']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                        <span class="info-box-icon bg-red">
                            <i class="fa fa-download"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">تعداد دانلود ها</span>
                        <span class="info-box-number">{{$arrays['downloadCount']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <a href="{{url('admin/users')}}">
                         <span class="info-box-icon bg-green">
                            <i class="fa fa-users"></i></span>
                    </a>

                    <div class="info-box-content">
                        <span class="info-box-text">کاربران </span>
                        <span class="info-box-number">{{$arrays['userCount']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <a href="{{url('admin/comments/true-status')}}">
                        <span class="info-box-icon bg-yellow">
                            <i class="fa fa-comments"></i>
                        </span>
                    </a>

                    <div class="info-box-content">
                        <span class="info-box-text">تعداد نظرات</span>
                        <span class="info-box-number">{{$arrays['commentCount']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">گزارش ماهانه</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-wrench"></i></button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">منوی ۱</a></li>
                                    <li><a href="#">منوی ۲</a></li>
                                    <li><a href="#">منو ۳</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">لینک</a></li>
                                </ul>
                            </div>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                <p class="text-center">
                                    <strong>فروش ۳ مرداد ۱۳۹۶</strong>
                                </p>

                                <div class="chart">
                                    <!-- Sales Chart Canvas -->
                                    <canvas id="salesChart" style="height: 180px;"></canvas>
                                </div>
                                <!-- /.chart-responsive -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-4">
                                <p class="text-center">
                                    <strong>میزان پیشرفت اهداف</strong>
                                </p>

                                <div class="progress-group">
                                    <span class="progress-text">سفارش در ماه</span>
                                    <span class="progress-number"><b>160</b>/200</span>

                                    <div class="progress sm">
                                        <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->
                                <div class="progress-group">
                                    <span class="progress-text">محصول</span>
                                    <span class="progress-number"><b>310</b>/400</span>

                                    <div class="progress sm">
                                        <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->
                                <div class="progress-group">
                                    <span class="progress-text">مشتری جدید</span>
                                    <span class="progress-number"><b>480</b>/800</span>

                                    <div class="progress sm">
                                        <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->
                                <div class="progress-group">
                                    <span class="progress-text">بازدید جدید</span>
                                    <span class="progress-number"><b>250</b>/500</span>

                                    <div class="progress sm">
                                        <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./box-body -->
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-3 col-xs-6">
                                <div class="description-block border-right">
                                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                                    <h5 class="description-header"> 35,210.43 تومان</h5>
                                    <span class="description-text">کل گردش حساب</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 col-xs-6">
                                <div class="description-block border-right">
                                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                                    <h5 class="description-header">10,390.90 تومان</h5>
                                    <span class="description-text">فروش کل</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 col-xs-6">
                                <div class="description-block border-right">
                                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                                    <h5 class="description-header">24,813.53 تومان</h5>
                                    <span class="description-text">سود کل</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 col-xs-6">
                                <div class="description-block">
                                    <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                                    <h5 class="description-header">1200</h5>
                                    <span class="description-text">اهداف</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
                <!-- MAP & BOX PANE -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">بازدیدها</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="row">
                            <div class="col-md-9 col-sm-8">
                                <div class="pad">
                                    <!-- Map will be created here -->
                                    <div id="world-map-markers" style="height: 325px;"></div>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-3 col-sm-4">
                                <div class="pad box-pane-right bg-green" style="min-height: 280px">
                                    <div class="description-block margin-bottom">
                                        <div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>
                                        <h5 class="description-header">8390</h5>
                                        <span class="description-text">بازدید</span>
                                    </div>
                                    <!-- /.description-block -->
                                    <div class="description-block margin-bottom">
                                        <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                                        <h5 class="description-header">30%</h5>
                                        <span class="description-text">کاربر قدیمی</span>
                                    </div>
                                    <!-- /.description-block -->
                                    <div class="description-block">
                                        <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                                        <h5 class="description-header">70%</h5>
                                        <span class="description-text">کاربر جدید</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <div class="row">

                    <div class="col-md-12">
                        <!-- USERS LIST -->
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">آخرین کاربران</h3>

                                <div class="box-tools pull-right">
                                    <span class="label label-danger">{{$users->count()}} کاربر جدید</span>
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body no-padding">
                                <ul class="users-list clearfix">
                                    @foreach($users as $key=>$user_cr)
                                    @if($key<8)
                                    <li>
                                        <a href="{{url('admin/users/'.$user_cr->id)}}">
                                        @if($user_cr->photo_id)
                                            <img src="{{$user_cr->photo->path}}" alt="User Image" class="img-circle rounded-circle" width="70" height="70">
                                        @else
                                            <img src="{{asset('images/profile-icon.png')}}" class="img-circle rounded-circle" width="70" height="70" alt="User Image">
                                        @endif
                                        </a>
                                        <a class="users-list-name" href="{{url('admin/users/'.$user_cr->id)}}">{{Str::limit($user_cr->name,20)}}</a>
                                        <span class="users-list-date">{{\Hekmatinasser\Verta\Verta::instance($user_cr->created_at)->formatDifference()}}</span>
                                    </li>
                                        @endif
                                    @endforeach
                                </ul>
                                <!-- /.users-list -->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer text-center">
                                <a href="{{url('admin/users')}}" class="uppercase">نمایش همه کاربران</a>
                            </div>
                            <!-- /.box-footer -->
                        </div>
                        <!--/.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">آخرین سفارشات</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>شماره</th>
                                    <th>محصول</th>
                                    <th>وضعیت</th>
                                    <th>رضایت مشتری</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><a href="#">OR9842</a></td>
                                    <td>آیفون ۵</td>
                                    <td><span class="label label-success">ارسال شده</span></td>
                                    <td>
                                        <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">OR1848</a></td>
                                    <td>سامسونگ ۶</td>
                                    <td><span class="label label-warning">در انتظار</span></td>
                                    <td>
                                        <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">OR7429</a></td>
                                    <td>آیفون ۶</td>
                                    <td><span class="label label-danger">پرداخت شده</span></td>
                                    <td>
                                        <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">OR7429</a></td>
                                    <td>لپ تاپ ایسوز</td>
                                    <td><span class="label label-info">در حال پردازش</span></td>
                                    <td>
                                        <div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">OR1848</a></td>
                                    <td>مک بوک ایر</td>
                                    <td><span class="label label-warning">در انتظار</span></td>
                                    <td>
                                        <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">OR7429</a></td>
                                    <td>سونی اکسپریا</td>
                                    <td><span class="label label-danger">پرداخت شده</span></td>
                                    <td>
                                        <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="#">OR9842</a></td>
                                    <td>ماوس اپتیکال</td>
                                    <td><span class="label label-success">ارسال شده</span></td>
                                    <td>
                                        <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">سفارش جدید</a>
                        <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">نمایش همه</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->

            <div class="col-md-4">
                <!-- Info Boxes Style 2 -->
                <div class="info-box bg-yellow">
                    <span class="info-box-icon"><i class="fa fa-archive ft-22"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">مقالات</span>
                        <span class="info-box-number">{{$arrays['articleCount']}}</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 38%"></div>
                        </div>
                        <span class="progress-description">
                  38 درصد افزایش در ۳۰ روز گذشته
                </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="fa fa-file-archive"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">مجلات</span>
                        <span class="info-box-number">{{$arrays['gazetteCount']}}</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 45%"></div>
                        </div>
                        <span class="progress-description">
                  45 درصد افزایش در ۳۰ روز گذشته
                </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box bg-red">
                    <span class="info-box-icon"><i class="fa fa-download"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">دانلود</span>
                        <span class="info-box-number">{{$arrays['downloadCount']}}</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 30%"></div>
                        </div>
                        <span class="progress-description">
                  30 درصد افزایش در ۳۰ روز گذشته
                </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box bg-aqua">
                    <span class="info-box-icon"><i class="fa fa-user-graduate"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">موفقیت</span>
                        <span class="info-box-number">{{$arrays['achievementCount']}}</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 40%"></div>
                        </div>
                        <span class="progress-description">
                  ۴۰ درصد کاهش در ۳۰ روز گذشته
                </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <!-- /.box -->

                <!-- PRODUCT LIST -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">آخرین دوره های آموزشی</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            @foreach($courses as $course)
                            <li class="item">
                                <div class="product-img">
                                    <a href="{{url('admin/courses/'.$course->id)}}">
                                        <img src="{{$course->photo->path}}" alt="Product Image">
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="{{url('admin/courses/'.$course->id)}}" class="product-title">{{$course->title}}
                                        <span class="label label-warning pull-left">{{$course->presentPrice()}} تومان</span> </a>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="{{url('admin/courses')}}" class="uppercase">نمایش همه</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
