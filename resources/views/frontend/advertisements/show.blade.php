@extends('layouts.app')

@section('title')
      آگهی تبلیغاتی {{$advertisement->title}}
@endsection

@section('content')

    <div class="alert alert-warning p-2 m-4 alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="mr-auto">&times;</span>
        </button>
        <h5 class="p-2 m-2">
            درج تبلیغات خود در سایت ما
        </h5>
        <p class="pr-2">
            در صورت درج تبلیغات خود در سایت ما
        </p>
        <ol>
            <li> با واریز 20,000 هزار تومان به شماره کارت ۵۸۵۹۸۳۱۰۵۵۵۲۴۲۸۵ به نام حسن حسن زاده</li>
            <li>و با کد رهگیری رسید بانکی تبلیغات خود را درج کنید.</li>
            <li>بعد از ثبت آگهی ظرف ۴ ساعت بعد از بررسی تایید شده و در قسمت تبلیغات تا یک هفته قابل نمایش می باشد.</li>
        </ol>

    </div>
    <div class="profile h-100">
        <div class="container-fluid">
            <div class="row py-2">
                <div class="col-12 col-md-12 col-sm-12">
                    <div class="box bg-white rounded p-2 m-2">
                        <div class="box-header">
                            <div class="box-title py-3 my-2 text-center">
                                <span class="text-center h4">آگهی تبلیغاتی {{$advertisement->title}}</span>
                                <div class="float-left">
                                    <a href="{{route('advertisement.create')}}" class="btn btn-info">
                                        <i class="fa fa-plus"></i>
                                        ایجاد آگهی
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="box-body">
                            @if(empty($advertisement))
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
                                                <td class="w-25">عنوان آگهی</td>
                                                <td>{{$advertisement->title}}</td>
                                            </tr>
                                            <tr>
                                                <td>متن آگهی</td>
                                                <td class="text-justify">{{ $advertisement->body }}</td>
                                            </tr>
                                            <tr>
                                                <td>آدرس آگهی</td>
                                                <td><a href="{{$advertisement->url_address}}" target="_blank">{{$advertisement->title}}</a></td>
                                            </tr>
                                            <tr>
                                                <td>تصویر آگهی</td>
                                                <td>
                                                    <a href="{{$advertisement->url_address}}" target="_blank">
                                                        <img src="{{$advertisement->photo->path}}" width="300" height="200" alt="{{$advertisement->title}}">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>تاریخ درج آگهی</td>
                                                <td>
                                                    {{\Hekmatinasser\Verta\Verta::instance($advertisement->created_at)->formatDifference()}}
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

