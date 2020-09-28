@extends('admin.layouts.master')

@section('title')
    ایجاد قسمت های دوره های آموزشی
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('backend/css/dropzone.min.css')}}">
@endsection

@section('header')
    <section class="content-header">
        <h1>
            دوره های آموزشی
            <small> ایجاد قسمت های دوره های آموزشی</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('episodes.index')}}"><i class="fa fa-file-video-o"></i>قسمت های دوره های آموزشی</a></li>
            <li class="active"> ایجاد قسمت های دوره های آموزشی</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center"> ایجاد قسمت های دوره های آموزشی</h4>
            <div class="text-left">
                <a href="{{route('episodes.index')}}" class="btn btn-app">
                    <i class="fa fa-list"></i>
                    لیست
                </a>
            </div>
        </div>
        <div class="box-body">
            <form action="{{route('episodes.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">عنوان قسمت دوره</label>
                    <input type="text" name="title" placeholder="عنوان دوره را وارد کنید..." id="title" value="{{old('title')}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="course_id"> دوره آموزشی</label>
                    <select name="course_id" id="course_id" class="form-control" >
                        <option value="">دوره را انتخاب کنید...</option>
                        @foreach($courses as $course)
                            <option value="{{$course->id}}" >{{$course->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="type"> نوع قسمت</label>
                    <select name="type" id="type" class="form-control">
                        <option value="free"> رایگان</option>
                        <option value="cash"> نقدی</option>
                        <option value="vip"> اعضای ویژه</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="number">قسمت دوره</label>
                    <input type="number" name="number" placeholder="قسمت دوره را وارد کنید..." id="number" value="{{old('number')}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="file_time">زمان قسمت دوره</label>
                    <input type="text" name="file_time" placeholder="زمان قسمت دوره را وارد کنید..." id="file_time" value="{{old('file_time')}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="file_size">حجم قسمت دوره</label>
                    <input type="text" name="file_size" placeholder="حجم قسمت دوره را وارد کنید..." id="file_size" value="{{old('file_size')}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="file_url">آدرس قسمت دوره</label>
                    <input type="text" name="file_url" placeholder="آدرس قسمت دوره را وارد کنید..." id="file_url" value="{{old('file_url')}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="body">توضیحات کامل قسمت دوره</label>
                    <textarea name="body" class="form-control" placeholder="توضیحات کامل قسمت دوره را وارد کنید..." id="body" cols="30" rows="9">
                        {{old('body')}}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="tags">تگ های قسمت دوره</label>
                    <input type="text" name="tags" class="form-control" placeholder="تگ های دوره را وارد کنید" id="tags" value="{{old('tags')}}">
                </div>
                <div class="form-group">
                    <button class="btn btn-app btn-block" type="submit">
                        <i class="fa fa-save"></i>
                        ذخیره اطلاعات
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript" src="{{asset('bower_components/ckeditor/ckeditor.js')}}"></script>
   <script type="text/javascript">
        CKEDITOR.replace('body',{
            customConfig: 'config.js',
            toolbar: 'simple',
            language: 'fa',
            removePlugins: 'cloudservices, easyimage'
        })
    </script>

@endsection
