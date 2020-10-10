@extends('admin.layouts.master')

@section('title')
    تنظیمات| {{$setting->title}}
@endsection

@section('header')
    <section class="content-header">
        <h1>
            پیشخوان
            <small> تنظیمات {{$setting->title}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('panel')}}"><i class="fa fa-user"></i>پیشخوان</a></li>
            <li class="active"> تنظیمات  {{$setting->title}}</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center"> تنظیمات {{$setting->title}}</h4>
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
                        <td>عنوان سایت</td>
                        <td>{{$setting->title}}</td>
                    </tr>
                    <tr>
                        <td>متن بنر</td>
                        <td>
                            {{$setting->banner_text}}
                        </td>
                    </tr>
                    <tr>
                        <td>عکس بنر</td>
                        <td>
                            <img src="{{asset('storage/images/'.$setting->banner)}}" alt="" height="160" width="150" class="img-banner">
                        </td>
                    </tr>
                    <tr>
                        <td>آیکون سایت</td>
                        <td>
                            <img src="{{asset('storage/images/'.$setting->icon_image)}}" alt="" height="40" width="40" class="img-circle">
                        </td>
                    </tr>
                    <tr>
                        <td>توضیحات بنر سایت</td>
                        <td>{{$setting->description_banner}}</td>
                    </tr>
                    <tr>
                        <td> تلگرام</td>
                        <td>
                            {{$setting->telegram}}
                            <i class="fab fa-telegram h3 text-info"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>اینستاگرام</td>
                        <td>
                            {{$setting->instagram}}
                            <i class="fab fa-instagram h3 text-warning"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>یوتوب</td>
                        <td>
                            {{$setting->youtube}}
                            <i class="fab fa-youtube h3 text-danger"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>تویتر</td>
                        <td>
                            {{$setting->twitter}}
                            <i class="fab fa-twitter h3 text-info"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>ایمیل</td>
                        <td>
                            {{$setting->email}}
                            <i class="fa fa-envelope h3 "></i>
                        </td>
                    </tr>
                    <tr>
                        <td>ایدی تلگرام</td>
                        <td>
                            {{$setting->telegram}}
                            <i class="fab fa-telegram h3 text-info"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>شماره تماس</td>
                        <td>
                            {{$setting->mobile}}
                            <i class="fa fa-phone h3"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>درباره سایت</td>
                        <td>
                            {!!$setting->about!!}
                        </td>
                    </tr>
                    <tr>
                        <td>عنوان متای سایت</td>
                        <td>
                            {{$setting->meta_title}}
                        </td>
                    </tr>
                    <tr>
                        <td>کلمات کلیدی متای سایت</td>
                        <td>
                            {{$setting->meta_keywords}}
                        </td>
                    </tr>
                    <tr>
                        <td>توضیحات متای سایت</td>
                        <td>
                            {{$setting->meta_description}}
                        </td>
                    </tr>
                    <tr>
                        <td>نماد اعتماد الکترونیکی</td>
                        <td>
                            {{$setting->e_name}}
                        </td>
                    </tr>
                    <tr>
                        <td>کپی رایت</td>
                        <td>
                            {{$setting->copy_right}}
                        </td>
                    </tr>

                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="2">
                            <a href="{{route('settings.edit',$setting->id)}}" class="btn btn-app btn-block">
                                <i class="fa fa-edit"></i>
                                ویرایش
                            </a>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@endsection

