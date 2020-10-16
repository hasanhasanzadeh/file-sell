@extends('admin.layouts.master')

@section('title')
    ایجاد تخفیف
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('backend/css/dropzone.min.css')}}">
@endsection

@section('header')
    <section class="content-header">
        <h1>
            تخفیفات
            <small>ایجاد تخفیف</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('coupons.index')}}"><i class="fa fa-percent"></i>تخفیفات</a></li>
            <li class="active">ایجاد تخفیف</li>
        </ol>
    </section>
@endsection

@section('content')


    <div class="box">
        <div class="box-header">
            <h4 class="text-center">ایجاد تخفیفات</h4>
            <div class="text-left">
                <a href="{{route('coupons.index')}}" class="btn btn-app">
                    <i class="fa fa-list"></i>
                    لیست
                </a>
            </div>
        </div>
        <div class="box-body">
            <form action="{{route('coupons.store')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="title">عنوان تخفیف</label>
                    <input type="text" name="title" class="form-control" placeholder="عنوان تخفیف را وارد کنید" id="title" value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label>گالری تصاویر</label>
                    <input type="hidden" name="photo_id" id="article-photo" >
                    <div id="photo" class="dropzone"></div>
                </div>

                <div class="form-group">
                    <label for="description">متن تخفیف </label>
                    <textarea name="description" id="description" class="form-control" placeholder="توضیحات تخفیفات خود را وارد کنید..." cols="30" rows="10">{{old('description')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="code">کد تخفیف</label>
                    <input type="text" name="code" class="form-control" placeholder="کد تخفیف خود را وارد کنید..." id="code" value="{{old('code')}}">
                </div>
                <div class="form-group">
                    <label for="status">وضعیت</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1" selected>فعال</option>
                        <option value="0">غیرفعال</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="expired">تاریخ انقضاء</label>
                    <input type="number" id="expired" name="expired" placeholder="تاریخ انقضاء را با تعداد روز وارد کنید..." class="form-control" value="{{old('expired')}}">
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
