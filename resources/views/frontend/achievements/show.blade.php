@extends('layouts.app')

@section('title')
    موفقیت های کاربران {{$achievement->title}}
@endsection

@section('content')

    <div class="alert alert-info p-2 m-4 alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="mr-auto">&times;</span>
        </button>
        <h5 class="p-2 m-2">
            درج موفقیت خود و استفاده برای دایگران
        </h5>
        <ol>
            <li>موفقیت خود را اینجا با دیگران درمیان بگزارید.</li>
            <li>دیگران از تجربه و راه موفقیت شما استفاده می کنند.</li>
            <li>کمک کردن به یکدیگر برای موفقیت خود موفقیتی دیگر است.</li>
        </ol>

    </div>
    <div class="profile h-100">
        <div class="container-fluid">
            <div class="row py-2">
                <div class="col-12 col-md-12 col-sm-12">
                    <div class="box bg-white rounded p-2 m-2">
                        <div class="box-header">
                            <div class="box-title py-3 my-2 text-center">
                                <span class="text-center h4"> {{$achievement->title}}</span>
                                <div class="float-left">
                                    <a href="{{route('achievements.create')}}" class="btn btn-info">
                                        <i class="fa fa-plus"></i>
                                        ایجاد موفقیت خود
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="box-body">
                            @if(empty($achievement))
                                <div class="text-center my-4 py-4">
                                    <div class="h1 text-muted">
                                        <i class="far fa-frown-open h1"></i>
                                    </div>
                                    <h2 class="text-muted">موردی برای نمایش وجود ندارد</h2>
                                </div>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <tbody>
                                        <tr>
                                            <td>تصویر کاربر</td>
                                            <td>
                                                @if($achievement->user->photo_id)
                                                <img src="{{$achievement->user->photo->path}}" width="140" class="img-circle rounded-circle" height="140" alt="{{$achievement->title}}">
                                                @else
                                                    <img src="{{asset('images/profile-icon.png')}}" width="140" class="img-circle rounded-circle" height="140" alt="{{$achievement->title}}">
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>نام کاربر</td>
                                            <td>{{$achievement->user->name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="w-25">عنوان موفقیت</td>
                                            <td>{{$achievement->title}}</td>
                                        </tr>
                                        <tr>
                                            <td>متن موفقیت</td>
                                            <td class="text-justify">{{ $achievement->body }}</td>
                                        </tr>

                                        <tr>
                                            <td>تاریخ ایجاد</td>
                                            <td>
                                                {{\Hekmatinasser\Verta\Verta::instance($achievement->created_at)->formatDifference()}}
                                            </td>
                                        </tr>
                                        </tbody>

                                    </table>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

