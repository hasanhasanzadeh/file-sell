@extends('admin.layouts.master')

@section('title')
    ویرایش کاربر |  {{$user_au->name}}
@endsection

@section('header')
    <section class="content-header">
        <h1>
            کاربران
            <small> ویرایش کاربر {{$user_au->name}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('users.index')}}"><i class="fa fa-users"></i>کاربران</a></li>
            <li class="active"> ویرایش کاربر  {{$user_au->name}}</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center"> ویرایش کاربر {{$user_au->name}}</h4>
            <div class="text-left">
                <a href="{{route('users.index')}}" class="btn btn-app">
                    <i class="fa fa-list"></i>
                    لیست
                </a>
            </div>
        </div>
        <div class="box-body">
            <form action="{{route('users.update',$user_au->id)}}" method="POST">
               @csrf
                {{method_field('PATCH')}}
                <input type="hidden" value="{{$user_au->id}}" name="id">
                <div class="form-group">
                    <label for="name">نام کاربری</label>
                    <input type="text" class="form-control" name="name" placeholder="نام و نام خانوادگی خود را وارد کنید..." value="{{$user_au->name}}" id="name">
                </div>
                <div class="form-group">
                    <label for="mobile">موبایل</label>
                    <input type="tel" class="form-control" name="mobile" placeholder="09XXXXXXXXX" value="{{$user_au->mobile}}" id="mobile">
                </div>
                <div class="form-group">
                    <label for="password">کلمه عبور</label>
                    <input type="password" class="form-control" name="password" placeholder="جهت تغییر کلمه عبور خود را وارد کنید ..." id="password">
                </div>
                <div class="form-group">
                    <label for="email">ایمیل</label>
                    <input type="email" class="form-control" name="email" placeholder="email@test.com" value="{{$user_au->email}}" id="email">
                </div>
                <div class="form-group">
                    <label for="level">سطح دسترسی</label>
                    <select name="level" id="level" class="form-control">
                        <option value="user" @if($user_au->level=='user') selected @endif>کاربر عادی</option>
                        <option value="admin" @if($user_au->level=='admin') selected @endif>مدیر</option>
                        <option value="editor" @if($user_au->level=='editor') selected @endif>ویرایشگر</option>
                        <option value="author" @if($user_au->level=='author') selected @endif>نویسنده</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">وضعیت</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1" @if($user_au->status==1) selected @endif>فعال</option>
                        <option value="0" @if($user_au->status==0) selected @endif>غیر فعال</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-app btn-block">
                    ویرایش اطلاعات
                    <i class="fa fa-refresh"></i>
                </button>
            </form>
        </div>
    </div>

@endsection

