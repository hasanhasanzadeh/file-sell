@extends('layouts.error_master')

@section('title')
صفحه مورد نظر پیدا نشد | 404
@endsection

@section('content')

    <div class="text-center">
        <i class="far fa-frown-open display-2 my-4 text-info"></i>
        <h4 class="my-5">
            صفحه مورد نظر یافت نشد!
        </h4>
        <hr class="w-50 text-center">
        <h1 class="text-info display-2">
           !!  404  !!
        </h1>
        <hr class="w-50 text-center">
        <a href="{{url('/')}}" class="btn btn-info p-2">
            ورود به صفحه اصلی
        </a>
    </div>

@endsection
