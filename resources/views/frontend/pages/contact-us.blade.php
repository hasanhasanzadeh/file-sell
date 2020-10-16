@extends('layouts.app')

@section('title')
    ارتباط با ما
@endsection

@section('content')

    <section class="contact-us">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="text-center text-light pt-5 my-2">
                        <h1 class="py-5 my-2">ارتباط موثر با ما</h1>
                        <h6>اطلاعات ارتباط با ما رو می توانید در اینجا مشاهده کنید.</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 bg-info">
                <p class="h4 text-light p-3 m-2">
                    با ارتباط موثر با ما به موفقیت می رسید.
                </p>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-light">
        <div class="row">
            <div class="col-12 ">
                <div class="about-me p-2 m-2 ">
                    <h3 class="pt-3">
                        ارتباط با ما
                    </h3>
                    <p class="text-justify text-me">
                        ما در سایت سعی داریم ارتباط دوطرفه و قدرتمندی بین وبسایت آموزشی سایت ایجاد کنیم. اگر احساس کردید به هر دلیلی نیاز به ارتباط با ما دارید میتوانید از یکی از راه‌های ارتباط زیر با ما در ارتباط باشید. اما قبل از اینکه این راه‌ها را برایتان لیست کنم لطفا به نکات زیر دقت کنید تا بتوانیم با شما ارتباط بهتری برقرار کنیم.
                        اگر تصمیم به ارسال نظر یا انتقاد یا پیشنهاد برای بهتر شدن، بخشی در سایت را دارید، لطف نظر خودتان را به پشتیبانی تلگرام سایت ارسال کنید به این شکل میتوانیم نظر شما را بهتر پیگیر شویم .</p>
                    <hr>
                    <h3 class="pt-3">
                        راههای ارتباطی با ما
                    </h3>
                    <p class="text-justify text-me h5">
                    <span class="ft-1rem">
                        <i class="fa fa-envelope"></i>
                        ایمیل :{{$setting->email}}
                    <br>
                        <i class="fab fa-telegram"></i>
                      ای دی تلگرام : <a href="{{'https://t.me/'.$setting->telegram_id}}">{{$setting->telegram_id}} @</a>
                    </span>
                    </p>
                    <hr>
                    <h3 class="py-3">
                        ارسال پیشنهادات و انتقادات ...
                    </h3>
                    <p class="text-justify text-me h5">
                        ارسال پیشنهادات و انتقادات و ...

                        اگر مایل هستید که پیشنهادات یا انتقادات یا حتی سوال‌های خود را به شکل خصوصی برای ما ارسال کنید. میتوایند از طریق فرم زیر استفاده کنید.
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-8 m-auto">
                <div class="card card-none my-4">
                    <div class="card-header bg-info">
                        <h4 class="text-white">ارسال انتقادات و پیشنهادات</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('contact.us')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">عنوان</label>
                                <input type="text" id="title" class="form-control" name="title" placeholder="عنوان انتقاد یا پیشنهاد را واد کنید..." value="{{old('title')}}">
                            </div>
                            <div class="form-group">
                                <label for="description">متن انتقاد یا پیشنهاد</label>
                                <textarea name="description" id="description" class="form-control" placeholder="انتقاد یا پیشنهاد خود را وارد کنید..." cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-lg btn-block">
                                    <i class="fa fa-comment-medical"></i>
                                    ارسال
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
