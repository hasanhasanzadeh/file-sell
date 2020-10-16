@extends('layouts.app')

@section('title')
    تبلیغات
@endsection

@section('content')
    <section class="ads">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="text-center text-light pt-5 my-2">
                        <h1 class="pt-5 my-2">تبلیغات</h1>
                        <h6 class="py-1">تبلیغات خود را در صفحات ما نمایش دهید.</h6>
                        <a href="{{url('/advertisements')}}" class="btn btn-primary">
                            <i class="fas fa-bullhorn"></i>
                            درج تبلیغات
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 bg-info">
                <p class="h4 text-light p-3 m-2">
                    تبلیغات خود را در سایت ما بهتر به نمایش بگذارید.
                </p>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-light">
        <div class="row">
            <div class="col-12">
                <div class="about-me p-2 m-2 ">
                    <div class="row my-4">
                        <div class="col-12 col-sm-4 col-md-2">
                            <img src="{{asset('/images/sponser.png')}}" class="rounded-circle shadow" width="100%;" height="100%;" alt="">
                        </div>
                        <div class="col-12 col-sm-8 col-md-10">
                            <h5 class="text-primary">اسپانسر سایت</h5>
                            <p class="text-justify text-me">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد.
                            </p>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-12 col-sm-4 col-md-2">
                            <img src="{{asset('images/customer-conversion.jpg')}}" class="rounded-circle shadow" width="100%;" height="100%;" alt="">
                        </div>
                        <div class="col-12 col-sm-8 col-md-10">
                            <h5 class="text-primary">تبلیغات</h5>
                            <p class="text-justify text-me">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد.
                            </p>
                        </div>
                    </div>
                    <hr>
                    <h3 class="pt-3">
                        ارتباط با ما جهت درج تبلیغات
                    </h3>
                    <p class="text-justify text-me">
                    <span class="py-2">
                        اگر علاقه‌ دارید در سایت ما تبلیغ قرار دهید میتوانید از یکی از دو راه‌های زیر با ما ارتباط برقرار نمایید.
                    </span>
                    <span>
                        <br>
                        <i class="fa fa-envelope"></i>
                        ایمیل :{{$setting->email}}
                        <br>
                        <i class="fab fa-telegram"></i>
                        ای دی تلگرام : <a href="{{'https://t.me/'.$setting->telegram_id}}"> {{$setting->telegram_id}} @</a>
                    </span>
                        <br>
                        <span>
                            <i class="fa fa-phone"></i>
                            شماره تماس : {{$setting->mobile}}
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
