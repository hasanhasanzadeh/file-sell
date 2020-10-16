@extends('layouts.app')

@section('title')
    سوالات متداول
@endsection

@section('content')

    <section class="faq">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="text-center text-light pt-5 my-2">
                        <h1 class="pt-5 my-2">سوالات متداول</h1>
                        <h6 class="py-1">در اینجا بخشی از سوالات متداول شما پاسخ داده شده اند.</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 bg-info">
                <p class="h4 text-light p-3 m-2">
                    سوالات متداول خود را جستجو کنید.
                </p>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-light text-width h-100">
        <div class="row">
            <div class="col-12">
                <div class="about-me p-2 my-2" >
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link text-decoration-none text-dark btn-block text-right" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        1. چطوری می توانم برای حساب کاربری خود عکسی را قرار دهم؟
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body text-justify ft-13">
                                    برای قرار داد تصویر به حساب کاربری خودتان در اثر موفقیت وارد شوید، از بخش اطلاعات کاربری بر روی ویرایش اطلاعات کلیک کنید، تصویر مورد نظر خود را با کلیک بر روی دکمه آپلود عکس انتخاب و به عنوان تصویر حساب کاربری قرار دهید.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link text-decoration-none text-dark btn-block text-right collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        2. چطور می‌تونیم دوره‌های آموزشی سایت رو دریافت کنیم؟
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body text-justify ft-13">
                                    <span class="h6 p-2">دوره‌های آموزشی سایت به سه دسته تقسیم می‌شوند</span>
                                    <ul class="p-4">
                                        <li>                                        دسته اول : دوره‌های رایگان
                                        </li>
                                        <li>                                        دسته دوم : دوره‌های نقدی
                                        </li>
                                        <li>                                        دسته سوم : دوره‌های نقدی - با دسترسی رایگان اعضای ویژه
                                        </li>
                                    </ul>
                                    <h6>
                                        در زیر هر کدام از سه دسته‌ بالا را دقیق‌تر به شما توضیح می‌دهیم.
                                    </h6>
                                    <ul class="ft-1rem">
                                        <li>دوره‌های رایگان</li>
                                    </ul>
                                    <p>
                                        برای دسترسی به دوره‌های آموزشی رایگان، شما نیاز به پرداخت هیچ مبلغی در سایت ندارید، تنها نیاز است ابتدا از طریق صفحه عضویت، در سایت عضو شوید و بعد می‌توانید به دوره‌های رایگان دسترسی پیدا کنید.
                                    </p>
                                    <ul class="ft-1rem">
                                        <li>دوره‌های نقدی</li>
                                    </ul>
                                    <p>
                                        برای دسترسی به دوره‌های نقدی، شما نیاز است ابتدا از طریق صفحه عضویت وبسایت، در سایت عضو شوید در قدم بعدی به صفحه دوره مورد نظر خود رفته و آن دوره را را به شکل نقدی تهیه کنید، از زمانی که شما هزینه دوره را پرداخت کنید می‌توانید به تمام جلسات دوره و همینطور آپدیت‌های آینده دوره به شکل کامل دسترسی پیدا کنید چه به شکل آنلاین و چه به شکل آفلاین.
                                    </p>
                                    <ul class="ft-1rem">
                                        <li>دوره‌های نقدی - با دسترسی رایگان اعضای ویژه</li>
                                    </ul>
                                    <p>
                                        برای دسترسی ارزان‌تر به دوره‌های آموزشی وبسایت راکت ما موضوعی با عنوان "اعضای ویژه" را به سایت راکت اضافه کرده‌ایم. به این شکل که شما با تهیه عضویت ویژه می‌توانید به شکل رایگان به مدت زمان مشخص به بخش زیادی از دوره‌های نقدی به شکل آنلاین و رایگان دسترسی پیدا کنید.
                                    </p>
                                    <p class="mt-2">
                                        نکته اول :‌ بخش بسیار زیادی از دوره‌های سایت قابلیت دسترسی رایگان توسط اعضای ویژه را دارند. اما با این حال شما میتوانید از صفحه دوره‌های آموزشی لیست این دوره‌ها را مشاهده کنید.
                                        نکته دوم :‌ در صورت خریداری نقدی یک دوره‌ می‌توانید جلسات مربوط به آن دوره را دانلود کنید تا به شکل آفلاین بتوانید مشاهده کنید. با عضویت ویژه شما قابلیت دانلود نخواهید داشت
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
