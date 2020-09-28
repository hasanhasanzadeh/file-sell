@extends('admin.layouts.master')

@section('title')
    ویرایش قسمت  {{$part->title}}کتاب صوتی
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('backend/css/dropzone.min.css')}}">
@endsection

@section('header')
    <section class="content-header">
        <h1>
            قسمت کتاب صوتی
            <small> ویرایش قسمت {{$part->title}} کتاب صوتی </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('parts.index')}}"><i class="fa fa-file-video-o"></i>قسمت های کتاب صوتی</a></li>
            <li class="active"> ویرایش قسمت {{$part->title}} کتاب صوتی </li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center"> ویرایش قسمت {{$part->title}} کتاب صوتی </h4>
            <div class="text-left">
                <a href="{{route('parts.index')}}" class="btn btn-app">
                    <i class="fa fa-list"></i>
                    لیست
                </a>
            </div>
        </div>
        <div class="box-body">
            <form action="{{route('parts.update',$part->id)}}" method="POST">
                @csrf
                {{method_field('PATCH')}}
                <input type="hidden" name="id" value="{{$part->id}}">
                <div class="form-group">
                    <label for="title">عنوان قسمت کتاب صوتی</label>
                    <input type="text" name="title" placeholder="عنوان کتاب صوتی را وارد کنید..." id="title" value="{{$part->title}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="podcast_id"> کتاب صوتی</label>
                    <select name="podcast_id" id="podcast_id" class="form-control" >
                        <option value="">کتاب صوتی را انتخاب کنید...</option>
                        @foreach($podcasts as $podcast)
                            <option value="{{$podcast->id}}" @if($part->podcast_id==$podcast->id) selected @endif>{{$podcast->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="type"> نوع قسمت</label>
                    <select name="type" id="type" class="form-control">
                        <option value="free" @if($part->type=='free') selected @endif> رایگان</option>
                        <option value="cash" @if($part->type=='cash') selected @endif> نقدی</option>
                        <option value="vip" @if($part->type=='vip') selected @endif> اعضای ویژه</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="number">قسمت کتاب صوتی</label>
                    <input type="number" name="number" placeholder="قسمت کتاب صوتی را وارد کنید..." id="number" value="{{$part->number}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="file_time">زمان قسمت کتاب صوتی</label>
                    <input type="text" name="file_time" placeholder="زمان قسمت کتاب صوتی را وارد کنید..." id="file_time" value="{{$part->file_time}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="file_size">حجم قسمت کتاب صوتی</label>
                    <input type="text" name="file_size" placeholder="حجم قسمت کتاب صوتی را وارد کنید..." id="file_size" value="{{$part->file_size}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="file_url">آدرس قسمت کتاب صوتی</label>
                    <input type="text" name="file_url" placeholder="آدرس قسمت کتاب صوتی را وارد کنید..." id="file_url" value="{{$part->file_url}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="body">توضیحات کامل قسمت کتاب صوتی</label>
                    <textarea name="body" class="form-control" placeholder="توضیحات کامل قسمت کتاب صوتی را وارد کنید..." id="body" cols="30" rows="9">
                        {!! $part->body !!}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="tags">تگ های قسمت کتاب صوتی</label>
                    <input type="text" name="tags" class="form-control" placeholder="تگ های دوره را وارد کنید" id="tags" value="{{$part->tags}}">
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
