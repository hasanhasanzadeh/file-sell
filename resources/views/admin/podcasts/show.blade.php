@extends('admin.layouts.master')

@section('title')
    کتاب صوتی {{$podcast->title}}
@endsection

@section('header')
    <section class="content-header">
        <h1>
            لیست کتاب های صوتی
            <small>کتاب صوتی {{$podcast->title}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('podcasts.index')}}"><i class="fa fa-microphone-alt"></i>لیست کتاب صوتی ها</a></li>
            <li class="active">کتاب صوتی {{$podcast->title}}</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center"> کتاب صوتی {{$podcast->title}}</h4>
            <div class="text-left">
                <a href="{{route('podcasts.index')}}" class="btn btn-app">
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
                        <td>عنوان کتاب صوتی</td>
                        <td>{{$podcast->title}}</td>
                    </tr>
                    <tr>
                        <td>توضیحات کامل</td>
                        <td>{!! $podcast->body !!}</td>
                    </tr>
                    <tr>
                        <td>قیمت</td>
                        <td>{{$podcast->presentPrice()}} تومان </td>
                    </tr>
                    <tr>
                        <td>نوع</td>
                        <td>
                            @if($podcast->type=='vip')
                                <div class="label label-primary">اعضای ویژه</div>
                            @elseif($podcast->type=='cash')
                                <div class="label label-info">نقدی</div>
                            @else
                                <div class="label label-success">رایگان</div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>عکس</td>
                        <td><img src="{{$podcast->photo->path}}" alt="" class="img-bordered" width="270" height="240"></td>
                    </tr>
                    <tr>
                        <td>تگ های کتاب صوتی</td>
                        <td>{{$podcast->tags}}</td>
                    </tr>
                    <tr>
                        <td>تعداد بازدید</td>
                        <td>{{$podcast->viewCount}}</td>
                    </tr>
                    <tr>
                        <td>تعداد نظرات</td>
                        <td>{{$podcast->commentCount}}</td>
                    </tr>
                    <tr>
                        <td>تعداد علاقه مندی ها</td>
                        <td>{{$podcast->likeCount}}</td>
                    </tr>
                    <tr>
                        <td>عنوان متا</td>
                        <td>{{$podcast->meta_title}}</td>
                    </tr>
                    <tr>
                        <td>کلمات کلیدی متا</td>
                        <td>{{$podcast->meta_keywords}}</td>
                    </tr>
                    <tr>
                        <td>توضیحات متا</td>
                        <td>{{$podcast->meta_description}}</td>
                    </tr>
                    <tr>
                        <td>تاریخ ایجاد</td>
                        <td>{{\Hekmatinasser\Verta\Verta::instance($podcast->created_at)->formatDifference()}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection
