@extends('layouts.app')

@section('title')
    پروفایل من
@endsection

@section('content')


    <div class="profile-show">
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
                            <a href="{{url('/profile')}}" class="nav-link">
                                <i class="fa fa-id-card ft-22 p-2"></i>
                                <span>پروفایل من</span>
                            </a>
                        </div>
                        <div class="nav-item">
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
                        <div class="nav-item">
                            <a href="{{url('/advertisements')}}" class="nav-link a-link">
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
                                <span class="text-center">اطلاعات کاربری</span>
                                <div class="text-left">
                                    <a href="{{url('/profile/edit')}}" class="btn btn-info">
                                        ویرایش
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <tbody>
                                    <tr>
                                        <td>نام کاربری</td>
                                        <td>{{$user->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>موبایل</td>
                                        <td>{{$user->mobile}}</td>
                                    </tr>
                                    <tr>
                                        <td>ایمیل</td>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>عضویت در خبرنامه</td>
                                        <td>
                                            @if($user->email_status)
                                            <div class="badge badge-primary">فعال</div>
                                            @else
                                                <div class="badge badge-danger">غیر فعال</div>
                                            @endif
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

