@extends('admin.layouts.master')

@section('title')
    ویرایش تخفیف {{$coupon->title}}
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('backend/css/dropzone.min.css')}}">
@endsection

@section('header')
    <section class="content-header">
        <h1>
            تخفیفات
            <small>ویرایش تخفیف</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('coupons.index')}}"><i class="fa fa-percent"></i>تخفیفات</a></li>
            <li class="active">  ویرایش تخفیف{{$coupon->title}}</li>
        </ol>
    </section>
@endsection

@section('content')


    <div class="box">
        <div class="box-header">
            <h4 class="text-center">ویرایش تخفیفات {{$coupon->title}}</h4>
            <div class="text-left">
                <a href="{{route('coupons.index')}}" class="btn btn-app">
                    <i class="fa fa-list"></i>
                    لیست
                </a>
            </div>
        </div>
        <div class="box-body">
            <form action="{{route('coupons.update',$coupon->id)}}" method="POST">
                @csrf
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label for="title">عنوان تخفیف</label>
                    <input type="text" name="title" class="form-control" placeholder="عنوان تخفیف را وارد کنید" id="title" value="{{$coupon->title)}}">
                </div>
                <div class="form-group">
                    <label>گالری تصاویر</label>
                    <input type="hidden" name="photo_id" id="article-photo" value="{{$coupon->photo_id}}" >
                    <div id="photo" class="dropzone"></div>
                    <br>
                    <img src="{{$coupon->photo->path}}" height="140" class="img-rounded" width="130" alt="">
                </div>

                <div class="form-group">
                    <label for="description">متن تخفیف </label>
                    <textarea name="description" id="description" class="form-control" placeholder="توضیحات تخفیفات خود را وارد کنید..." cols="30" rows="10">{{$coupon->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="code">کد تخفیف</label>
                    <input type="text" name="code" class="form-control" placeholder="کد تخفیف خود را وارد کنید..." id="code" value="{{$coupon->code}}">
                </div>
                <div class="form-group">
                    <label for="status">وضعیت</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1" @if($coupon->status==1) selected @endif>فعال</option>
                        <option value="0" @if($coupon->status==0) selected @endif>غیرفعال</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="expired">تاریخ انقضاء</label>
                    <input type="number" id="expired" name="expired" placeholder="تاریخ انقضاء را با تعداد روز وارد کنید..." class="form-control" value="{{$coupon->expired}}">
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
