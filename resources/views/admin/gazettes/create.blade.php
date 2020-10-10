@extends('admin.layouts.master')

@section('title')
    ایجاد مجله جدید
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('backend/css/dropzone.min.css')}}">
@endsection

@section('header')
    <section class="content-header">
        <h1>
            مجلات
            <small>مجله جدید</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('gazettes.index')}}"><i class="fa fa-video"></i>دروه های آموزشی</a></li>
            <li class="active">مجله جدید</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center">مجلات</h4>
            <div class="text-left">
                <a href="{{route('gazettes.index')}}" class="btn btn-app">
                    <i class="fa fa-list"></i>
                    لیست
                </a>
            </div>
        </div>
        <div class="box-body">
            <form action="{{route('gazettes.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">عنوان مجله</label>
                    <input type="text" name="title" placeholder="عنوان دوره را وارد کنید..." id="title" value="{{old('title')}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="price">قیمت مجله</label>
                    <input type="text" name="price" class="form-control" placeholder="قیمت دوره را وارد کنید" id="price" value="{{old('price')}}">
                </div>
                <div class="form-group">
                    <label for="file_url">آدرس مجله</label>
                    <input type="text" name="file_url" class="form-control" placeholder="آدرس مجله را وارد کنید" id="file_url" value="{{old('file_url')}}">
                </div>
                <div class="form-group">
                    <label for="category_id">دسته بندی مجله</label>
                    <select name="category_id" id="category_id" class="form-control" >
                        <option value="">دسته بندی مجله را انتخاب کنید...</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" >{{$category->name}}</option>
                            @if(count($category->children) > 0)
                                @include('partials.category_list',['categories'=>$category->children ,'level'=>1])
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="type"> نوع مجله</label>
                    <select name="type" id="type" class="form-control">
                        <option value="free"> رایگان</option>
                        <option value="cash"> نقدی</option>
                        <option value="vip"> اعضای ویژه</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="body">توضیحات کامل مجله</label>
                    <textarea name="body" class="form-control" placeholder="توضیحات کامل دوره را وارد کنید..." id="body" cols="30" rows="9">
                        {{old('body')}}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="photo">گالری تصاویر</label>
                    <input type="hidden" name="photo_id" id="course-photo" >
                    <div id="photo" class="dropzone"></div>
                </div>
                <div class="form-group">
                    <label for="tags">تگ های مجله</label>
                    <input type="text" name="tags" class="form-control" placeholder="تگ های دوره را وارد کنید" id="tags" value="{{old('tags')}}">
                </div>
                <div class="form-group">
                    <label for="meta_title">عنوان متای مجله</label>
                    <input type="text" name="meta_title" class="form-control" placeholder="عنوان متای دوره را وارد کنید" id="meta_title" value="{{old('meta_title')}}">
                </div>
                <div class="form-group">
                    <label for="meta_keywords">کلمات کلیدی متای مجله</label>
                    <input type="text" name="meta_keywords" class="form-control" placeholder="کلمات کلیدی متای دوره را وارد کنید" id="meta_keywords" value="{{old('meta_keywords')}}">
                </div>
                <div class="form-group">
                    <label for="meta_description">توضیحات متای مجله</label>
                    <textarea name="meta_description" id="meta_description" cols="30" rows="4" class="form-control" placeholder="توضیحات متای دوره را وارد کنید.">
                    </textarea>
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
    <script type="text/javascript" src="{{asset('backend/js/dropzone.min.js')}}"></script>
    <script type="text/javascript">
        Dropzone.autoDiscover = false;
            var photosGallery
            var drop = new Dropzone('#photo',{
                addRemoveLinks:true,
                maxFiles :1,
                acceptedFiles: ".svg,.jpg,.png,.jpeg,.bmp,.gif",
                url:"{{route('photos.upload')}}",
                sending:function(file,xhr,formData){
                    formData.append("_token","{{csrf_token()}}")
                },
                success:function(file,response){
                    document.getElementById('course-photo').value = response.photo_id

                }
            });
        CKEDITOR.replace('body',{
            customConfig: 'config.js',
            toolbar: 'simple',
            language: 'fa',
            removePlugins: 'cloudservices, easyimage'
        })

    </script>

@endsection
