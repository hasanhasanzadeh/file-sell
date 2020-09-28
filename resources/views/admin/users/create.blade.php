@extends('admin.layouts.master')

@section('title')
    ایجاد کاربر
@endsection

@section('header')
    <section class="content-header">
        <h1>
            کاربران
            <small> ایجاد کاربر</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('users.index')}}"><i class="fa fa-users"></i>کاربران</a></li>
            <li class="active"> ایجاد کاربر</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center"> ایجاد کاربر</h4>
            <div class="text-left">
                <a href="{{route('users.index')}}" class="btn btn-app">
                    <i class="fa fa-list"></i>
                    لیست
                </a>
            </div>
        </div>
        <div class="box-body">
            <form action="{{route('users.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">نام کاربری</label>
                    <input type="text" class="form-control" name="name" placeholder="نام و نام خانوادگی خود را وارد کنید..." value="{{old('name')}}" id="name">
                </div>
                <div class="form-group">
                    <label for="mobile">موبایل</label>
                    <input type="tel" class="form-control" name="mobile" placeholder="09XXXXXXXXX" value="{{old('mobile')}}" id="mobile">
                </div>
                <div class="form-group">
                    <label for="password">کلمه عبور</label>
                    <input type="password" class="form-control" name="password" placeholder="کلمه عبور خود را وارد کنید..."  id="password">
                </div>
                <div class="form-group">
                    <label for="email">ایمیل</label>
                    <input type="email" class="form-control" name="email" placeholder="email@test.com" value="{{old('email')}}" id="email">
                </div>
                <div class="form-group">
                    <label for="level">سطح دسترسی</label>
                    <select name="level" id="level" class="form-control">
                        <option value="user">کاربر عادی</option>
                        <option value="admin">مدیر</option>
                        <option value="editor">ویرایشگر</option>
                        <option value="author">نویسنده</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">وضعیت</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1">فعال</option>
                        <option value="0">غیر فعال</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-app btn-block">
                    ذخیره اطلاعات
                    <i class="fa fa-save"></i>
                </button>
            </form>
        </div>
    </div>

@endsection

