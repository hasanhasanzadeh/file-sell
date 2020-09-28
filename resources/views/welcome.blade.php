@extends('layouts.app')

@section('title')
صفحه اصلی | وبسایت سفیر
@endsection


@section('content')

    <div class="banner custom-control-inline d-none d-md-flex">
        <div>
            <div class="text-banner">
                فیلم موفقیت در زندگی
            </div>
            <div class="description-banner">
                <p>
                    but we cannot warrant full correctness of all content. While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy. Copyright 1999-2020 by Refsnes Data. All Rights Reserved
                </p>
            </div>
        </div>
        <img src="{{asset('images/success.jpg')}}" class="img-banner" alt="">
    </div>
    <div class="banner d-flex d-md-none">
        <div class="row">
            <div class="col-12">
                <div class="text-banner-min">
                    فیلم موفقیت در زندگی
                </div>
            </div>
            <div class="col-12">
                <img src="{{asset('images/success.jpg')}}" class="img-banner-min" alt="">
            </div>
            <div class="col-12">
                <div class="description-banner-min">
                    <p>
                        but we cannot warrant full correctness of all content. While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy. Copyright 1999-2020 by Refsnes Data. All Rights Reserved
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <ul class="nav nav-pills mt-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">جدیدترین ها</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">پرفروشترین ها</a>
                </li>

            </ul>
            <a href="#" class="mr-auto pt-4 pb-0 pl-4 text-muted">مشاهده همه</a>
            <hr class="text-dark border w-100 m-4">
            <div class="tab-content mb-3" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3 col-sm-4 col-12 mb-3">
                                <div class="card ">
                                    <a href="#">
                                        <img src="{{asset('images/angular.png')}}" class="card-img-top img-card-sf" alt="">
                                    </a>
                                    <div class="card-body">
                                        <a href="#" class="text-decoration-none text-dark">
                                            <h5>
                                                name products
                                            </h5>
                                        </a>
                                        <p class="text-muted">
                                            description product about
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="custom-controller-inline">
                                        <span class="p-1">
                                            78
                                            <i class="far fa-heart"></i>
                                        </span>
                                            <span class="p-1">
                                            01:24:23
                                            <i class="far fa-clock"></i>
                                        </span>
                                            <span class="p-1 text-danger font-weight-bold">
                                            29,000
                                            تومان
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-12 mb-3">
                                <div class="card">
                                    <a href="#">
                                        <img src="{{asset('images/node.png')}}" class="card-img-top img-card-sf" alt="">
                                    </a>
                                    <div class="card-body">
                                        <a href="#" class="text-decoration-none text-dark">
                                            <h5>
                                                name products
                                            </h5>
                                        </a>
                                        <p class="text-muted">
                                            description product about
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="custom-controller-inline">
                                        <span class="p-1">
                                            78
                                            <i class="far fa-heart"></i>
                                        </span>
                                            <span class="p-1">
                                            01:24:23
                                            <i class="far fa-clock"></i>
                                        </span>
                                            <span class="p-1 text-danger font-weight-bold">
                                            29,000
                                            تومان
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-12 mb-3">
                                <div class="card">
                                    <a href="#">
                                        <img src="{{asset('images/1583305013laravel-poster-1.png')}}" class="card-img-top img-card-sf" alt="">
                                    </a>
                                    <div class="card-body">
                                        <a href="#" class="text-dark text-decoration-none">
                                            <h5>
                                                name products
                                            </h5>
                                        </a>
                                        <p class="text-muted">
                                            description product about
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="custom-controller-inline">
                                        <span class="p-1">
                                            78
                                            <i class="far fa-heart"></i>
                                        </span>
                                            <span class="p-1">
                                            01:24:23
                                            <i class="far fa-clock"></i>
                                        </span>
                                            <span class="p-1 text-danger font-weight-bold">
                                            29,000
                                            تومان
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-12 mb-3">
                                <div class="card">
                                    <a href="#">
                                        <img src="{{asset('images/next.png')}}" class="card-img-top img-card-sf" alt="">
                                    </a>
                                    <div class="card-body">
                                        <a href="#" class="text-decoration-none text-dark">
                                            <h5>
                                                name products
                                            </h5>
                                        </a>
                                        <p class="text-muted">
                                            description product about
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="custom-controller-inline">
                                        <span class="p-1">
                                            78
                                            <i class="far fa-heart"></i>
                                        </span>
                                            <span class="p-1">
                                            01:24:23
                                            <i class="far fa-clock"></i>
                                        </span>
                                            <span class="p-1 text-danger font-weight-bold">
                                            29,000
                                            تومان
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-12 mb-3">
                                <div class="card">
                                    <a href="#">
                                        <img src="{{asset('images/angular.png')}}" class="card-img-top img-card-sf" alt="">
                                    </a>
                                    <div class="card-body">
                                        <a href="#" class="text-decoration-none text-dark">
                                            <h5>
                                                name products
                                            </h5>
                                        </a>
                                        <p class="text-muted">
                                            description product about
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="custom-controller-inline">
                                        <span class="p-1">
                                            78
                                            <i class="far fa-heart"></i>
                                        </span>
                                            <span class="p-1">
                                            01:24:23
                                            <i class="far fa-clock"></i>
                                        </span>
                                            <span class="p-1 text-danger font-weight-bold">
                                            29,000
                                            تومان
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-12 mb-3">
                                <div class="card">
                                    <a href="#">
                                        <img src="{{asset('images/node.png')}}" class="card-img-top img-card-sf" alt="">
                                    </a>
                                    <div class="card-body">
                                        <a href="#" class="text-decoration-none text-dark">
                                            <h5>
                                                name products
                                            </h5>
                                        </a>
                                        <p class="text-muted">
                                            description product about
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="custom-controller-inline">
                                        <span class="p-1">
                                            78
                                            <i class="far fa-heart"></i>
                                        </span>
                                            <span class="p-1">
                                            01:24:23
                                            <i class="far fa-clock"></i>
                                        </span>
                                            <span class="p-1 text-danger font-weight-bold">
                                            29,000
                                            تومان
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-12 mb-3">
                                <div class="card">
                                    <a href="#">
                                        <img src="{{asset('images/1583305013laravel-poster-1.png')}}" class="card-img-top img-card-sf" alt="">
                                    </a>
                                    <div class="card-body">
                                        <a href="#" class="text-dark text-decoration-none">
                                            <h5>
                                                name products
                                            </h5>
                                        </a>
                                        <p class="text-muted">
                                            description product about
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="custom-controller-inline">
                                        <span class="p-1">
                                            78
                                            <i class="far fa-heart"></i>
                                        </span>
                                            <span class="p-1">
                                            01:24:23
                                            <i class="far fa-clock"></i>
                                        </span>
                                            <span class="p-1 text-danger font-weight-bold">
                                            29,000
                                            تومان
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-12 mb-3">
                                <div class="card">
                                    <a href="#">
                                        <img src="{{asset('images/next.png')}}" class="card-img-top img-card-sf" alt="">
                                    </a>
                                    <div class="card-body">
                                        <a href="#" class="text-decoration-none text-dark">
                                            <h5>
                                                name products
                                            </h5>
                                        </a>
                                        <p class="text-muted">
                                            description product about
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="custom-controller-inline">
                                        <span class="p-1">
                                            78
                                            <i class="far fa-heart"></i>
                                        </span>
                                            <span class="p-1">
                                            01:24:23
                                            <i class="far fa-clock"></i>
                                        </span>
                                            <span class="p-1 text-danger font-weight-bold">
                                            29,000
                                            تومان
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3 col-sm-4 col-12 mb-3">
                                <div class="card">
                                    <a href="#">
                                        <img src="{{asset('images/angular.png')}}" class="card-img-top img-card-sf" alt="">
                                    </a>
                                    <div class="card-body">
                                        <a href="#" class="text-decoration-none text-dark">
                                            <h5>
                                                name products
                                            </h5>
                                        </a>
                                        <p class="text-muted">
                                            description product about
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="custom-controller-inline">
                                        <span class="p-1">
                                            78
                                            <i class="far fa-heart"></i>
                                        </span>
                                            <span class="p-1">
                                            01:24:23
                                            <i class="far fa-clock"></i>
                                        </span>
                                            <span class="p-1 text-danger font-weight-bold">
                                            29,000
                                            تومان
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-12 mb-3">
                                <div class="card">
                                    <a href="#">
                                        <img src="{{asset('images/node.png')}}" class="card-img-top img-card-sf" alt="">
                                    </a>
                                    <div class="card-body">
                                        <a href="#" class="text-decoration-none text-dark">
                                            <h5>
                                                name products
                                            </h5>
                                        </a>
                                        <p class="text-muted">
                                            description product about
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="custom-controller-inline">
                                        <span class="p-1">
                                            78
                                            <i class="far fa-heart"></i>
                                        </span>
                                            <span class="p-1">
                                            01:24:23
                                            <i class="far fa-clock"></i>
                                        </span>
                                            <span class="p-1 text-danger font-weight-bold">
                                            29,000
                                            تومان
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-12 mb-3">
                                <div class="card">
                                    <a href="#">
                                        <img src="{{asset('images/1583305013laravel-poster-1.png')}}" class="card-img-top img-card-sf" alt="">
                                    </a>
                                    <div class="card-body">
                                        <a href="#" class="text-dark text-decoration-none">
                                            <h5>
                                                name products
                                            </h5>
                                        </a>
                                        <p class="text-muted">
                                            description product about
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="custom-controller-inline">
                                        <span class="p-1">
                                            78
                                            <i class="far fa-heart"></i>
                                        </span>
                                            <span class="p-1">
                                            01:24:23
                                            <i class="far fa-clock"></i>
                                        </span>
                                            <span class="p-1 text-danger font-weight-bold">
                                            29,000
                                            تومان
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-12 mb-3">
                                <div class="card">
                                    <a href="#">
                                        <img src="{{asset('images/next.png')}}" class="card-img-top img-card-sf" alt="">
                                    </a>
                                    <div class="card-body">
                                        <a href="#" class="text-decoration-none text-dark">
                                            <h5>
                                                name products
                                            </h5>
                                        </a>
                                        <p class="text-muted">
                                            description product about
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="custom-controller-inline">
                                        <span class="p-1">
                                            78
                                            <i class="far fa-heart"></i>
                                        </span>
                                            <span class="p-1">
                                            01:24:23
                                            <i class="far fa-clock"></i>
                                        </span>
                                            <span class="p-1 text-danger font-weight-bold">
                                            29,000
                                            تومان
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-12 mb-3">
                                <div class="card">
                                    <a href="#">
                                        <img src="{{asset('images/angular.png')}}" class="card-img-top img-card-sf" alt="">
                                    </a>
                                    <div class="card-body">
                                        <a href="#" class="text-decoration-none text-dark">
                                            <h5>
                                                name products
                                            </h5>
                                        </a>
                                        <p class="text-muted">
                                            description product about
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="custom-controller-inline">
                                        <span class="p-1">
                                            78
                                            <i class="far fa-heart"></i>
                                        </span>
                                            <span class="p-1">
                                            01:24:23
                                            <i class="far fa-clock"></i>
                                        </span>
                                            <span class="p-1 text-danger font-weight-bold">
                                            29,000
                                            تومان
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-12 mb-3">
                                <div class="card">
                                    <a href="#">
                                        <img src="{{asset('images/node.png')}}" class="card-img-top img-card-sf" alt="">
                                    </a>
                                    <div class="card-body">
                                        <a href="#" class="text-decoration-none text-dark">
                                            <h5>
                                                name products
                                            </h5>
                                        </a>
                                        <p class="text-muted">
                                            description product about
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="custom-controller-inline">
                                        <span class="p-1">
                                            78
                                            <i class="far fa-heart"></i>
                                        </span>
                                            <span class="p-1">
                                            01:24:23
                                            <i class="far fa-clock"></i>
                                        </span>
                                            <span class="p-1 text-danger font-weight-bold">
                                            29,000
                                            تومان
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-12 mb-3">
                                <div class="card">
                                    <a href="#">
                                        <img src="{{asset('images/1583305013laravel-poster-1.png')}}" class="card-img-top img-card-sf" alt="">
                                    </a>
                                    <div class="card-body">
                                        <a href="#" class="text-dark text-decoration-none">
                                            <h5>
                                                name products
                                            </h5>
                                        </a>
                                        <p class="text-muted">
                                            description product about
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="custom-controller-inline">
                                        <span class="p-1">
                                            78
                                            <i class="far fa-heart"></i>
                                        </span>
                                            <span class="p-1">
                                            01:24:23
                                            <i class="far fa-clock"></i>
                                        </span>
                                            <span class="p-1 text-danger font-weight-bold">
                                            29,000
                                            تومان
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-12 mb-3">
                                <div class="card">
                                    <a href="#">
                                        <img src="{{asset('images/next.png')}}" class="card-img-top img-card-sf" alt="">
                                    </a>
                                    <div class="card-body">
                                        <a href="#" class="text-decoration-none text-dark">
                                            <h5>
                                                name products
                                            </h5>
                                        </a>
                                        <p class="text-muted">
                                            description product about
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="custom-controller-inline">
                                        <span class="p-1">
                                            78
                                            <i class="far fa-heart"></i>
                                        </span>
                                            <span class="p-1">
                                            01:24:23
                                            <i class="far fa-clock"></i>
                                        </span>
                                            <span class="p-1 text-danger font-weight-bold">
                                            29,000
                                            تومان
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-method ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="row p-2 m-2">
                        <div class="col-7">
                            <div class="h4">
                                اخرین مقالات
                            </div>
                        </div>
                        <div class="col-5 text-left">
                            <a href="#" class="btn btn-primary rounded">همه مقالات</a>
                        </div>
                    </div>
                    <div class="card p-1 m-3">
                        <div class="card-body">
                            <a href="#" class="text-dark text-decoration-none">
                                <h6>
                                    ویدیوهای داران هاردی - قسمت 12
                                </h6>
                            </a>
                            <span class="tf-12">
                            توضیحات
                            <span class="text-danger">-12 قسمت</span>
                        </span>
                        </div>
                    </div>
                    <div class="card p-1 m-3">
                        <div class="card-body">
                            <a href="#" class="text-dark text-decoration-none">
                                <h6>
                                    ویدیوهای داران هاردی - قسمت 12
                                </h6>
                            </a>
                            <span class="tf-12">
                            توضیحات
                            <span class="text-danger">-12 قسمت</span>
                        </span>
                        </div>
                    </div>
                    <div class="card p-1 m-3">
                        <div class="card-body">
                            <a href="#" class="text-dark text-decoration-none">
                                <h6>
                                    ویدیوهای داران هاردی - قسمت 12
                                </h6>
                            </a>
                            <span class="tf-12">
                            توضیحات
                            <span class="text-danger">-12 قسمت</span>
                        </span>
                        </div>
                    </div>
                    <div class="card p-1 m-3">
                        <div class="card-body">
                            <a href="#" class="text-dark text-decoration-none">
                                <h6>
                                    ویدیوهای داران هاردی - قسمت 12
                                </h6>
                            </a>
                            <span class="tf-12">
                            توضیحات
                            <span class="text-danger">-12 قسمت</span>
                        </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="row p-2 m-2">
                        <div class="col-7">
                            <div class="h4">
                                اخرین مقالات
                            </div>
                        </div>
                        <div class="col-5 text-left">
                            <a href="#" class="btn btn-primary rounded">همه مقالات</a>
                        </div>
                    </div>
                    <div class="card p-1 m-3 bg-silver">
                        <div class="card-body">
                            <a href="#" class="text-decoration-none text-light">
                                <h6>
                                    ویدیوهای داران هاردی
                                </h6>
                            </a>
                            <span class="text-warning tf-12">
                            توضیحات- قسمت 12
                        </span>
                        </div>
                    </div>
                    <div class="card p-1 m-3 bg-silver">
                        <div class="card-body">
                            <a href="#" class="text-decoration-none text-light">
                                <h6>
                                    ویدیوهای داران هاردی
                                </h6>
                            </a>
                            <span class="text-warning tf-12">
                            توضیحات- قسمت 12
                        </span>
                        </div>
                    </div>
                    <div class="card p-1 m-3 bg-silver">
                        <div class="card-body">
                            <a href="#" class="text-decoration-none text-light">
                                <h6>
                                    ویدیوهای داران هاردی
                                </h6>
                            </a>
                            <span class="text-warning tf-12">
                            توضیحات- قسمت 12
                        </span>
                        </div>
                    </div>
                    <div class="card p-1 m-3 bg-silver">
                        <div class="card-body">
                            <a href="#" class="text-decoration-none text-light">
                                <h6>
                                    ویدیوهای داران هاردی
                                </h6>
                            </a>
                            <span class="text-warning tf-12">
                            توضیحات- قسمت 12
                        </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <ul class="nav nav-pills mt-3" id="pills-tab1" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pills-home-tab1" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home1" aria-selected="true">آخرین مقالات</a>
                </li>
            </ul>
            <a href="#" class="mr-auto pt-4 pb-0 pl-4 text-muted">مشاهده همه مقالات</a>
            <hr class="text-dark border w-100 m-4">
            <div class="tab-content mb-3" id="pills-tabContent1">
                <div class="tab-pane fade show active" id="pills-home1" role="tabpanel1" aria-labelledby="pills-home-tab1">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3 col-sm-4 col-12 mb-3">
                                <div class="card ">
                                    <a href="#">
                                        <img src="{{asset('images/angular.png')}}" class="card-img-top img-card-sf" alt="">
                                    </a>
                                    <div class="card-body">
                                        <a href="#" class="text-decoration-none text-dark">
                                            <h5>
                                                name products
                                            </h5>
                                        </a>
                                        <p class="text-muted">
                                            description product about
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="custom-controller-inline">
                                        <span class="p-1">
                                            78
                                            <i class="far fa-heart"></i>
                                        </span>
                                            <span class="p-1">
                                            121
                                            <i class="far fa-eye"></i>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-12 mb-3">
                                <div class="card">
                                    <a href="#">
                                        <img src="{{asset('images/node.png')}}" class="card-img-top img-card-sf" alt="">
                                    </a>
                                    <div class="card-body">
                                        <a href="#" class="text-decoration-none text-dark">
                                            <h5>
                                                name products
                                            </h5>
                                        </a>
                                        <p class="text-muted">
                                            description product about
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="custom-controller-inline">
                                        <span class="p-1">
                                            78
                                            <i class="far fa-heart"></i>
                                        </span>
                                            <span class="p-1">
                                            121
                                            <i class="far fa-eye"></i>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-12 mb-3">
                                <div class="card">
                                    <a href="#">
                                        <img src="{{asset('images/1583305013laravel-poster-1.png')}}" class="card-img-top img-card-sf" alt="">
                                    </a>
                                    <div class="card-body">
                                        <a href="#" class="text-dark text-decoration-none">
                                            <h5>
                                                name products
                                            </h5>
                                        </a>
                                        <p class="text-muted">
                                            description product about
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="custom-controller-inline">
                                        <span class="p-1">
                                            78
                                            <i class="far fa-heart"></i>
                                        </span>
                                            <span class="p-1">
                                            121
                                            <i class="far fa-eye"></i>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-12 mb-3">
                                <div class="card">
                                    <a href="#">
                                        <img src="{{asset('images/next.png')}}" class="card-img-top img-card-sf" alt="">
                                    </a>
                                    <div class="card-body">
                                        <a href="#" class="text-decoration-none text-dark">
                                            <h5>
                                                name products
                                            </h5>
                                        </a>
                                        <p class="text-muted">
                                            description product about
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="custom-controller-inline">
                                        <span class="p-1">
                                            78
                                            <i class="far fa-heart"></i>
                                        </span>
                                            <span class="p-1">
                                            121
                                            <i class="far fa-eye"></i>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-12 mb-3">
                                <div class="card">
                                    <a href="#">
                                        <img src="{{asset('images/angular.png')}}" class="card-img-top img-card-sf" alt="">
                                    </a>
                                    <div class="card-body">
                                        <a href="#" class="text-decoration-none text-dark">
                                            <h5>
                                                name products
                                            </h5>
                                        </a>
                                        <p class="text-muted">
                                            description product about
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="custom-controller-inline">
                                        <span class="p-1">
                                            78
                                            <i class="far fa-heart"></i>
                                        </span>
                                            <span class="p-1">
                                            121
                                            <i class="far fa-eye"></i>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-12 mb-3">
                                <div class="card">
                                    <a href="#">
                                        <img src="{{asset('images/node.png')}}" class="card-img-top img-card-sf" alt="">
                                    </a>
                                    <div class="card-body">
                                        <a href="#" class="text-decoration-none text-dark">
                                            <h5>
                                                name products
                                            </h5>
                                        </a>
                                        <p class="text-muted">
                                            description product about
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="custom-controller-inline">
                                        <span class="p-1">
                                            78
                                            <i class="far fa-heart"></i>
                                        </span>
                                            <span class="p-1">
                                            121
                                            <i class="far fa-eye"></i>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-12 mb-3">
                                <div class="card">
                                    <a href="#">
                                        <img src="{{asset('images/1583305013laravel-poster-1.png')}}" class="card-img-top img-card-sf" alt="">
                                    </a>
                                    <div class="card-body">
                                        <a href="#" class="text-dark text-decoration-none">
                                            <h5>
                                                name products
                                            </h5>
                                        </a>
                                        <p class="text-muted">
                                            description product about
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="custom-controller-inline">
                                        <span class="p-1">
                                            78
                                            <i class="far fa-heart"></i>
                                        </span>
                                            <span class="p-1">
                                            121
                                            <i class="far fa-eye"></i>
                                        </span>
                                            <span class="p-1 text-danger font-weight-bold">
                                            29,000
                                            تومان
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-12 mb-3">
                                <div class="card">
                                    <a href="#">
                                        <img src="{{asset('images/next.png')}}" class="card-img-top img-card-sf" alt="">
                                    </a>
                                    <div class="card-body">
                                        <a href="#" class="text-decoration-none text-dark">
                                            <h5>
                                                name products
                                            </h5>
                                        </a>
                                        <p class="text-muted">
                                            description product about
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="custom-controller-inline">
                                        <span class="p-1">
                                            78
                                            <i class="far fa-heart"></i>
                                        </span>
                                            <span class="p-1">
                                            121
                                            <i class="far fa-eye"></i>
                                        </span>
                                            <span class="p-1 text-danger font-weight-bold">
                                            29,000
                                            تومان
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-propaganda">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-3">
                    <div class="row pt-2 my-2">
                        <div class="col-12 text-center">
                            <span class="h4">تبلیغات شما</span>
                        </div>
                    </div>
                    <hr>
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="img-propaganda border m-auto d-block w-100" src="{{asset('images/ADS-SHAKHES0.jpg')}}" alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <a href="#" class="text-primary text-decoration-none">
                                        <h5>تبلیغات شماره 1</h5>
                                    </a>
                                    <p>توضیحاتی کوتاه در باره تبلغات</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="img-propaganda border m-auto d-block w-100" src="{{asset('images/unnamedfds.jpg')}}" alt="Second slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <a href="#" class="text-primary text-decoration-none">
                                        <h5>تبلیغات شماره 2</h5>
                                    </a>
                                    <p>توضیحاتی کوتاه در باره تبلغات</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="img-propaganda border m-auto d-block w-100" src="{{asset('images/ciubkmzajsbz.jpeg')}}" alt="Third slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <a href="#" class="text-primary text-decoration-none">
                                        <h5>تبلیغات شماره 3</h5>
                                    </a>
                                    <p>توضیحاتی کوتاه در باره تبلغات</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="img-propaganda border m-auto d-block w-100" src="{{url('images/Choosing-the-Best-Ad-Methods-for-Your-Business-belovedmarketing-1-1200x560.jpg')}}" alt="Third slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <a href="#" class="text-primary text-decoration-none">
                                        <h5>تبلیغات شماره 4</h5>
                                    </a>
                                    <p>توضیحاتی کوتاه در باره تبلغات</p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="my-1">
                        <div class="card">
                            <div class="text-center card-body">
                                <div class="text-card p-1 ft-13">
                                    برای درج تبلیغات با ما تماس حاصل نمایید
                                </div>
                                <a href="#" class="btn btn-block btn-primary">درج آگهی</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="row pt-1 my-1">
                        <div class="col-7">
                            <div class="h4">
                                آخرین پادکست ها
                            </div>
                        </div>
                        <div class="col-5 text-left">
                            <a href="#" class="btn btn-primary rounded">همه پادکستها</a>
                        </div>
                    </div>
                    <hr >
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="card mb-2">
                                <a href="#" class="text-center">
                                    <img src="{{asset('images/PADCAST-MIC.jpg')}}" class="img-card-sf rounded-top" alt="">
                                    <div class="padcast mx-auto">
                                        <i class="fas fa-microphone-alt fa-4x text-light"></i>
                                    </div>
                                </a>
                                <div class="card-body">
                                    <a href="#" class="text-dark text-decoration-none">
                                        <h5 class="mt-4">
                                            نام پادکست
                                        </h5>
                                    </a>
                                    <p class="card-text text-justify m-2">
                                        در این راکت‌کست قصد دارم در مورد وردپرس صحبت کنم، وردپرسی که یکی از محبوب ترین CMS های حال حاضر جهان است و کمتر کسی میتواند پیدا شود که آن را نشناسد . اما این CMS محبوب در کنار کاربردی عالیش در ایجاد..
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card mb-2">
                                <a href="#" class="text-center">
                                    <img src="{{asset('images/9qtkcut3vdht.jpeg')}}" class="img-card-sf rounded-top" alt="">
                                    <div class="padcast mx-auto">
                                        <i class="fas fa-microphone-alt fa-4x text-light"></i>
                                    </div>
                                </a>
                                <div class="card-body">
                                    <a href="#" class="text-dark text-decoration-none">
                                        <h5 class="mt-4">
                                            نام پادکست
                                        </h5>
                                    </a>
                                    <p class="card-text text-justify m-2">
                                        در این راکت‌کست قصد دارم در مورد وردپرس صحبت کنم، وردپرسی که یکی از محبوب ترین CMS های حال حاضر جهان است و کمتر کسی میتواند پیدا شود که آن را نشناسد . اما این CMS محبوب در کنار کاربردی عالیش در ایجاد..
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card mb-2">
                                <a href="#" class="text-center">
                                    <img src="{{asset('images/PADCAST-MIC.jpg')}}" class="img-card-sf rounded-top" alt="">
                                    <div class="padcast mx-auto">
                                        <i class="fas fa-microphone-alt fa-4x text-light"></i>
                                    </div>
                                </a>
                                <div class="card-body">
                                    <a href="#" class="text-dark text-decoration-none">
                                        <h5 class="mt-4">
                                            نام پادکست
                                        </h5>
                                    </a>
                                    <p class="card-text text-justify m-2">
                                        در این راکت‌کست قصد دارم در مورد وردپرس صحبت کنم، وردپرسی که یکی از محبوب ترین CMS های حال حاضر جهان است و کمتر کسی میتواند پیدا شود که آن را نشناسد . اما این CMS محبوب در کنار کاربردی عالیش در ایجاد..
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="news-paper">
        <form action="" class="form-email">
            <div class="form-group">
                <label for="email" class="text-light email-bottom py-2"><i class="fas fa-envelope fa-3x"></i></label>
                <hr class="bg-light">
                <input type="email" name="email" id="email" class="form-control form-control-lg" dir="ltr" placeholder="test@email.com">
                <button class="btn btn-primary btn-lg w-50 my-2 btn-news" type="submit">عضویت در خبرنامه</button>
                <h6 class="text-light font-weight-bold py-2">جهت اطلاع از رویداد های سایت در خبر نامه عضو شوید. </h6>
            </div>
        </form>
    </div>
@endsection
