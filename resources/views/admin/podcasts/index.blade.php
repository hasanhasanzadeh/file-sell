@extends('admin.layouts.master')

@section('title')
    کتاب صوتی
@endsection

@section('header')
    <section class="content-header">
        <h1>
            پیشخوان
            <small>کتاب صوتی</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('panel')}}"><i class="fa fa-tachometer-alt"></i>پیشخوان</a></li>
            <li class="active">کتاب صوتی</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center">کتاب های صوتی </h4>
            <div class="text-left">
                <a href="{{route('podcasts.create')}}" class="btn btn-app">
                    <i class="fa fa-plus"></i>
                    جدید
                </a>
            </div>
        </div>
        <div class="box-body">
            @if($podcasts->isEmpty())
                <div class="text-center my-2">
                    <div class="h1 text-muted">
                        <i class="far fa-frown-open h1"></i>
                    </div>
                    <h2 class="text-muted">موردی برای نمایش وجود ندارد</h2>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead class="table-dark">
                        <tr>
                            <td>نام کتاب صوتی</td>
                            <td>تعداد بازدید</td>
                            <td>تعداد نظرات</td>
                            <td>عکس </td>
                            <td>قیمت</td>
                            <td>نوع کتاب صوتی</td>
                            <td>تاریخ ایجاد</td>
                            <td>عملیات</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($podcasts as $podcast)
                            <tr>
                                <td><a href="{{route('podcasts.show',$podcast->id)}}" class="list-link">{{$podcast->title}}</a></td>
                                <td>{{$podcast->viewCount}}</td>
                                <td>{{$podcast->commentCount}}</td>
                                <td><img src="{{$podcast->photo->path}}" class="img-bordered" height="130" width="130" alt=""></td>
                                <td>{{$podcast->presentPrice()}} تومان </td>
                                <td>
                                    @if($podcast->type=='vip')
                                        <div class="label label-primary">اعضای ویژه</div>
                                    @elseif($podcast->type=='cash')
                                        <div class="label label-info">نقدی</div>
                                    @else
                                        <div class="label label-success">رایگان</div>
                                    @endif
                                </td>
                                <td>{{\Hekmatinasser\Verta\Verta::instance($podcast->created_at)->formatDifference()}}</td>
                                <td>
                                    <a href="{{route('podcasts.edit',$podcast->id)}}" class="btn btn-warning btn-block">
                                        ویرایش
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <br>
                                    <form action="{{route('podcasts.destroy',$podcast->id)}}" method="POST">
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

                        <tfoot>
                        <tr>
                            <td colspan="8" class="text-center">{{$podcasts->links()}}</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            @endif
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
