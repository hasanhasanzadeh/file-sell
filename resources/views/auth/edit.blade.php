@extends('layouts.app')

@section('title')
    ویرایش پروفایل من
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
                        <div class="nav-item menu-active">
                            <a href="{{url('/profile')}}" class="nav-link mr-2">
                                <i class="fa fa-id-card ft-22 p-2"></i>
                                <span>اطلاعات کاربری</span>
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
                    </nav>
                </div>
                <div class="col-12 col-md-8 col-sm-6">
                    <div class="box bg-white rounded p-2 m-2">
                        <div class="box-header">
                            <div class="box-title p-2 m-1 text-center">
                                <span class="text-center">ویرایش اطلاعات کاربری</span>
                                <div class="text-left">
                                    <a href="{{url('/profile')}}" class="btn btn-primary">
                                        پروفایل من
                                        <i class="fa fa-user"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="box-body p-4">
                            <form action="{{route('profile.update')}}" method="POST">
                                @csrf
                                {{method_field('PATCH')}}
                                <div class="form-group">
                                    <label for="name">نام کاربری</label>
                                    <input type="text" name="name" value="{{$user->name}}" id="name" class="form-control" placeholder="نام کاربری خود را وارد کنید...">
                                </div>
                                <div class="form-group">
                                    <label for="name">شماره موبایل</label>
                                    <input type="text" name="mobile" value="{{$user->mobile}}" id="mobile" class="form-control" placeholder="شماره موبایل خود را وارد کنید...">
                                </div>
                                <div class="form-group">
                                    <label for="password">کلمه عبور</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="جهت تغییر کلمه عبور خود را وارد کنید...">
                                </div>
                                <div class="form-group">
                                    <label for="name">ایمیل</label>
                                    <input type="email" name="email" value="{{$user->email}}" id="email" class="form-control" placeholder="ایمیل خود را وارد کنید...">
                                </div>
                                <div class="form-group">
                                    <label>عکس پروفایل</label>
                                    <input type="hidden" name="photo_id" id="profile-photo" value="{{$user->photo_id}}">
                                    <div id="photo" class="dropzone"></div>
                                    <br>
                                    @if($user->photo_id)
                                        <img class="img-bordered" width="110" height="110" src="{{$user->photo->path}}" alt="">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info btn-block">
                                        <i class="fa fa-edit"></i>
                                        ویرایش اطلاعات
                                    </button>
                                </div>
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
