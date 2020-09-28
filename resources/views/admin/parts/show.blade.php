@extends('admin.layouts.master')

@section('title')
    کتاب های صوتی
@endsection

@section('header')
    <section class="content-header">
        <h1>
            لیست کتاب های صوتی
            <small>کتاب صوتی</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('parts.index')}}"><i class="fa fa-file-video"></i>لیست کتاب صوتی آموزشی</a></li>
            <li class="active">کتاب های صوتی </li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center"> کتاب های صوتی</h4>
            <div class="text-left">
                <a href="{{route('parts.index')}}" class="btn btn-app">
                    <i class="fa fa-list"></i>
                    لیست
                </a>
            </div>
        </div>
        <div class="box-body">
                <div class="header text-center">
                    <h4 class="py-2 ">{{$podcast->title}}</h4>
                    <img src="{{$podcast->photo->path}}" alt="" class="img-bordered my-2" width="160" height="140">
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                        <tr>
                            <td>کتاب صوتی</td>
                            <td>عنوان کتاب صوتی</td>
                            <td>تعداد بازدید</td>
                            <td>تعداد نظرات</td>
                            <td>نوع دوره</td>
                            <td>تاریخ ایجاد</td>
                            <td>عملیات</td>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($podcast->parts as $part)
                                <tr>
                                    <td>{{$part->number}}</td>
                                    <td><a href="{{route('parts.show',$part->id)}}" class="list-link">{{$part->title}}</a></td>
                                    <td>{{$part->viewCount}}</td>
                                    <td>{{$part->commentCount}}</td>
                                    <td>
                                        @if($part->type=='vip')
                                            <div class="label label-primary">اعضای ویژه</div>
                                        @elseif($part->type=='cash')
                                            <div class="label label-info">نقدی</div>
                                        @elseif($part->type=='free')
                                            <div class="label label-success">رایگان</div>
                                        @endif
                                    </td>
                                    <td>{{\Hekmatinasser\Verta\Verta::instance($part->created_at)->formatDifference()}}</td>
                                    <td>
                                        <a href="{{route('parts.edit',$part->id)}}" class="btn btn-warning btn-block">
                                            ویرایش
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <br>
                                        <form action="{{route('parts.destroy',$part->id)}}" method="POST">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <div class="form-group">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger btn-block show_confirm" data-toggle="tooltip" title='Delete'>
                                                    <i class="fa fa-trash"></i>
                                                    حذف
                                                </button>
                                            </div>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

        </div>
    </div>

@endsection
@section('script')
    <script type="text/javascript">
        $('.show_confirm').click(function(e) {
            if(!confirm('آیا می خواهید کتاب صوتی مورد نظر را حذف کنید?')) {
                e.preventDefault();
            }
        });

        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': true
            })
        })
    </script>
@endsection
