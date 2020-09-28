@extends('admin.layouts.master')

@section('title')
    مقاله {{$article->name}}
@endsection

@section('header')
    <section class="content-header">
        <h1>
            مقالات
            <small> مقاله {{$article->title}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('articles.index')}}"><i class="fa fa-archive"></i>مقالات</a></li>
            <li class="active"> مقاله {{$article->title}}</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center"> مقاله {{$article->title}}</h4>
            <div class="text-left">
                <a href="{{route('articles.index')}}" class="btn btn-app">
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
                                <td>عنوان مقاله</td>
                                <td>{{$article->title}}</td>
                            </tr>
                            <tr>
                                <td>نویسنده مقاله</td>
                                <td>{{$article->user->name}}</td>
                            </tr>
                            <tr>
                                <td>نام دسته بندی</td>
                                <td>{{$article->category->name}}</td>
                            </tr>
                            <tr>
                                <td>عکس مقاله</td>
                                <td><img src="{{$article->photo->path}}" alt="" height="140" width="170"></td>
                            </tr>
                            <tr>
                                <td>تعداد بازدید</td>
                                <td>{{$article->viewCount}}</td>
                            </tr>
                            <tr>
                                <td>تعداد نظرات</td>
                                <td>{{$article->commentCount}}</td>
                            </tr>
                            <tr>
                                <td>متن مقاله</td>
                                <td>{!! $article->body !!}</td>
                            </tr>
                            <tr>
                                <td>عنوان متا</td>
                                <td>{{$article->meta_title}}</td>
                            </tr>
                            <tr>
                                <td>کلمات کلیدی متا</td>
                                <td>{{$article->meta_keywords}}</td>
                            </tr>
                            <tr>
                                <td>توضیحات متا</td>
                                <td>{{$article->meta_description}}</td>
                            </tr>
                            <tr>
                                <td>تاریخ ایجاد مقاله</td>
                                <td>{{\Hekmatinasser\Verta\Verta::instance($article->created_at)->formatDifference()}}</td>
                            </tr>
                        </tbody>

                    </table>
                </div>
        </div>
    </div>

@endsection

