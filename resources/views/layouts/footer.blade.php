<footer class="bg-dark text-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 col-12 col-sm-12">
                <div class="p-2 m-1">
                    <h6>درباره سایت</h6>
                    <hr class="bg-secondary">
                    <div>
                        <p class="text-justify">
                            {{ $setting->about }}
                        </p>
                        <img src="{{asset('images/enama.jpeg')}}" class="rounded float-left" width="80" height="90" alt="">
                    </div>

                </div>
            </div>
            <div class="col-md-3 col-12 col-sm-12">
                <div class="p-2 m-2">
                    <h6>بخش های سایت</h6>
                    <hr class="bg-secondary">
                        <ul class="list-unstyled pr-0 mr-0">
                            <li class="nav-item"><a class="nav-link text-light" href="{{url('/law')}}">قوانین و مقررات</a></li>
                            <li class="nav-item"><a class="nav-link text-light" href="{{url('/adv')}}">تبلیغات</a></li>
                            <li class="nav-item"><a class="nav-link text-light" href="{{url('/about')}}">درباره ما</a></li>
                            <li class="nav-item"><a class="nav-link text-light" href="{{url('/contact-us')}}">ارتباط با ما</a></li>
                        </ul>
                </div>
            </div>
            <div class="col-md-4 col-12 col-sm-12">
                <div class="p-2 m-2">
                    <h6>ارتباط با ما</h6>
                    <hr class="bg-secondary">
                    <p class="text-justify">شما میتوانید با استفاده از راه‌های زیر با ما ارتباط برقرار کنید.</p>
                    <div class="list-inline-item ">
                        <span class="pr-0">
                                <i class="far fa-envelope fa-lg text-light"></i>
                        </span>
                        <span class="p-1 ft-14">ایمیل : {{$setting->email}}</span>
                    </div>
                    @if($setting->telegram_id)
                    <div class="list-inline-item ">
                        <span class="pr-0"><a target="_blank" href="https://t.me/{{$setting->telegram_id}}"><i class="fab fa-telegram fa-lg text-info"></i></a></span>
                        <span class="p-1 ft-14">ای دی تلگرام : {{$setting->telegram_id}}@</span>
                    </div>
                    @endif
                    @if($setting->mobile)
                        <div class="list-inline-item ">
                            <span class="pr-2">
                                <i class="fa fa-phone fa-lg text-light"></i>
                            </span>
                            <span class="p-1 ft-14">شماره تماس :  <span class="space">{{$setting->mobile}}</span></span>
                        </div>
                    @endif
                    <div class="text-right">
                        <div class="m-2 p-2 ft-2rem">
                            @if($setting->telegram)
                                <span><a target="_blank" href="{{$setting->telegram}}"><i class="fab fa-telegram text-info"></i></a></span>
                            @endif
                            @if($setting->instagram)
                                <span><a target="_blank" href="{{$setting->instagram}}"><i class="fab fa-instagram text-light"></i></a></span>
                            @endif
                            @if($setting->youtube)
                                <span><a target="_blank" href="{{$setting->youtube}}"><i class="fab fa-youtube text-danger"></i></a></span>
                            @endif
                            @if($setting->twitter)
                                <span><a target="_blank" href="{{$setting->twitter}}"><i class="fab fa-twitter text-primary"></i></a></span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="bg-secondary">
        <div class="row bg-footer custom-control-inline">
            <div class="col-md-12 col-12">
                    <p class="text-center">
                        {{$setting->copy_right}}
                    </p>
            </div>
            <div class="col-12">
                <div class="text-center ft-14">
                    Copyright ©2020 All rights reserved | This Web is made <a class="text-light text-decoration-none" href="https://github.com/hasanhasanzadeh" target="_blank">Hassan Hassanzadeh</a>
                </div>
            </div>
        </div>
    </div>
</footer>
