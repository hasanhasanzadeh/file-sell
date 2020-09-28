@extends('layouts.app')

@section('title')
ورود به وب سایت
@endsection

@section('content')

    <div class="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 m-auto">
                    <div class="card my-4 bg-light">
                        <div class="card-header text-center">
                            <h5>ورود به وب سایت</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{route('login')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="mobile">شماره موبایل</label>
                                    <input type="tel" name="mobile" id="mobile" class="form-control" placeholder="09XXXXXXXXX" value="{{old('mobile')}}">
                                </div>
                                <div class="form-group">
                                    <label for="password">کلمه عبور</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="کلمه عبور خود را وارد کنید" value="{{old('password')}}">
                                </div>
                                <label class="container pr-4 ft-12 text-muted">
                                    <input type="checkbox" checked="checked">
                                    <span class="checkmark"></span>
                                    <span class="p-2">مرا به خاطر بسپار</span>
                                </label>
                                <div class="form-group text-center">
                                    <button class="btn btn-primary btn-block" type="submit">ورود</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-muted">
                            اگر در سایت حساب ندارید، ثبت نام کنید:
                            <a href="{{route('register')}}" class="text-danger text-decoration-none px-2">
                                ایجاد حساب کاربری
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
