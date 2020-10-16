@extends('layouts.app')

@section('title')
صفحه اصلی | وبسایت سفیر
@endsection


@section('content')

    <div class="banner custom-control-inline d-none d-md-flex">
        <div>
            <div class="text-banner">
                {{$setting->banner_text}}
            </div>
            <div class="description-banner">
                <p>
                    {{$setting->description_banner}}
                </p>
            </div>
        </div>
        <img src="{{asset('storage/images/'.$setting->banner)}}" class="img-banner rounded" alt="">
    </div>
    <div class="banner d-flex d-md-none">
        <div class="row">
            <div class="col-12">
                <div class="text-banner-min">
                    {{$setting->banner_text}}
                </div>
            </div>
            <div class="col-12">
                <img src="{{asset('storage/images/'.$setting->banner)}}" class="img-banner-min rounded" alt="">
            </div>
            <div class="col-12">
                <div class="description-banner-min">
                    <p>
                        {{$setting->description_banner}}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex">
                    <ul class="nav nav-pills mt-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">جدیدترین ها</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">پرفروشترین ها</a>
                        </li>

                    </ul>
                    <a href="{{url('/courses')}}" class="mr-auto pt-3 mt-2 text-muted">مشاهده همه</a>
                </div>
                <hr class="text-dark border">
                <div class="tab-content mb-3" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="container-fluid">
                            <div class="row">
                                @foreach($courses as $keys=>$course)
                                    @if($keys<8)
                                        <div class="col-md-3 col-sm-4 col-12 mb-3">
                                            <div class="card ">
                                                <a href="{{url('courses/'.$course->slug)}}">
                                                    <img src="{{$course->photo->path}}" class="card-img-top img-card-sf" alt="">
                                                </a>
                                                <div class="card-body">
                                                    <a href="{{url('courses/'.$course->slug)}}" class="text-decoration-none text-dark">
                                                        <h5>
                                                            {{$course->title}}
                                                        </h5>
                                                    </a>
                                                    <p class="text-muted text-justify">
                                                        {{Str::limit($course->description,120)}}
                                                    </p>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="custom-controller-inline">
                                                <span class="p-1" title="افزودن به مورد علاقه ها">
                                                {{$course->likes->count()}}
                                                @include('layouts.like',['subject'=>$course])
                                                </span>
                                                        <span class="p-1" title="دیدگاه ها">
                                                           {{count($course->comments)}}
                                                            <i class="fa fa-comments"></i>
                                                        </span>
                                                        <span class="p-1 text-danger font-weight-bold">
                                                        {{$course->presentPrice()}}
                                                         تومان
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="container-fluid">
                            <div class="row">

                                @foreach($courses as $key=>$course)
                                    @if($key>7 && $key<16)
                                        <div class="col-md-3 col-sm-4 col-12 mb-3">
                                            <div class="card ">
                                                <a href="{{url('courses/'.$course->slug)}}">
                                                    <img src="{{$course->photo->path}}" class="card-img-top img-card-sf" alt="">
                                                </a>
                                                <div class="card-body">
                                                    <a href="{{url('courses/'.$course->slug)}}" class="text-decoration-none text-dark">
                                                        <h5>
                                                            {{$course->title}}
                                                        </h5>
                                                    </a>
                                                    <p class="text-muted  text-justify">
                                                        {{Str::limit($course->description,120)}}
                                                    </p>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="custom-controller-inline">
                                                <span class="p-1" title="افزودن به مورد علاقه ها">
                                          {{$course->likes->count()}}
                                           @include('layouts.like',['subject'=>$course])
                                    </span>
                                                        <span class="p-1 text-danger font-weight-bold">
                                            {{$course->presentPrice()}}
                                            تومان
                                        </span>
                                                        <span class="p-1">
                                                           {{count($course->comments)}}
                                                            <i class="fa fa-comments"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-method h-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="row p-2 m-2">
                        <div class="col-7">
                            <div class="h4">
                                اخرین مجلات
                            </div>
                        </div>
                        <div class="col-5 text-left">
                            <a href="{{url('/gazettes')}}" class="btn btn-primary rounded">همه مجلات</a>
                        </div>
                    </div>
                    @foreach($gazettes as $key=>$gazette)
                        @if($key<4)
                    <div class="card p-1 m-3">
                        <div class="card-body">
                            <a href="{{url('gazettes/'.$gazette->slug)}}" class="text-dark text-decoration-none">
                                <h6 class="text-primary">
                                    {{$gazette->title}}
                                </h6>
                            </a>
                            <div class="tf-12  text-justify">
                            {{Str::limit($gazette->description,100)}}
                            </div>
                        </div>
                    </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-12 col-md-6">
                    <div class="row p-2 m-2">
                        <div class="col-7">
                            <div class="h6 font-weight-bold">
                                اخرین دوره های آپلود شده
                            </div>
                        </div>
                        <div class="col-5 text-left">
                            <a href="{{url('/courses')}}" class="btn btn-primary rounded">همه دوره ها</a>
                        </div>
                    </div>
                    @foreach($courses as $key=>$course)
                    @if($key<4)
                    <div class="card p-1 m-3 bg-silver">
                        <div class="card-body">
                            <a href="{{url('/courses/'.$course->slug)}}" class="text-decoration-none text-light">
                                <h6>
                                    {{$course->title}}
                                </h6>
                            </a>
                            <div class="text-warning tf-12 text-justify">
                            {{Str::limit($course->description,100)}}
                            </div>
                        </div>
                    </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex">
                    <ul class="nav nav-pills mt-3" id="pills-tab1" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="pills-home-tab1" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home1" aria-selected="true">آخرین مقالات</a>
                        </li>
                    </ul>
                    <a href="{{url('/articles')}}" class="mr-auto pt-3 mt-2 text-muted">مشاهده همه مقالات</a>
                </div>
                <hr class="text-dark border">
                <div class="tab-content mb-3" id="pills-tabContent1">
                    <div class="tab-pane fade show active" id="pills-home1" role="tabpanel1" aria-labelledby="pills-home-tab1">
                        <div class="container-fluid">
                            <div class="row">
                                @foreach($articles as $key=>$article)
                                    @if($key<8 )
                                        <div class="col-md-3 col-sm-4 col-12 mb-3">
                                            <div class="card">
                                                <a href="{{url('/articles/'.$article->slug)}}">
                                                    <img src="{{$article->photo->path}}" class="card-img-top img-card-sf" alt="">
                                                </a>
                                                <div class="card-body">
                                                    <a href="{{url('/articles/'.$article->slug)}}" class="text-decoration-none text-dark">
                                                        <h5>
                                                            {{$article->title}}
                                                        </h5>
                                                    </a>
                                                    <p class="text-muted  text-justify">
                                                        {{Str::limit($article->description,120)}}
                                                    </p>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="d-flex">
                                                        <span class="p-1" title="افزودن به مورد علاقه ها">
                                                         {{$article->likes->count()}}
                                                         @include('layouts.like',['subject'=>$article])
                                                        </span>
                                                        <span class="p-1">
                                            {{$article->viewCount}}
                                            <i class="far fa-eye"></i>
                                        </span>
                                                        <span class="p-1">
                                                            {{count($article->comments)}}
                                                            <i class="fa fa-comments"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
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
                        <div class="col-12 text-center pt-2">
                            <span class="h5">تبلیغات شما</span>
                        </div>
                    </div>
                    <hr>
                    @if(!$advertisements->isEmpty())
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner">
                            @foreach($advertisements as $key=>$advertisement)
                                @if($key==0)
                                <div class="carousel-item active">
                                    <a  href="{{url('advertisements/'.$advertisement->id)}}">
                                        <img class="img-propaganda border m-auto d-block w-100" src="{{$advertisement->photo->path}}" alt="First slide">
                                    </a>
                                <div class="carousel-caption d-none d-md-block">
                                    <a href="{{$advertisement->url_address}}" target="_blank" class="text-white text-decoration-none">
                                        <h5>{{$advertisement->title}}</h5>
                                    </a>
                                    <p>{{Str::limit($advertisement->body,30)}}</p>
                                </div>
                            </div>
                                @else
                                <div class="carousel-item">
                                    <a  href="{{url('advertisements/'.$advertisement->id)}}">
                                        <img class="img-propaganda border m-auto d-block w-100" src="{{$advertisement->photo->path}}" alt="First slide">
                                    </a>
                                <div class="carousel-caption d-none d-md-block">
                                    <a href="{{$advertisement->url_address}}" target="_blank" class="text-white text-decoration-none">
                                        <h5>{{$advertisement->title}}</h5>
                                    </a>
                                    <p>{{Str::limit($advertisement->body,30)}}</p>
                                </div>
                            </div>
                                @endif
                            @endforeach
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
                    @endif
                    <div class="mb-1">
                        <div class="card">
                            <div class="text-center card-body">
                                <div class="text-card p-1 ft-13">
                                    برای درج تبلیغات با ما تماس حاصل نمایید
                                </div>
                                <a href="{{url('/advertisements')}}" class="btn btn-block btn-primary">درج آگهی</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="row pt-2 my-2">
                        <div class="col-7">
                            <div class="h5">
                                آخرین کتاب های صوتی
                            </div>
                        </div>
                        <div class="col-5 text-left">
                            <a href="{{url('/podcasts')}}" class="btn btn-primary rounded ft-12">همه کتاب های صوتی</a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        @foreach($podcasts as $keys=>$podcast)
                        @if($keys<3)
                            <div class="col-12 col-md-4">
                            <div class="card mb-2">
                                <a href="{{url('podcasts/'.$podcast->slug)}}" class="text-center">
                                    <img src="{{$podcast->photo->path}}" class="img-card-sf rounded-top" alt="">
                                    <div class="padcast mx-auto">
                                        <i class="fas fa-microphone-alt fa-4x text-light"></i>
                                    </div>
                                </a>
                                <div class="card-body">
                                    <a href="{{url('podcasts/'.$podcast->slug)}}" class="text-dark text-decoration-none">
                                        <h5 class="mt-4">
                                            {{$podcast->title}}
                                        </h5>
                                    </a>
                                    <p class="card-text text-justify m-2">
                                        {{Str::limit($podcast->description,120)}}
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <span class="p-1" title="افزودن به مورد علاقه ها">
                                        {{$podcast->likes->count()}}
                                        @include('layouts.like',['subject'=>$podcast])
                                    </span>
                                    <span class="p-1">
                                        {{$podcast->viewCount}}
                                        <i class="fa fa-assistive-listening-systems"></i>
                                    </span>
                                    <span class="p-1">
                                        {{ count($podcast->comments) }}
                                        <i class="fa fa-comments"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="news-paper">
        <form action="{{route('email.save')}}" class="form-email" method="POST">
            @csrf
            <div class="form-group">
                <label for="email" class="text-light email-bottom py-2"><i class="fas fa-envelope fa-3x"></i></label>
                <hr class="bg-light">
                <input type="email" name="email" id="email" class="form-control form-control-lg" dir="ltr" placeholder="test@email.com">
                <button class="btn btn-primary btn-lg w-50 my-2 btn-news" type="submit">عضویت در خبرنامه</button>
                <h6 class="text-light py-2">جهت اطلاع از رویداد های سایت در خبر نامه عضو شوید. </h6>
            </div>
        </form>
    </div>
    @if(!$achievements->isEmpty())
    <div class=" bg-secondary success">
        <div id="carousel1" class="carousel slide w-100 " data-ride="carousel">

            <div class="carousel-inner">
            @foreach($achievements as $key=>$achievement)
                @if($key==0)
                <div class="carousel-item active">
                    <img class="img-responsive d-block w-100" src="{{asset('images/background-back.jpg')}}" width="100%;" height="350" alt="">
                    <div class="carousel-caption d-none d-md-block">
                        <a class="text-decoration-none text-white" href="{{url('/achievements/'.$achievement->id)}}" >
                            <h2>
                                @if($achievement->user->photo_id)
                                    <img src="{{$achievement->user->photo->path}}" class="rounded-circle" width="90" height="90" alt="">
                                @else
                                    {{$achievement->user->name}}
                                @endif
                            </h2>
                            <p class="text-justify ft-14">{!! Str::limit($achievement->body,300) !!}</p>
                        </a>
                    </div>
                </div>
                @else
                <div class="carousel-item">
                    <img class="img-responsive d-block w-100" src="{{asset('images/background-back.jpg')}}" width="100%;" height="350" alt="">
                    <div class="carousel-caption d-none d-md-block">
                        <a class="text-decoration-none text-white" href="{{url('/achievements/'.$achievement->id)}}" >
                        <h2>
                            @if($achievement->user->photo_id)
                            <img src="{{$achievement->user->photo->path}}" class="rounded-circle" width="90" height="90" alt="">
                            @else
                            {{$achievement->user->name}}
                            @endif
                        </h2>
                        <p>{!! Str::limit($achievement->body,200) !!}</p>
                        </a>
                    </div>
                </div>
                @endif
            @endforeach
            </div>
            <a class="carousel-control-prev" href="#carousel1" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel1" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    @endif

@endsection
