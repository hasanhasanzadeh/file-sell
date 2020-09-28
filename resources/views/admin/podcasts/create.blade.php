@extends('admin.layouts.master')

@section('title')
    ایجاد مقاله
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('backend/css/dropzone.min.css')}}">
@endsection

@section('header')
    <section class="content-header">
        <h1>
           مقالات
            <small>ایجاد مقاله</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('articles.index')}}"><i class="fa fa-archive"></i>مقالات</a></li>
            <li class="active">ایجاد مقاله</li>
        </ol>
    </section>
@endsection

@section('content')


    <div class="box">
        <div class="box-header">
            <h4 class="text-center">ایجاد مقالات</h4>
            <div class="text-left">
                <a href="{{route('articles.index')}}" class="btn btn-app">
                    <i class="fa fa-list"></i>
                    لیست
                </a>
            </div>
        </div>
        <div class="box-body">
            <form action="{{route('articles.store')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="title">عنوان مقاله</label>
                    <input type="text" name="title" class="form-control" placeholder="عنوان مقاله را وارد کنید" id="title" value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label for="category_id">دسته بندی</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">دسته بندی مقاله را انتخاب کنید...</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" >{{$category->name}}</option>
                            @if(count($category->children) > 0)
                                @include('partials.category_list',['categories'=>$category->children ,'level'=>1])
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>گالری تصاویر</label>
                    <input type="hidden" name="photo_id" id="article-photo" >
                    <div id="photo" class="dropzone"></div>
                </div>

                <div class="form-group">
                    <label for="body">متن مقاله </label>
                    <textarea name="body" class="form-control" id="body" cols="30" rows="10">{{old('body')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="tags">تگ مقاله</label>
                    <input type="text" name="tags" class="form-control" placeholder="تگ های مقاله را وارد کنید" id="tags" value="{{old('tags')}}">
                </div>
                <div class="form-group">
                    <label for="meta_title">عنوان متای مقاله</label>
                    <input type="text" id="meta_title" name="meta_title" placeholder="عنوان متای مقاله را وارد کنید" class="form-control" value="{{old('meta_title')}}">
                </div>
                <div class="form-group">
                    <label for="meta_keywords">کلمات کلیدی متای مقاله</label>
                    <input type="text" id="meta_keywords" name="meta_keywords" placeholder="کلمات کلیدی متای مقاله را وارد کنید" class="form-control" value="{{old('meta_keywords')}}">
                </div>
                <div class="form-group">
                    <label for="meta_description">توضیحات متای مقاله</label>
                    <textarea name="meta_description" class="form-control" id="meta_description" cols="30" rows="3" placeholder="توضیحات متای مقاله را وارد کنید..." >{{old('meta_description')}}</textarea>
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
        var photosGallery=[]
        var drop = new Dropzone('#photo',{
            addRemoveLinks:true,
            maxFiles :1,
            acceptedFiles: ".svg,.jpg,.png,.jpeg,.bmp,.gif",
            url:"{{route('photos.upload')}}",
            sending:function(file,xhr,formData){
                formData.append("_token","{{csrf_token()}}")
            },
            success:function(file,response){
                document.getElementById('article-photo').value = response.photo_id

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
