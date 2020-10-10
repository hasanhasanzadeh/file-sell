@extends('admin.layouts.master')

@section('title')
    ویرایش تنظیمات |  {{$setting->title}}
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('backend/css/dropzone.min.css')}}">
@endsection

@section('header')
    <section class="content-header">
        <h1>
            تنظیمات
            <small> ویرایش تنظیمات {{$setting->title}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('admin/settings')}}"><i class="fa fa-sliders-h"></i>تنظیمات</a></li>
            <li class="active"> ویرایش تنظیمات  {{$setting->title}}</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center"> ویرایش تنظیمات {{$setting->title}}</h4>
            <div class="text-left">
                <a href="{{url('admin/settings')}}" class="btn btn-app">
                    <i class="fa fa-sliders-h"></i>
                    تنظیمات
                </a>
            </div>
        </div>
        <div class="box-body">
            <form action="{{route('settings.update',$setting->id)}}" method="POST">
                @csrf
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label for="title">عنوان سایت</label>
                    <input type="text" class="form-control" name="title" placeholder="عنوان سایت خود را وارد کنید..." value="{{$setting->title}}" id="title">
                </div>
                <div class="form-group">
                    <label for="mobile">موبایل</label>
                    <input type="tel" class="form-control" name="mobile" placeholder="شماره تلفن یا موبایل خود را وارد کنید..." value="{{$setting->mobile}}" id="mobile">
                </div>
                <div class="form-group">
                    <label for="banner_text">عنوان بنر</label>
                    <input type="text" class="form-control" name="banner_text" placeholder="متن بنر خود را وارد کنید..." value="{{$setting->banner_text}}" id="banner_text">
                </div>
                <div class="form-group">
                    <label for="description_banner">متن بنر</label>
                    <textarea name="description_banner" id="description_banner" cols="30" rows="4" class="form-control" placeholder="توضیحات بنر سایت را وارد کنید"> {{$setting->description_banner}}</textarea>
                </div>
                <div class="form-group">
                    <label for="banner">بنر سایت</label>
                    <input type="hidden" name="banner" id="banner-photo" value="{{$setting->banner}}">
                    <div id="photo" class="dropzone"></div>
                    <br>
                    @if(isset($setting->banner))
                        <img class="img-bordered" width="170" height="140" src="{{asset('storage/images/'.$setting->banner)}}" alt="">
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">ایمیل سایت</label>
                    <input type="email" class="form-control" name="email" placeholder="ایمیل سایت را وارد کنید..." value="{{$setting->email}}" id="email">
                </div>
                <div class="form-group">
                    <label for="icon-photo">ایکون سایت</label>
                    <input type="hidden" name="icon_image" id="icon-photo" value="{{$setting->icon_image}}">
                    <div id="icons" class="dropzone"></div>
                    <br>
                    @if(isset($setting->icon_image))
                        <img class="img-circle" width="50" height="50" src="{{asset('/storage/images/'.$setting->icon_image)}}" alt="">
                    @endif
                </div>
                <div class="form-group">
                    <label for="copy_right">توضیحات کپی رایت</label>
                    <input type="text" class="form-control" name="copy_right" placeholder="توضیحات کپی رایت سایت را وارد کنید..." value="{{$setting->copy_right}}" id="copy_right">
                </div>
                <div class="form-group">
                    <label for="telegram">آدرس تلگرام</label>
                    <input type="text" class="form-control" name="telegram" placeholder="آدرس تلگرام سایت را وارد کنید..." value="{{$setting->telegram}}" id="telegram">
                </div>
                <div class="form-group">
                    <label for="instagram">آدرس اینستاگرام</label>
                    <input type="text" class="form-control" name="instagram" placeholder="آدرس اینستاگرام سایت را وارد کنید..." value="{{$setting->instagram}}" id="instagram">
                </div>
                <div class="form-group">
                    <label for="youtube">آدرس یوتوب</label>
                    <input type="text" class="form-control" name="youtube" placeholder="آدرس یوتوب سایت را وارد کنید..." value="{{$setting->youtube}}" id="youtube">
                </div>
                <div class="form-group">
                    <label for="twitter">آدرس تویتر</label>
                    <input type="text" class="form-control" name="twitter" placeholder="آدرس تویتر سایت را وارد کنید..." value="{{$setting->twitter}}" id="twitter">
                </div>
                <div class="form-group">
                    <label for="telegram_id">ایدی تلگرام</label>
                    <input type="text" class="form-control" name="telegram_id" placeholder="ایدی تلگرام سایت را وارد کنید..." value="{{$setting->telegram_id}}" id="telegram_id">
                </div>
                <div class="form-group">
                    <label for="about">درباره سایت</label>
                    <textarea name="about" id="about" class="form-control" cols="30" rows="5" placeholder="توضیحات درباره سایت را وارد کنید...">{{$setting->about}}</textarea>
                </div>
                <div class="form-group">
                    <label for="e_name">کد نماد اعتماد</label>
                    <input type="text" class="form-control" name="e_name" placeholder="کد نماد اعتماد سایت را وارد کنید..." value="{{$setting->e_name}}" id="e_name">
                </div>
                <div class="form-group">
                    <label for="meta_title">عنوان متا</label>
                    <input type="text" class="form-control" name="meta_title" placeholder="عنوان متای سایت را وارد کنید..." value="{{$setting->meta_title}}" id="meta_title">
                </div>
                <div class="form-group">
                    <label for="meta_keywords">کلمات کلیدی متا</label>
                    <input type="text" class="form-control" name="meta_keywords" placeholder="کلمات کلیدی متای سایت را وارد کنید..." value="{{$setting->meta_keywords}}" id="meta_keywords">
                </div>
                <div class="form-group">
                    <label for="meta_description">توضیحات متا</label>
                    <textarea name="meta_description" id="meta_description" class="form-control" cols="30" rows="5" placeholder="توضیحات متای وب سایت را وارد کنید...">{{$setting->meta_description}}</textarea>
                </div>
                <button type="submit" class="btn btn-app btn-block">
                    ویرایش اطلاعات
                    <i class="fa fa-refresh"></i>
                </button>
            </form>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript" src="{{asset('backend/js/dropzone.min.js')}}"></script>
    <script type="text/javascript">
        Dropzone.autoDiscover = false;
        var photosGallery
        var drop = new Dropzone('#photo',{
            addRemoveLinks:true,
            maxFiles :1,
            acceptedFiles: ".svg,.jpg,.png,.jpeg,.bmp,.gif",
            url:"{{route('photo.store')}}",
            sending:function(file,xhr,formData){
                formData.append("_token","{{csrf_token()}}")
            },
            success:function(file,response){
                document.getElementById('banner-photo').value = response.photo_name
            }
        });
        var drop = new Dropzone('#icons',{
            addRemoveLinks:true,
            maxFiles :1,
            acceptedFiles: ".png,.ico,.bmp",
            url:"{{route('photo.store')}}",
            sending:function(file,xhr,formData){
                formData.append("_token","{{csrf_token()}}")
            },
            success:function(file,response){
                document.getElementById('icon-photo').value = response.photo_name
            }
        });

    </script>

@endsection
