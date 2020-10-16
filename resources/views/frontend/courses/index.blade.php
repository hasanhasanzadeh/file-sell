@extends('layouts.app')

@section('title')
    دوره های آموزشی
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row bg-light">
            <div class="col-12 my-2 text-muted">
                <a href="{{url('/')}}" class="text-dark text-decoration-none">
                <span class="p-2">
                صفحه اصلی
                </span>
                </a>
                <span class="ft-1rem">/</span>
                <span class="p-2">
               محصول مورد نظر
            </span>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="p-2 m-2">
                    آموزش موفقیت
                </h2>
            </div>
            <div class="col-12 col-md-9">
                <div class="card card-none mt-1 mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-7">
                                <div class="h4">
                                    توضیحات دوره
                                </div>
                            </div>
                            <div class="col-5 text-left">
                                <a href="#" class="btn btn-primary rounded">سوال درباره این جلسه آموزشی؟</a>
                            </div>
                        </div>

                        <hr class="bg-light">
                        <div class="text-justify text-secondary ft-14">
                            آموزش nodejs از هر زمانی آسان‌تر شده و در این دوره سعی دارم قدم به قدم node را به شما آموزش دهم. اگر نمیدانید node چیست یا چرا باید آن را یاد بگیرید پیشنهاد می‌کنیم . جلسه ابتدای و بخش اول این دوره که به شکل رایگان در اختیار شما قرار دارد را مشاهده کنید.

                            شما با node می‌توانید جاوااسکریپت را مانند یک زبان سمت سرور به شکل کامل مورد استفاده قرار دهید و وبسایت‌های کامل و پیشرفته‌ای با آن ایجاد کنید.
                        </div>
                        <br>
                        <img src="static/images/1583305013laravel-poster-1.png" width="100%;" alt="">
                        <hr class="bg-light">
                        <div class="custom-controller-inline text-muted">
                    <span class="p-1">
                    71
                    <i class="far fa-heart"></i>
                    </span>
                            <span class="p-1">
                    ۳۲
                    <i class="fa fa-comment"></i>
                    </span>
                        </div>
                    </div>
                </div>
                <div class="accordion" id="accordionExample">
                    <div class="card card-none my-2">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0 p-2">
                                <button class="btn btn-link text-decoration-none text-dark btn-block text-right" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <i class="fas fa-ellipsis-v"></i>
                                    بخش اول
                                    <span>|</span>
                                    فیلم های بخش اول
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body w-100">
                                <div class="table table-responsive ft-16">
                                    <table class="table table-borderless">
                                        <tbody class="w-100">
                                        <tr class="text-left">
                                            <td class="text-right badge badge-primary">1</td>
                                            <td class="text-right"><a href="#" class="text-decoration-none text-dark">فیلم موفقیت چیست؟</a></td>
                                            <td class="badge badge-primary">رایگان</td>
                                            <td class="badge badge-primary">12:22</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4"><hr class="bg-light"></td>
                                        </tr>
                                        <tr class="text-left">
                                            <td class="text-right badge badge-primary">2</td>
                                            <td class="text-right"> <a href="#" class="text-decoration-none text-dark">سمینار اثر مرکب</a></td>
                                            <td class=" badge badge-primary">رایگان</td>
                                            <td class=" badge badge-primary">12:22</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card card-none card-primary mb-4 mt-1 ft-13">
                    <div class="card-body">
                        <p class="text-justify text-light">
                            برای دسترسی به این دوره نیاز است بصورت نقدی این دوره را خریداری کنید یا با تهیه عضویت ویژه میتوانید به آن دسترسی پیدا کنید.
                        </p>
                        <hr class="bg-light">
                        <div class="table table-responsive text-light ">
                            <table class="w-100 table-borderless">
                                <tbody>
                                <tr class="text-left">
                                    <td class="text-right">تعداد خریداری شده</td>
                                    <td >16</td>
                                </tr>
                                <tr class="text-left">
                                    <td class="text-right">قیمت</td>
                                    <td class="bg-danger rounded p-2">39,000 تومان</td>
                                </tr>
                                <tr class="text-left">
                                    <td class="text-right">وضعیت دوره</td>
                                    <td >درحال برگزاری</td>
                                </tr>
                                <tr class="text-left">
                                    <td class="text-right">زمان کل دوره</td>
                                    <td >2:21:14</td>
                                </tr>
                                <tr class="text-left">
                                    <td class="text-right">تعداد قسمت ها</td>
                                    <td >3</td>
                                </tr>
                                <tr class="text-left">
                                    <td class="text-right">نوع دسترسی</td>
                                    <td >اعضای ویژه</td>
                                </tr>
                                </tbody>
                            </table>
                            <a href="#" class="btn btn-lg btn-light btn-block text-muted rounded">
                                خریدار این دوره
                            </a>
                        </div>
                    </div>
                    <div class="card-footer bg-warning p-2 m-0">
                        <i class="fa fa-star"></i>
                        <span class="h6 text-muted">
                        دسترسی رایگان برای <a href="#" class="text-dark">اعضای ویژه</a>
                    </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-propaganda my-3 h-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-8">
                            <h5 class="p-2 m-2">
                                دوره های پیشنهادی
                            </h5>
                        </div>
                        <div class="col-4 text-left">
                            <a href="#" class="btn btn-primary mt-3">مشاهده همه</a>
                        </div>
                    </div>
                    <hr >
                    <div class="row">

                        @foreach($courses as  $key=>$course)
                            @if($key<4)
                                <div class="col-md-3 col-12 mb-3">
                            <div class="card ">
                                <a href="{{url('/courses/'.$course->slug)}}">
                                    <img src="{{$course->photo->path}}" class="card-img-top img-card-sf" alt="">
                                </a>
                                <div class="card-body">
                                    <a href="{{url('/courses/'.$course->slug)}}" class="text-decoration-none text-dark">
                                        <h5>
                                            {{$course->title}}
                                        </h5>
                                    </a>
                                    <p class="text-muted text-justify">
                                        {!! Str::limit($course->description,140)!!}
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <div class="custom-controller-inline">
                                        <span class="p-1" title="افزودن به مورد علاقه ها">
                                            {{$course->likes->count()}}
                                            @include('layouts.like',['subject'=>$course])
                                        </span>
                                        <span class="p-1">
                                           {{$course->viewCount}}
                                            <i class="far fa-eye"></i>
                                        </span>
                                        <span class="p-1">
                                            {{count($course->comments) }}
                                            <i class="far fa-comment"></i>
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-none m-3">
                    <div class="card-header">
                        <h3>دیدگاه ها و پرسشها
                            <span><a href="#" class="btn btn-primary p-2 mr-4">ارسال نظر</a></span>
                        </h3>
                    </div>
                    <div class="card-body">
                        <img src="static/images/attachment_106359975.png" class="rounded-circle" height="100" width="100" alt="">
                        <a href="#" class="btn btn-primary float-left">پاسخ به نظر</a>

                        <p class="text-justify-fa text-justify ft-14">
                            طراحی یا صفحه بندی شده بعد از اینکه متن در آن قرار گیرد چگونه به نظر می‌رسد و قلم‌ها و اندازه‌بندی‌ها چگونه در نظر گرفته شده‌است. از آنجایی که طراحان عموما نویسنده متن نیستند و وظیفه رعایت حق تکثیر متون را ندارند و در همان حال کار آنها به نوعی وابسته به متن می‌باشد آنها با استفاده از محتویات ساختگی، صفحه گرافیکی خود را صفحه‌آرایی می‌کنند تا مرحله طراحی و صفحه‌بندی را به پایان برند.
                        </p>
                        <hr class="bg-light">
                        <img src="static/images/unr_harrypotter_170526_1157_9swsxw.png" class="rounded-circle" height="100" width="100" alt="">
                        <a href="#" class="btn btn-primary float-left">پاسخ به نظر</a>
                        <p class="text-justify-fa text-justify ft-14">
                            طراحی یا صفحه بندی شده بعد از اینکه متن در آن قرار گیرد چگونه به نظر می‌رسد و قلم‌ها و اندازه‌بندی‌ها چگونه در نظر گرفته شده‌است. از آنجایی که طراحان عموما نویسنده متن نیستند و وظیفه رعایت حق تکثیر متون را ندارند و در همان حال کار آنها به نوعی وابسته به متن می‌باشد آنها با استفاده از محتویات ساختگی، صفحه گرافیکی خود را صفحه‌آرایی می‌کنند تا مرحله طراحی و صفحه‌بندی را به پایان برند.
                        </p>
                        <hr class="bg-light">
                        <img src="static/images/3a879f07d46ec94c28e7ca9e6f111790.jpg" class="rounded-circle" height="100" width="100" alt="">
                        <a href="#" class="btn btn-primary float-left">پاسخ به نظر</a>
                        <p class="text-justify-fa text-justify ft-14">
                            طراحی یا صفحه بندی شده بعد از اینکه متن در آن قرار گیرد چگونه به نظر می‌رسد و قلم‌ها و اندازه‌بندی‌ها چگونه در نظر گرفته شده‌است. از آنجایی که طراحان عموما نویسنده متن نیستند و وظیفه رعایت حق تکثیر متون را ندارند و در همان حال کار آنها به نوعی وابسته به متن می‌باشد آنها با استفاده از محتویات ساختگی، صفحه گرافیکی خود را صفحه‌آرایی می‌کنند تا مرحله طراحی و صفحه‌بندی را به پایان برند.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
