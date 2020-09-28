@extends('admin.layouts.master')

@section('title')
    دوره های آموزشی
@endsection

@section('header')
    <section class="content-header">
        <h1>
            لیست دوره ها
            <small>دوره {{$course->title}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('courses.index')}}"><i class="fa fa-file-video"></i>لیست دوره های آموزشی</a></li>
            <li class="active">دوره {{$course->title}}</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center"> {{$course->title}}</h4>
            <div class="text-left">
                <a href="{{route('courses.index')}}" class="btn btn-app">
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
                                <td>عنوان دوره</td>
                                <td>{{$course->title}}</td>
                            </tr>
                            <tr>
                                <td>توضیحات کامل</td>
                                <td>{!! $course->body !!}</td>
                            </tr>
                            <tr>
                                <td>قیمت</td>
                                <td>{{$course->presentPrice()}} تومان </td>
                            </tr>
                            <tr>
                                <td>نوع</td>
                                <td>
                                    @if($course->type=='vip')
                                        <div class="label label-primary">اعضای ویژه</div>
                                    @elseif($course->type=='cash')
                                        <div class="label label-info">نقدی</div>
                                    @else
                                        <div class="label label-success">رایگان</div>
                                    @endif
                                </td>
                            </tr>
                        <tr>
                            <td>عکس</td>
                            <td><img src="{{$course->photo->path}}" alt="" class="img-bordered" width="270" height="240"></td>
                        </tr>
                        <tr>
                            <td>تگ های دوره</td>
                            <td>{{$course->tags}}</td>
                        </tr>
                            <tr>
                                <td>تعداد بازدید</td>
                                <td>{{$course->viewCount}}</td>
                            </tr>
                            <tr>
                                <td>تعداد نظرات</td>
                                <td>{{$course->commentCount}}</td>
                            </tr>
                            <tr>
                                <td>تعداد علاقه مندی ها</td>
                                <td>{{$course->likeCount}}</td>
                            </tr>
                            <tr>
                                <td>عنوان متا</td>
                                <td>{{$course->meta_title}}</td>
                            </tr>
                            <tr>
                                <td>کلمات کلیدی متا</td>
                                <td>{{$course->meta_keywords}}</td>
                            </tr>
                            <tr>
                                <td>توضیحات متا</td>
                                <td>{{$course->meta_description}}</td>
                            </tr>
                            <tr>
                                <td>تاریخ ایجاد</td>
                                <td>{{\Hekmatinasser\Verta\Verta::instance($course->created_at)->formatDifference()}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

        </div>
    </div>

@endsection
