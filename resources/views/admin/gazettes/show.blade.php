@extends('admin.layouts.master')

@section('title')
    مجله های آموزشی
@endsection

@section('header')
    <section class="content-header">
        <h1>
            لیست مجله ها
            <small>مجله {{$gazette->title}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('gazettes.index')}}"><i class="fa fa-file-video"></i>لیست مجله های آموزشی</a></li>
            <li class="active">مجله {{$gazette->title}}</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center"> {{$gazette->title}}</h4>
            <div class="text-left">
                <a href="{{route('gazettes.index')}}" class="btn btn-app">
                    <i class="fa fa-list"></i>
                    لیست
                </a>
            </div>
        </div>
        <div class="box-body">

                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                        <tr>
                            <td>عنوان</td>
                            <td>مشخصات</td>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>عنوان مجله</td>
                                <td>{{$gazette->title}}</td>
                            </tr>
                            <tr>
                                <td>توضیحات کامل</td>
                                <td>{!! $gazette->body !!}</td>
                            </tr>
                            <tr>
                                <td>قیمت</td>
                                <td>{{$gazette->presentPrice()}} تومان </td>
                            </tr>
                            <tr>
                                <td>نوع</td>
                                <td>
                                    @if($gazette->type=='vip')
                                        <div class="label label-primary">اعضای ویژه</div>
                                    @elseif($gazette->type=='cash')
                                        <div class="label label-info">نقدی</div>
                                    @else
                                        <div class="label label-success">رایگان</div>
                                    @endif
                                </td>
                            </tr>
                        <tr>
                            <td>عکس</td>
                            <td><img src="{{$gazette->photo->path}}" alt="" class="img-bordered" width="270" height="240"></td>
                        </tr>
                        <tr>
                            <td>تگ های مجله</td>
                            <td>{{$gazette->tags}}</td>
                        </tr>
                            <tr>
                                <td>تعداد بازدید</td>
                                <td>{{$gazette->viewCount}}</td>
                            </tr>
                            <tr>
                                <td>تعداد نظرات</td>
                                <td>{{$gazette->commentCount}}</td>
                            </tr>
                            <tr>
                                <td>تعداد علاقه مندی ها</td>
                                <td>{{$gazette->likeCount}}</td>
                            </tr>
                            <tr>
                                <td>عنوان متا</td>
                                <td>{{$gazette->meta_title}}</td>
                            </tr>
                            <tr>
                                <td>کلمات کلیدی متا</td>
                                <td>{{$gazette->meta_keywords}}</td>
                            </tr>
                            <tr>
                                <td>توضیحات متا</td>
                                <td>{{$gazette->meta_description}}</td>
                            </tr>
                            <tr>
                                <td>تاریخ ایجاد</td>
                                <td>{{\Hekmatinasser\Verta\Verta::instance($gazette->created_at)->formatDifference()}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

        </div>
    </div>

@endsection
