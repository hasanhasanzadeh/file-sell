@extends('admin.layouts.master')

@section('title')
    دسته بندی ها
@endsection

@section('header')
    <section class="content-header">
        <h1>
            دسته بندی ها
            <small>ایجاد دسته بندی</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('categories.index')}}"><i class="fa fa-list"></i>لیست دسته بندی</a></li>
            <li class="active">ایجاد دسته بندی</li>
        </ol>
    </section>
@endsection

@section('content')


    <div class="box">
        <div class="box-header">
            <h4 class="text-center">ایجاد دسته بندی ها</h4>
            <div class="text-left">
                <a href="{{route('categories.index')}}" class="btn btn-app">
                    <i class="fa fa-list"></i>
                    لیست
                </a>
            </div>
        </div>
        <div class="box-body">
            <form action="{{route('categories.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">نام دسته بندی </label>
                    <input type="text" name="name" placeholder="نام دسته بندی را وارد کنید..." class="form-control">
                </div>
                <div class="form-group">
                    <label for="parent_id">دسته والد</label>
                    <select name="parent_id" id="parent_id" class="form-control" >
                        <option value="">دسته والد را وارد کنید...</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" >{{$category->name}}</option>
                            @if(count($category->children) > 0)
                                @include('partials.category_list',['categories'=>$category->children ,'level'=>1])
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="meta_title">عنوان متای دسته بندی</label>
                    <input type="text" id="meta_title" name="meta_title" class="form-control" placeholder="عنوان متای دسته بندی را وارد کنید...">
                </div>
                <div class="form-group">
                    <label for="meta_keywords">عنوان متای دسته بندی</label>
                    <input type="text" id="meta_keywords" name="meta_keywords" class="form-control" placeholder="کلمات کلیدی متای دسته بندی را وارد کنید...">
                </div>
                <div class="form-group">
                    <label for="meta_description">توضیحات متای دسته بندی</label>
                    <textarea class="form-control" rows="4" name="meta_description" id="meta_description"  placeholder="توضیحات متای صفحه را وارد کنید..."></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-app btn-block" type="submit">
                        <i class="fa fa-save"></i>
                        ثبت اطلاعات
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
