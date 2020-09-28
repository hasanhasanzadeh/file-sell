<div class="coupon-banner ">
    <a href="#" class="text-decoration-none text-light">
        <h5 class="text-center">
            تخفیف به مناسبت عید قربان
            <i class="fa fa-arrow-circle-left"></i>
        </h5>
    </a>
</div>
<header id="header" class="header">
    <div class="header-top bg-dark custom-control-inline">
        <nav class="nav justify-content-start">
            <a class="nav-link" href="#">کانال تلگرام</a>
            <a class="nav-link" href="#">درباره سفیر</a>
            <a class="nav-link" href="#">همکاری با ما</a>
        </nav>
        <nav class="nav d-none d-md-flex mr-auto">
            <a class="nav-link" href="#">سوالات متداول</a>
            <a class="nav-link" href="#">ارتباط با ما</a>
        </nav>
    </div>
    <hr class="p-0 m-0 shadow">
    <div class="row d-none d-md-flex">
        <div class="col-3">
            <div class="text-center py-2">
                <h5>وب سایت سفیر</h5>
                <h2 class="text-danger">WEB SAFIRE</h2>
            </div>
        </div>
        <div class="col-6">
            <form action="#" method="POST" dir="ltr">
                <div class="input-group" id="search">
                    <div class="input-group-prepend">
                        <button type="submit" class="input-group-text bg-danger"><i class="fa fa-search text-white fa-lg font-weight-bold"></i></button>
                    </div>
                    <input  type="text" class="form-control form-control-lg" dir="rtl" placeholder="دنبال چی می گردی؟">
                </div>
            </form>
        </div>
        <div class="col-3">
            <div class="float-left my-4 pl-3">
                @if(Auth::check())

                    <div class="dropdown" >
                        <a class="dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if($user->photo_id)
                                <img src="{{$user->photo->path}}" class="img-circle rounded-circle" alt="" width="44" height="44">
                            @else
                                <img src="{{asset('images/profile-icon.png')}}" class="img-circle rounded-circle" alt="" width="44" height="44">
                            @endif
                        </a>
                        <div class="dropdown-menu text-right" aria-labelledby="dropdownMenu2">
                            <a href="{{url('/profile')}}" class="dropdown-item">
                                <i class="fas fa-id-card"></i>
                                <span class="px-1">پروفایل من</span>
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fa fa-graduation-cap"></i>
                                <span class="px-1">دوره های خریداری شده</span>
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fa fa-money-check-alt"></i>
                               <span class="px-1"> بخش مالی</span>
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fa fa-heart"></i>
                                <span class="px-1">لیست علاقه مندی</span>
                            </a>
                            <hr class="py-0 my-0">
                            <a href="{{route('logout')}}" class="dropdown-item">
                                <i class="fa fa-sign-out-alt"></i>
                                <span class="px-1 text-danger">خروج</span>
                            </a>
                        </div>
                        <span>{{auth()->user()->name}}</span>
                    </div>
                @else
                    <span class="h5 p-2"><a class="link text-decoration-none text-dark" href="{{route('register')}}">عضویت</a></span>
                    <span class="h5 p-2"><a class="link text-decoration-none text-danger" href="{{route('login')}}">ورود</a></span>
                @endif
            </div>
        </div>
    </div>
    <div class="row d-sm-flex d-md-none">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid text-center">
                <div class="row vw-100">
                    <div class="col-9">
                        <a class="navbar-brand" href="#">
                            <h5>وب سایت سفیر</h5>
                            <h3 class="text-danger">WEB SAFIRE</h3>
                        </a>
                    </div>
                    <div class="col-3 my-auto">
                        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarContent">
                <form action="#" method="POST" dir="ltr" class="m-2">
                    <div class="input-group" >
                        <div class="input-group-prepend">
                            <button type="submit" class="input-group-text bg-danger"><i class="fa fa-search text-white fa-lg font-weight-bold"></i></button>
                        </div>
                        <input  type="text" class="form-control form-control-lg" dir="rtl" placeholder="دنبال چی می گردی؟">
                    </div>
                </form>
                <ul class="navbar-nav mr-auto">

                    @if(!Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="h5 p-2">عضویت</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="h5 p-2">ورود</span>
                        </a>
                    </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="#" title="پروفایل">
                          <img src="{{asset('images/profile-icon.png')}}" class="img-circle" alt="پروفایل" width="44" height="44">
                        </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="#">صفحه اصلی</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            دوره های آموزشی
                        </a>
                        <div class="dropdown-menu text-right" aria-labelledby="navbarDropdown3">
                            <a class="dropdown-item" href="#">درسی</a>
                            <a class="dropdown-item" href="#">موفقیت</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">همه دوره ها</a>
                        </div>
                    </li>
                    <li class="nav-link">
                        <a class="nav-link" href="#">مقالات</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<div class="menu d-none d-md-flex">
    <nav class="nav p-2 bg-dark vw-100">
        <a class="nav-link" href="#">صفحه اصلی</a>
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            دوره های آموزشی
        </a>
        <div class="dropdown-menu text-right" aria-labelledby="navbarDropdown2">
            <a class="dropdown-item" href="#">درسی</a>
            <a class="dropdown-item" href="#">موفقیت</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">همه دوره ها</a>
        </div>
        <a class="nav-link" href="#">مقالات</a>
    </nav>
</div>
