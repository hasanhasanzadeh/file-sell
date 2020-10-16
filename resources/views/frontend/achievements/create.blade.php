@extends('layouts.app')

@section('title')
    ایجاد موفقیت شخصی
@endsection

@section('content')
    <div class="profile h-100">
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
                        <div class="nav-item menu-active">
                            <a href="{{url('/achievements')}}" class="nav-link ">
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
                            <a href="{{url('/likes')}}" class="nav-link a-link">
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
                                <span class="text-center h4">موفقیت های شخصی</span>
                                <div class="float-left">
                                    <a href="{{route('achievements.index')}}" class="btn btn-info">
                                        <i class="fa fa-list"></i>
                                        موفقیت های شخصی
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="box-body">
                            <form action="{{route('achievements.store')}}" method="POST" class="py-2 my-2">
                                @csrf
                                <div class="form-group">
                                    <label for="title">عنوان موفقیت</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="عنوان موفقیت خود را وارد کنید..." value="{{old('title')}}">
                                </div>
                                <div class="form-group">
                                    <label for="body">متن موفقیت</label>
                                    <textarea name="body" id="body" class="form-control" placeholder="متن موفقیت خود را ایجاد کنید..." cols="30" rows="10">{{old('body')}}</textarea>
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
