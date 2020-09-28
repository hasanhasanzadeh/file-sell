@extends('admin.layouts.master')

@section('title')
    ایجاد دوره جدید
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('backend/css/dropzone.min.css')}}">
@endsection

@section('header')
    <section class="content-header">
        <h1>
            دوره های آموزشی
            <small>ویرایش دوره </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('courses.index')}}"><i class="fa fa-video"></i>دروه های آموزشی</a></li>
            <li class="active">ویرایش دوره</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center">ویرایش دوره {{$course->title}}</h4>
            <div class="text-left">
                <a href="{{route('courses.index')}}" class="btn btn-app">
                    <i class="fa fa-list"></i>
                    لیست
                </a>
            </div>
        </div>
        <div class="box-body">
            <form action="{{route('courses.update',$course->id)}}" method="POST">
                @csrf
                {{method_field('PATCH')}}
                <input type="hidden" name="id" value="{{$course->id}}">
                <div class="form-group">
                    <label for="title">عنوان دوره</label>
                    <input type="text" name="title" placeholder="عنوان دوره را وارد کنید..." id="title" value="{{$course->title}}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="price">قیمت دوره</label>
                    <input type="text" name="price" class="form-control" placeholder="قیمت دوره را وارد کنید" id="price" value="{{$course->price}}">
                </div>
                <div class="form-group">
                    <label for="category_id">دسته بندی دوره</label>
                    <select name="category_id" id="category_id" class="form-control" >
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" @if($category->id==$course->category_id) selected @endif>{{$category->name}}</option>
                            @if(count($category->children) > 0)
                                @include('partials.category_select',['categories'=>$category->children ,'category_id'=>$course->category_id,'level'=>1])
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="type"> نوع دوره</label>
                    <select name="type" id="type" class="form-control">
                        <option value="free" @if($course->type=='free') selected @endif> رایگان</option>
                        <option value="cash" @if($course->type=='cash') selected @endif> نقدی</option>
                        <option value="vip" @if($course->type=='vip') selected @endif> اعضای ویژه</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="body">توضیحات کامل دوره</label>
                    <textarea name="body" class="form-control" placeholder="توضیحات کامل دوره را وارد کنید..." id="body" cols="30" rows="9">
                        {!! $course->body !!}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="photo">گالری تصاویر</label>
                    <input type="hidden" name="photo_id" id="course-photo" value="{{$course->photo_id}}">
                    <div id="photo" class="dropzone"></div>
                    <br>
                    <img class="img-bordered" width="170" height="140" src="{{$course->photo->path}}" alt="">
                </div>
                <div class="form-group">
                    <label for="tags">تگ های دوره</label>
                    <input type="text" name="tags" class="form-control" placeholder="تگ های دوره را وارد کنید" id="tags" value="{{$course->tags}}">
                </div>
                <div class="form-group">
                    <label for="meta_title">عنوان متای دوره</label>
                    <input type="text" name="meta_title" class="form-control" placeholder="عنوان متای دوره را وارد کنید" id="meta_title" value="{{$course->meta_title}}">
                </div>
                <div class="form-group">
                    <label for="meta_keywords">کلمات کلیدی متای دوره</label>
                    <input type="text" name="meta_keywords" class="form-control" placeholder="کلمات کلیدی متای دوره را وارد کنید" id="meta_keywords" value="{{$course->meta_keywords}}">
                </div>
                <div class="form-group">
                    <label for="meta_description">توضیحات متای دوره</label>
                    <textarea name="meta_description" id="meta_description" cols="30" rows="4" class="form-control" placeholder="توضیحات متای دوره را وارد کنید...">
                        {{$course->meta_description}}
                    </textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-app btn-block" type="submit">
                        <i class="fa fa-save"></i>
                        ویرایش اطلاعات
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
