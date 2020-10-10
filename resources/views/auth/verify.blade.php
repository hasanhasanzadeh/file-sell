@extends('layouts.apps')

@section('title')
    تایید شماره موبایل
@endsection
@section('content')


<div class="verify">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center text-light">
                <h1 class="py-4">تایید شماره موبایل</h1>
                <p class="text-center ft-13 w-75 m-auto">
                    در صورت دریافت کد تایید فقط ۵ دقیقه وقت دارید تا آن را تایید نمایید در غیر این صورت منقضی شده و دوباره ارسال کد کلیک کنید
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 m-auto">
                <div class="card my-4 bg-light">
                    <div class="card-header text-center">
                        <h5>تایید شماره موبایل</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{url('user/active')}}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="code">کد تایید موبایل</label>
                                <input type="text" name="code" id="code" class="form-control" placeholder="کد تایید خود را وارد کنید" >
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">
                                    <i class="fas fa-mobile-alt"></i>
                                    تایید شماره موبایل
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        درصورت منقضی شدن کد تایید لطفا دوباره امتحان کنید
                        <a href="" class="text-danger text-decoration-none px-2">
                            ارسال دوباره کد تایید
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
