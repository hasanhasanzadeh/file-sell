@extends('admin.layouts.master')

@section('title')
    پروفایل| {{$profile->name}}
@endsection

@section('header')
    <section class="content-header">
        <h1>
            پیشخوان
            <small> پروفایل {{$profile->name}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('panel')}}"><i class="fa fa-user"></i>پیشخوان</a></li>
            <li class="active"> پروفایل  {{$profile->name}}</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center"> پروفایل {{$profile->name}}</h4>
            <div class="text-left">
                <a href="{{route('panel')}}" class="btn btn-app">
                    <i class="fa fa-tachometer-alt"></i>
                    پیشخوان
                </a>
            </div>
        </div>
        <div class="box-body">

            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead class="table-dark">
                    <tr>
                        <td>عنوان</td>
                        <td>مشخصات</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>عکس پروفایل</td>
                        <td>
                            @if($profile->photo)
                                <img src="{{$profile->photo->path}}" class="img-bordered" height="80" width="80" alt="">
                            @else
                                <img src="{{asset('dist/img/avatars2.png')}}" class="img-fluid" height="80" width="80" alt="">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>نام کاربر</td>
                        <td>{{$profile->name}}</td>
                    </tr>
                    <tr>
                        <td>شماره موبایل</td>
                        <td>{{$profile->mobile}}</td>
                    </tr>
                    <tr>
                        <td>ایمیل</td>
                        <td>{{$profile->email}}</td>
                    </tr>
                    <tr>
                        <td>تعداد نظرات</td>
                        <td>
                            @if($profile->comments)
                                {{count($profile->comments)}}
                            @else
                                0
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>وضعیت</td>
                        <td>
                            @if($profile->status==1)
                                <div class="label label-primary"> فعال</div>
                            @else
                                <div class="label label-danger">غیر فعال</div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>سطح دسترسی</td>
                        <td>
                            @if($profile->level=='user')
                                <div class="label label-primary"> کاربر عادی</div>
                            @elseif($profile->level=='admin')
                                <div class="label label-success">مدیر</div>
                            @elseif($profile->level=='author')
                                <div class="label label-info">نویسنده</div>
                            @elseif($profile->level=='editor')
                                <div class="label label-info">ویرایشگر</div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>تاریخ ایجاد کاربر</td>
                        <td>{{\Hekmatinasser\Verta\Verta::instance($profile->created_at)->formatDifference()}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a href="{{url('admin/profile/edit')}}" class="btn btn-warning btn-block">
                                <i class="fa fa-edit"></i>
                                ویرایش پروفایل
                            </a>
                        </td>
                    </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection

