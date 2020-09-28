@extends('layouts.app')

@section('title')
    ثبت نام در وب سایت
@endsection

@section('content')


    <div class="register">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center text-light">
                    <h1 class="py-4">فرم عضویت</h1>
                    <p class="text-center ft-13 w-75 m-auto">
                        در عرض چند ثاینه در سایت عضو شوید تا بتوانید از امکانات سایت بصورت کامل استفاده کنید. همه این امکانات در کنار هم قرار گرفته اند تا به شما کمک کنند به ساترین روش، جدیدترین و کاربردی ترین آموزش های روز جهان را یاد بگیرید.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 m-auto">
                    <div class="card my-4 bg-light">
                        <div class="card-header text-center">
                            <h5>ثبت نام در وب سایت</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{route('register')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">نام و نام خانوادگی</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="نام و نام خانوادگی خود را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label for="mobile">شماره موبایل</label>
                                    <input type="tel" name="mobile" id="mobile" class="form-control" placeholder="09XXXXXXXXX" >
                                </div>
                                <div class="form-group">
                                    <label for="password">کلمه عبور</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="کلمه عبور خود را وارد کنید" >
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">تکرار کلمه عبور</label>
                                    <input type="password" name="password_confirmation" id="confirm_password" class="form-control" placeholder="تکرار کلمه عبور خود را وارد کنید" >
                                </div>
                                <label class="container pr-4 ft-14 text-muted">
                                    <input type="checkbox" name="not_robot" >
                                    <span class="checkmark"></span>
                                    <span class="p-2">من رباط نیستم</span>
                                </label>
                                <div class="form-group text-center">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">عضویت</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-muted">
                            اگر در سایت حساب دارید، وارد سایت شوید:
                            <a href="{{route('login')}}" class="text-danger text-decoration-none px-2">
                                ورود به سایت
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
