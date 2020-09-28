@extends('admin.layouts.master')

@section('title')
    دسته بندی {{$category->name}}
@endsection

@section('header')
    <section class="content-header">
        <h1>
            دسته بندی ها
            <small> دسته بندی {{$category->name}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('categories.index')}}"><i class="fa fa-list"></i>دسته بندی ها</a></li>
            <li class="active"> دسته بندی {{$category->name}}</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center"> دسته بندی {{$category->name}}</h4>
            <div class="text-left">
                <a href="{{route('categories.index')}}" class="btn btn-app">
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
                                <td>شناسه دسته بندی</td>
                                <td><a href="{{route('categories.show',$category->id)}}">{{$category->id}}</a></td>
                            </tr>
                            <tr>
                                <td>نام دسته بندی</td>
                                <td>{{$category->name}}</td>
                            </tr>
                            <tr>
                                <td>عنوان متای دسته بندی</td>
                                <td>{{$category->meta_title}}</td>
                            </tr>
                            <tr>
                                <td>کلمات کلیدی متای دسته بندی</td>
                                <td>{{$category->meta_keywords}}</td>
                            </tr>
                            <tr>
                                <td>توضیحات متای دسته بندی</td>
                                <td>{{$category->meta_description}}</td>
                            </tr>
                        </tbody>

                    </table>
                </div>
        </div>
    </div>

@endsection

