@extends('admin.layouts.master')

@section('title')
    تخفیف {{$coupon->name}}
@endsection

@section('header')
    <section class="content-header">
        <h1>
            تخفیفات
            <small> تخفیف {{$coupon->title}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('coupons.index')}}"><i class="fa fa-archive"></i>تخفیفات</a></li>
            <li class="active"> تخفیف {{$coupon->title}}</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center"> تخفیف {{$coupon->title}}</h4>
            <div class="text-left">
                <a href="{{route('coupons.index')}}" class="btn btn-app">
                    <i class="fa fa-list"></i>
                    لیست
                </a>
            </div>
        </div>
        <div class="box-body">

            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="table-dark">
                    <tr>
                        <td>عنوان</td>
                        <td>مشخصات</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>عنوان تخفیف</td>
                        <td>{{$coupon->title}}</td>
                    </tr>
                    <tr>
                        <td>کد تخفیف</td>
                        <td>{{$coupon->code}}</td>
                    </tr>
                    <tr>
                        <td>عکس تخفیف</td>
                        <td>
                            <img src="{{$coupon->photo->path}}" width="150" height="140" class="img-rounded" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td>وضعیت</td>
                        <td>
                            @if($coupon->status==1)
                                <div class="label label-primary">فعال</div>
                            @else
                                <div class="label label-danger">غیر فعال</div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>متن تخفیف</td>
                        <td class="text-justify">
                            {{$coupon->description}}
                        </td>
                    </tr>
                    <tr>
                        <td>تاریخ انقضاء تخفیف</td>
                        <td>
                            @if($coupon->expired > \Carbon\Carbon::now() )
                                <span class="label label-primary">
                                            {{\Hekmatinasser\Verta\Verta::instance($coupon->expired)->formatDifference()}}
                                </span>
                            @else
                                <span class="label label-danger">
                                             {{\Hekmatinasser\Verta\Verta::instance($coupon->expired)->formatDifference()}}
                                </span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>تاریخ ایجاد تخفیف</td>
                        <td>{{\Hekmatinasser\Verta\Verta::instance($coupon->created_at)->formatDifference()}}</td>
                    </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection

