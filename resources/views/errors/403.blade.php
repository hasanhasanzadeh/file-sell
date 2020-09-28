@extends('layouts.error_master')

@section('title')
    دسترسی به این قسمت برای شما صادر نشده است | 403
@endsection

@section('content')

    <div class="text-center">
        <i class="far fa-frown-open display-2 my-4 text-info"></i>
        <h4 class="my-5">
            دسترسی لازم به این قسمت را ندارید!
        </h4>
        <hr class="w-50 text-center">
        <h1 class="text-info display-2">
            !!  403  !!
        </h1>
        <hr class="w-50 text-center">
        <a href="{{url('/admin')}}" class="btn btn-info p-2">
            ورود به صفحه اصلی
        </a>
    </div>

@endsection
