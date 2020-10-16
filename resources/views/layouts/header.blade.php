@if(!empty($coupon))
<div class="coupon-banner ">
    <a href="{{route('coupon.show',$coupon->id)}}" class="text-decoration-none text-light">
        <h5 class="text-center">
            {{$coupon->title}}
            <i class="fa fa-arrow-circle-left"></i>
        </h5>
    </a>
</div>
@endif
<header id="header" class="header">
    <div class="header-top bg-dark custom-control-inline">
        <nav class="nav justify-content-start">
            <a class="nav-link" target="_blank" href="{{$setting->telegram}}">کانال تلگرام</a>
            <a class="nav-link" href="{{url('/about')}}">درباره ما</a>
        </nav>
        <nav class="nav d-none d-md-flex mr-auto">
            <a class="nav-link" href="{{url('/faq')}}">سوالات متداول</a>
            <a class="nav-link" href="{{url('/contact-us')}}">ارتباط با ما</a>
        </nav>
    </div>
    <hr class="p-0 m-0 shadow">
    <div class="row d-none d-md-flex">
        <div class="col-3">
            <div class="text-center py-2">
                <a href="{{url('/')}}" class="text-decoration-none">
                    <h2 class="my-2 ft-iranYekan text-danger font-weight-bolder">{{$setting->title}}</h2>
                </a>
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
                            <a href="{{url('/likes')}}" class="dropdown-item">
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
                        <a class="navbar-brand" href="{{url('/')}}">
                            <h3 class="text-danger">{{$setting->title}}</h3>
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
                <ul class="navbar-nav mr-auto text-right">

                    @if(!Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/register')}}">
                            <span class="h5 p-2">عضویت</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/login')}}">
                            <span class="h5 p-2">ورود</span>
                        </a>
                    </li>
                    @else
                        <li class="dropdown" >
                            <a class="dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if($user->photo_id)
                                    <img src="{{$user->photo->path}}" class="img-circle rounded-circle" alt="" width="44" height="44">
                                @else
                                    <img src="{{asset('images/profile-icon.png')}}" class="img-circle rounded-circle" alt="" width="44" height="44">
                                @endif
                                <span>{{auth()->user()->name}}</span>
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
                                <a href="{{url('/likes')}}" class="dropdown-item">
                                    <i class="fa fa-heart"></i>
                                    <span class="px-1">لیست علاقه مندی</span>
                                </a>
                                <hr class="py-0 my-0">
                                <a href="{{route('logout')}}" class="dropdown-item">
                                    <i class="fa fa-sign-out-alt"></i>
                                    <span class="px-1 text-danger">خروج</span>
                                </a>
                            </div>

                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/')}}">صفحه اصلی</a>
                    </li>
                    @foreach($categories as $category)
                        @if(count($category->children)>0)
                                <li class="nav-item">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown{{$category->id}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{$category->name}}
                                    </a>
                                    <div class="dropdown-menu text-right" aria-labelledby="navbarDropdown{{$category->id}}">
                                        @include('layouts.category_menu',['subCategories'=>$category->children])
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{url('categories/'.$category->id)}}">همه {{$category->name}}</a>
                                    </div>
                                </li>
                            @else
                                <li class="nav-link">
                                    <a class="nav-link" href="{{url('categories/'.$category->id)}}">{{$category->name}}</a>
                                </li>
                            @endif

                    @endforeach
                </ul>
            </div>
        </nav>
    </div>
</header>
<div class="menu d-none d-md-flex">
    <nav class="nav p-2 bg-dark vw-100">
        <li class="nav-item">
            <a class="nav-link text-light" href="{{url('/')}}">صفحه اصلی</a>
        </li>
        @foreach($categories as $s_category)
            @if(count($s_category->children)>0)
                <li class="nav-item text-light text-right">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="navbar{{$s_category->id}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{$s_category->name}}
                    </a>
                    <div class="dropdown-menu text-righ text-light" aria-labelledby="navbar{{$s_category->id}}">
                        @include('layouts.categories_menu',['sub_categories'=>$s_category->children])
                        <div class="dropdown-divider"></div>
                        <a class="nav-link dropdown-item text-right" href="{{url('categories/'.$s_category->id)}}">همه {{$s_category->name}} </a>
                    </div>
                </li>
            @else
                <li class="nav-item text-right">
                    <a class="nav-link " href="{{url('categories/'.$s_category->id)}}"> {{$s_category->name}}</a>
                </li>
            @endif

        @endforeach
    </nav>
</div>
