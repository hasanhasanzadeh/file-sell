@extends('admin.layouts.master')

@section('title')
    قسمت های دوره آموزشی
@endsection

@section('header')
    <section class="content-header">
        <h1>
            لیست قسمت های دوره آموزشی
            <small>قسمت دوره</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('episodes.index')}}"><i class="fa fa-file-video"></i>لیست قسمت دوره آموزشی</a></li>
            <li class="active">قسمت های دوره </li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center"> قسمت های دوره</h4>
            <div class="text-left">
                <a href="{{route('episodes.index')}}" class="btn btn-app">
                    <i class="fa fa-list"></i>
                    لیست
                </a>
            </div>
        </div>
        <div class="box-body">
                <div class="header text-center">
                    <h4 class="py-2 ">{{$course->title}}</h4>
                    <img src="{{$course->photo->path}}" alt="" class="img-bordered my-2" width="160" height="140">
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                        <tr>
                            <td>قسمت دوره</td>
                            <td>عنوان قسمت دوره</td>
                            <td>تعداد بازدید</td>
                            <td>تعداد نظرات</td>
                            <td>نوع دوره</td>
                            <td>تاریخ ایجاد</td>
                            <td>عملیات</td>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($course->episodes as $episode)
                                <tr>
                                    <td>{{$episode->number}}</td>
                                    <td><a href="{{route('episodes.show',$episode->id)}}" class="list-link">{{$episode->title}}</a></td>
                                    <td>{{$episode->viewCount}}</td>
                                    <td>{{$episode->commentCount}}</td>
                                    <td>
                                        @if($episode->type=='vip')
                                            <div class="label label-primary">اعضای ویژه</div>
                                        @elseif($episode->type=='cash')
                                            <div class="label label-info">نقدی</div>
                                        @elseif($episode->type=='free')
                                            <div class="label label-success">رایگان</div>
                                        @endif
                                    </td>
                                    <td>{{\Hekmatinasser\Verta\Verta::instance($episode->created_at)->formatDifference()}}</td>
                                    <td>
                                        <a href="{{route('episodes.edit',$episode->id)}}" class="btn btn-warning btn-block">
                                            ویرایش
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <br>
                                        <form action="{{route('episodes.destroy',$episode->id)}}" method="POST">
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
            if(!confirm('آیا می خواهید قسمت دوره آموزشی مورد نظر را حذف کنید?')) {
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
