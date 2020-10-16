@extends('layouts.apps')

@section('title')
    تخفیف {{$coupon->title}}
@endsection

@section('content')


    <div class="container-fluid bg-second">
        <div class="row">
            <div class="col-12">
                <div class="card card-none">
                    <div class="card-header h3 text-center">
                        تخفیف {{$coupon->title}}
                    </div>
                   <div class="card-body">
                       <h4 class="text-center">
                           <img src="{{$coupon->photo->path}}" width="250" height="250" alt="">
                       </h4>
                       <p class="text-justify m-2 p-3">
                           {{$coupon->description}}
                       </p>
                   </div>
                    <div class="card-footer text-center">
                        <h2 class="my-1 py-1 ">
                        <span>
                        کد تخفیف :
                        </span>
                            {{$coupon->code}}
                        </h2>
                        <a href="{{url('/')}}" class="btn btn-info btn-lg">
                            <i class="fa fa-home"></i>
                            بازگشت به صفحه اصلی
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
