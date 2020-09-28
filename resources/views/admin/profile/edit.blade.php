@extends('admin.layouts.master')

@section('title')
    ویرایش پروفایل |  {{$profile->name}}
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('backend/css/dropzone.min.css')}}">
@endsection

@section('header')
    <section class="content-header">
        <h1>
            پروفایل
            <small> ویرایش پروفایل {{$profile->name}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('admin/profile')}}"><i class="fa fa-user"></i>پروفایل</a></li>
            <li class="active"> ویرایش پروفایل  {{$profile->name}}</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center"> ویرایش کاربر {{$profile->name}}</h4>
            <div class="text-left">
                <a href="{{url('admin/profile')}}" class="btn btn-app">
                    <i class="fa fa-user"></i>
                    پروفایل
                </a>
            </div>
        </div>
        <div class="box-body">
            <form action="{{route('update.profile')}}" method="POST">
                @csrf
                {{method_field('PATCH')}}
                <input type="hidden" value="{{$profile->id}}" id="id">
                <div class="form-group">
                    <label for="name">نام کاربری</label>
                    <input type="text" class="form-control" name="name" placeholder="نام و نام خانوادگی خود را وارد کنید..." value="{{$profile->name}}" id="name">
                </div>
                <div class="form-group">
                    <label for="mobile">موبایل</label>
                    <input type="tel" class="form-control" name="mobile" placeholder="09XXXXXXXXX" value="{{$profile->mobile}}" id="mobile">
                </div>
                <div class="form-group">
                    <label for="password">کلمه عبور</label>
                    <input type="password" class="form-control" name="password" placeholder="جهت تغییر کلمه عبور خود را وارد کنید ..." id="password">
                </div>
                <div class="form-group">
                    <label for="email">ایمیل</label>
                    <input type="email" class="form-control" name="email" placeholder="email@test.com" value="{{$profile->email}}" id="email">
                </div>
                <div class="form-group">
                    <label for="photo">عکس پروفایل</label>
                    <input type="hidden" name="photo_id" id="profile-photo" value="{{$profile->photo_id}}">
                    <div id="photo" class="dropzone"></div>
                    <br>
                    @if(isset($profile->photo_id))
                        <img class="img-bordered" width="170" height="140" src="{{$profile->photo->path}}" alt="">
                    @endif
                </div>
                @if($profile->level=='admin')
                    <div class="form-group">
                        <label for="level">سطح دسترسی</label>
                        <select name="level" id="level" class="form-control">
                            <option value="user" @if($profile->level=='user') selected @endif>کاربر عادی</option>
                            <option value="admin" @if($profile->level=='admin') selected @endif>مدیر</option>
                            <option value="writer" @if($profile->level=='writer') selected @endif>نویسنده</option>
                        </select>
                    </div>
                @endif
                <div class="form-group">
                    <label for="status">وضعیت</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1" @if($profile->status==1) selected @endif>فعال</option>
                        <option value="0" @if($profile->status==0) selected @endif>غیر فعال</option>
                    </select>
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
                document.getElementById('profile-photo').value = response.photo_id
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
