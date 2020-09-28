@extends('admin.layouts.master')

@section('title')
    ویرایش قسمت  {{$episode->title}}دوره های آموزشی
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('backend/css/dropzone.min.css')}}">
@endsection

@section('header')
    <section class="content-header">
        <h1>
            قسمت دوره های آموزشی
            <small> ویرایش قسمت {{$episode->title}} دوره آموزشی </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('episodes.index')}}"><i class="fa fa-file-video-o"></i>قسمت های دوره های آموزشی</a></li>
            <li class="active"> ویرایش قسمت {{$episode->title}} دوره آموزشی </li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center"> ویرایش قسمت {{$episode->title}} دوره آموزشی </h4>
            <div class="text-left">
                <a href="{{route('episodes.index')}}" class="btn btn-app">
                    <i class="fa fa-list"></i>
                    لیست
                </a>
            </div>
        </div>
        <div class="box-body">
            <form action="{{route('episodes.update',$episode->id)}}" method="POST">
                @csrf
                {{method_field('PATCH')}}
                <input type="hidden" name="id" value="{{$episode->id}}">
                <div class="form-group">
                    <label for="title">عنوان قسمت دوره</label>
                    <input type="text" name="title" placeholder="عنوان دوره را وارد کنید..." id="title" value="{{$episode->title}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="course_id"> دوره آموزشی</label>
                    <select name="course_id" id="course_id" class="form-control" >
                        <option value="">دوره را انتخاب کنید...</option>
                        @foreach($courses as $course)
                            <option value="{{$course->id}}" @if($episode->course_id==$course->id) selected @endif>{{$course->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="type"> نوع قسمت</label>
                    <select name="type" id="type" class="form-control">
                        <option value="free" @if($episode->type=='free') selected @endif> رایگان</option>
                        <option value="cash" @if($episode->type=='cash') selected @endif> نقدی</option>
                        <option value="vip" @if($episode->type=='vip') selected @endif> اعضای ویژه</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="number">قسمت دوره</label>
                    <input type="number" name="number" placeholder="قسمت دوره را وارد کنید..." id="number" value="{{$episode->number}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="file_time">زمان قسمت دوره</label>
                    <input type="text" name="file_time" placeholder="زمان قسمت دوره را وارد کنید..." id="file_time" value="{{$episode->file_time}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="file_size">حجم قسمت دوره</label>
                    <input type="text" name="file_size" placeholder="حجم قسمت دوره را وارد کنید..." id="file_size" value="{{$episode->file_size}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="file_url">آدرس قسمت دوره</label>
                    <input type="text" name="file_url" placeholder="آدرس قسمت دوره را وارد کنید..." id="file_url" value="{{$episode->file_url}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="body">توضیحات کامل قسمت دوره</label>
                    <textarea name="body" class="form-control" placeholder="توضیحات کامل قسمت دوره را وارد کنید..." id="body" cols="30" rows="9">
                        {!! $episode->body !!}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="tags">تگ های قسمت دوره</label>
                    <input type="text" name="tags" class="form-control" placeholder="تگ های دوره را وارد کنید" id="tags" value="{{$episode->tags}}">
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
