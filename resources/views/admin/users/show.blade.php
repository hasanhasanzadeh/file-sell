@extends('admin.layouts.master')

@section('title')
    کاربر {{$user_au->name}}
@endsection

@section('header')
    <section class="content-header">
        <h1>
            کاربران
            <small> کاربر {{$user_au->name}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('users.index')}}"><i class="fa fa-users"></i>کاربران</a></li>
            <li class="active"> کاربر  {{$user_au->name}}</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center"> کاربر {{$user_au->name}}</h4>
            <div class="text-left">
                <a href="{{route('users.index')}}" class="btn btn-app">
                    <i class="fa fa-list"></i>
                    لیست
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
                            @if($user_au->photo)
                                <img src="{{$user_au->photo->path}}" class="img-bordered" height="80" width="80" alt="">
                            @else
                                <img src="{{asset('dist/img/avatars2.png')}}" class="img-fluid" height="80" width="80" alt="">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>نام کاربر</td>
                        <td>{{$user_au->name}}</td>
                    </tr>
                    <tr>
                        <td>شماره موبایل</td>
                        <td>{{$user_au->mobile}}</td>
                    </tr>
                    <tr>
                        <td>ایمیل</td>
                        <td>{{$user_au->email}}</td>
                    </tr>
                    <tr>
                        <td>تعداد نظرات</td>
                        <td>
                            @if($user_au->comments)
                                {{count($user_au->comments)}}
                            @else
                               0
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>وضعیت</td>
                        <td>
                            @if($user_au->status==1)
                                <div class="label label-primary"> فعال</div>
                            @else
                                <div class="label label-danger">غیر فعال</div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>سطح دسترسی</td>
                        <td>
                            @if($user_au->level=='user')
                                <div class="label label-info">کاربر عادی</div>
                            @elseif($user_au->level=='author')
                                <div class="label label-primary">نویسنده</div>
                            @elseif($user_au->level=='editor')
                                <div class="label label-secondary">ویرایشگر</div>
                            @elseif($user_au->level=='admin')
                                <div class="label label-success">مدیر</div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>تاریخ ایجاد کاربر</td>
                        <td>{{\Hekmatinasser\Verta\Verta::instance($user_au->created_at)->formatDifference()}}</td>
                    </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection

