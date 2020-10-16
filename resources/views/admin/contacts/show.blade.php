@extends('admin.layouts.master')

@section('title')
    انتقاد و پشنهاد | {{$contact->title}}
@endsection

@section('header')
    <section class="content-header">
        <h1>
            انتقادات و پیشنهادات
            <small> مقاله {{$contact->title}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('contacts.index')}}"><i class="fa fa-archive"></i>مقالات</a></li>
            <li class="active"> انتقاد و پیشنهاد {{$contact->title}}</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center"> انتقاد و پیشنهاد {{$contact->title}}</h4>
            <div class="text-left">
                <a href="{{route('contacts.index')}}" class="btn btn-app">
                    <i class="fa fa-list"></i>
                    لیست
                </a>
            </div>
        </div>
        <div class="box-body">

            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="table-dark">
                    <tr>
                        <td>عنوان</td>
                        <td>مشخصات</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>پروفایل کاربر </td>
                        <td>
                            @if($contact->user->photo_id)
                                <img src="{{$contact->user->photo->path}}" height="80" class="img-circle rounded-circle" width="80" alt="">
                            @else
                                <img src="{{asset('images/profile-icon.png')}}" height="80" class="img-circle rounded-circle" width="80" alt="">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>نام کاربر</td>
                        <td>{{$contact->user->name}}</td>
                    </tr>
                    <tr>
                        <td>شماره تماس کاربر</td>
                        <td>{{$contact->user->mobile}}</td>
                    </tr>
                    <tr>
                        <td>ایمیل کاربر</td>
                        <td>{{$contact->user->email}}</td>
                    </tr>
                    <tr>
                        <td>سطح دسترسی</td>
                        <td>
                            @if($contact->user->level=='user')
                                <div class="label label-info">کاربر عادی</div>
                            @elseif($contact->user->level=='author')
                                <div class="label label-primary">نویسنده</div>
                            @elseif($contact->user->level=='editor')
                                <div class="label label-secondary">ویرایشگر</div>
                            @elseif($contact->user->level=='admin')
                                <div class="label label-success">مدیر</div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>عنوان</td>
                        <td>{{$contact->title}}</td>
                    </tr>
                    <tr>
                        <td>متن انتقاد یا پیشنهاد</td>
                        <td class="text-justify">{{$contact->description}}</td>
                    </tr>
                    <tr>
                        <td>تاریخ ایجاد</td>
                        <td>{{\Hekmatinasser\Verta\Verta::instance($contact->created_at)->formatDifference()}}</td>
                    </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection

