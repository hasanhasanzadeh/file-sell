@extends('layouts.app')

@section('title')
    علاقه مندی های من
@endsection

@section('content')


    <div class="profile h-100">
        <div class="container-fluid">
            <div class="row py-2">
                <div class="col-12 col-md-4 col-sm-6">
                    <nav class="navigate m-2 bg-white rounded ft-16">
                        <div class="navbar-brand">
                            @if($user->photo_id)
                                <img src="{{$user->photo->path}}" alt="" height="60" width="60" class="img-circle rounded-circle">
                            @else
                                <img src="{{asset('images/profile-icon.png')}}" alt="" height="50" width="50" class="img-circle rounded-circle">
                            @endif
                            <span>{{$user->name}}</span>
                        </div>
                        <hr>
                        <div class="nav-item">
                            <a href="{{url('/profile')}}" class="nav-link a-link">
                                <i class="fa fa-id-card ft-22 p-2"></i>
                                <span>پروفایل من</span>
                            </a>
                        </div>
                        <div class="nav-item">
                            <a href="{{url('/achievements')}}" class="nav-link a-link">
                                <i class="fa fa-user-graduate ft-22 p-2"></i>
                                <span>موفقیت های شخصی</span>
                            </a>
                        </div>
                        <div class="nav-item">
                            <a href="#" class="nav-link a-link">
                                <i class="fa fa-graduation-cap ft-22 p-2"></i>
                                <span>دوره های خریداری شده</span>
                            </a>
                        </div>
                        <div class="nav-item ">
                            <a href="#" class="nav-link a-link">
                                <i class="fa fa-money-check-alt ft-22 p-2"></i>
                                <span>بخش مالی</span>
                            </a>
                        </div>
                        <div class="nav-item menu-active">
                            <a href="{{url('/likes')}}" class="nav-link ">
                                <i class="fa fa-heart ft-22 p-2"></i>
                                <span>لیست علاقه مندی ها</span>
                            </a>
                        </div>
                        <div class="nav-item">
                            <a href="{{url('/advertisements')}}" class="nav-link a-link">
                                <i class="fas fa-bullhorn ft-22 p-2"></i>
                                <span>آگهی ها</span>
                            </a>
                        </div>
                    </nav>
                </div>
                <div class="col-12 col-md-8 col-sm-6">
                    <div class="box bg-white rounded p-2 m-2">
                        <div class="box-header">
                            <div class="box-title p-2 m-1 text-center">
                                <span class="text-center">علاقه مندی ها</span>
                            </div>

                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <td>نام</td>
                                        <td>عکس</td>
                                        <td>عنوان</td>
                                        <td>عملیات</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($arrays['articles'] as $article)
                                        <tr>
                                            <td>مقاله</td>
                                            <td>
                                                <a href="{{url('articles/'.$article->slug)}}">
                                                    <img src="{{$article->photo->path}}" width="100" height="110" alt="">
                                                </a>
                                            </td>
                                            <td><a href="{{url('/articles/'.$article->slug)}}">{{$article->title}}</a></td>
                                            <td>
                                                <form action="{{route('likes.destroy',$article->id)}}" method="POST">
                                                    @csrf
                                                    {{method_field('DELETE')}}
                                                    <input type="hidden" name="likeable_type" value="App\Article">
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                        حذف
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @foreach($arrays['courses'] as $course)
                                            <tr>
                                                <td>دوره آموزشی</td>
                                                <td>
                                                    <a href="{{url('courses/'.$course->slug)}}">
                                                        <img src="{{$course->photo->path}}" width="100" height="110" alt="">
                                                    </a>
                                                </td>
                                                <td><a href="{{url('/courses/'.$course->slug)}}">{{$course->title}}</a></td>
                                                <td>
                                                    <form action="{{route('likes.destroy',$course->id)}}" method="POST">
                                                        @csrf
                                                        {{method_field('DELETE')}}
                                                        <input type="hidden" name="likeable_type" value="App\Course">
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                            حذف
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @foreach($arrays['gazettes'] as $gazette)
                                            <tr>
                                                <td>مجله</td>
                                                <td>
                                                    <a href="{{url('gazettes/'.$gazette->slug)}}">
                                                        <img src="{{$gazette->photo->path}}" width="100" height="110" alt="">
                                                    </a>
                                                </td>
                                                <td><a href="{{url('/gazettes/'.$gazette->slug)}}">{{$gazette->title}}</a></td>
                                                <td>
                                                    <form action="{{route('likes.destroy',$gazette->id)}}" method="POST">
                                                        @csrf
                                                        {{method_field('DELETE')}}
                                                        <input type="hidden" name="likeable_type" value="App\Gazette">
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                            حذف
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @foreach($arrays['podcasts'] as $podcast)
                                            <tr>
                                                <td>کتاب صوتی</td>
                                                <td>
                                                    <a href="{{url('podcasts/'.$podcast->slug)}}">
                                                        <img src="{{$podcast->photo->path}}" width="100" height="110" alt="">
                                                    </a>
                                                </td>
                                                <td><a href="{{url('/podcasts/'.$podcast->slug)}}">{{$podcast->title}}</a></td>
                                                <td>
                                                    <form action="{{route('likes.destroy',$podcast->id)}}" method="POST">
                                                        @csrf
                                                        {{method_field('DELETE')}}
                                                        <input type="hidden" name="likeable_type" value="App\Podcast">
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                            حذف
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

