@extends('layouts.app')

@section('title')
    ایجاد آگهی تبلیغاتی
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('backend/css/dropzone.min.css')}}">
@endsection

@section('content')
    <div class="profile">
        <div class="container-fluid">
            <div class="row py-2">
                <div class="col-12 col-md-4 col-sm-6">
                    <nav class="navigate m-2 bg-white rounded ft-16">
                        <div class="navbar-brand">
                            @if($user->photo_id)
                                <img src="{{$user->photo->path}}" alt="" height="60" width="60" class="img-circle rounded-circle">
                            @else
                                <img src="{{asset('images/profile-icon.png')}}" alt="" height="50" width="50" class="img-circle rounded-circle">
                            @endif
                            <span>{{$user->name}}</span>
                        </div>
                        <hr>
                        <div class="nav-item">
                            <a href="{{url('/profile')}}" class="nav-link a-link">
                                <i class="fa fa-id-card ft-22 p-2"></i>
                                <span>پروفایل من</span>
                            </a>
                        </div>
                        <div class="nav-item ">
                            <a href="{{url('/achievements')}}" class="nav-link a-link">
                                <i class="fa fa-user-graduate ft-22 p-2"></i>
                                <span>موفقیت های شخصی</span>
                            </a>
                        </div>
                        <div class="nav-item">
                            <a href="#" class="nav-link a-link">
                                <i class="fa fa-graduation-cap ft-22 p-2"></i>
                                <span>دوره های خریداری شده</span>
                            </a>
                        </div>
                        <div class="nav-item ">
                            <a href="#" class="nav-link a-link">
                                <i class="fa fa-money-check-alt ft-22 p-2"></i>
                                <span>بخش مالی</span>
                            </a>
                        </div>
                        <div class="nav-item">
                            <a href="#" class="nav-link a-link">
                                <i class="fa fa-heart ft-22 p-2"></i>
                                <span>لیست علاقه مندی ها</span>
                            </a>
                        </div>
                        <div class="nav-item menu-active">
                            <a href="{{url('/advertisements')}}" class="nav-link ">
                                <i class="fas fa-bullhorn ft-22 p-2"></i>
                                <span>آگهی ها</span>
                            </a>
                        </div>
                    </nav>
                </div>
                <div class="col-12 col-md-8 col-sm-6">
                    <div class="box bg-white rounded p-2 m-2">
                        <div class="box-header">
                            <div class="box-title p-2 m-1 text-center">
                                <span class="text-center h4">ایجاد آگهی تبلیغاتی</span>
                                <div class="float-left">
                                    <a href="{{route('advertisement.index')}}" class="btn btn-info">
                                        <i class="fa fa-list"></i>
                                        آگهی های تبلیغاتی
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="box-body">
                            <form action="{{route('advertisement.store')}}" method="POST" class="py-2 my-2">
                                @csrf
                                <div class="form-group">
                                    <label for="title">عنوان آگهی</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="عنوان آگهی خود را وارد کنید..." value="{{old('title')}}">
                                </div>
                                <div class="form-group">
                                    <label for="body">متن آگهی</label>
                                    <textarea name="body" id="body" class="form-control" placeholder="متن آگهی خود را ایجاد کنید..." cols="30" rows="7">{{old('body')}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="url_address">آدرس آگهی</label>
                                    <input type="text" class="form-control" name="url_address" id="url_address" placeholder="آدرس آگهی خود را وارد کنید..." value="{{old('url_address')}}">
                                </div>
                                <div class="form-group">
                                    <label for="payment_id">کد پیگیری رسید بانکی</label>
                                    <input type="text" class="form-control" name="payment_id" id="payment_id" placeholder="کد پیگیری رسید بانکی خود را وارد کنید..." value="{{old('payment_id')}}">
                                </div>
                                <div class="form-group">
                                    <label>عکس آگهی</label>
                                    <input type="hidden" name="photo_id" id="profile-photo">
                                    <div id="photo" class="dropzone"></div>
                                </div>
                                <button type="submit" class="btn btn-block btn-info">
                                    <i class="fa fa-save"></i>
                                    ذخیره اطلاعات
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
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
            url:"{{route('photos.upload')}}",
            sending:function(file,xhr,formData){
                formData.append("_token","{{csrf_token()}}")
            },
            success:function(file,response){
                document.getElementById('profile-photo').value = response.photo_id
            }
        });

    </script>

@endsection
