@extends('admin.layouts.master')

@section('title')
    آگهی های تأیید شده
@endsection

@section('header')
    <section class="content-header">
        <h1>
            پیشخوان
            <small>آگهی های تأیید نشده</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('panel')}}"><i class="fa fa-tachometer-alt"></i>پیشخوان</a></li>
            <li class="active">آگهی های تأیید نشده</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center">آگهی های تایید نشده</h4>
            <div class="text-left">
                <a href="{{route('advertisements.trueStatus')}}" class="btn btn-app">
                    <i class="fa fa-user-graduate"></i>
                    آگهی های تأیید شده
                </a>
            </div>
        </div>
        <div class="box-body">
            @if($advertisements->isEmpty())
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
                            <td>عکس کاربر</td>
                            <td>عنوان آگهی</td>
                            <td>عکس آگهی</td>
                            <td>متن آگهی</td>
                            <td>رسید بانکی </td>
                            <td>تاریخ ایجاد</td>
                            <td>عملیات</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($advertisements as $advertisement)

                            <tr>
                                <td>
                                    <img src="{{$advertisement->user->photo->path}}" class="rounded-circle img-circle" alt="" height="70" width="70">
                                </td>
                                <td>{{$advertisement->title}}</td>
                                <td>
                                    <img src="{{$advertisement->photo->path}}" height="160" width="140" alt="{{$advertisement->title}}">
                                </td>
                                <td>{{ $advertisement->body}}</td>
                                <td>{{ $advertisement->payment_id}}</td>
                                <td>{{\Hekmatinasser\Verta\Verta::instance($advertisement->created_at)->formatDifference()}}</td>
                                <td>
                                    <form action="{{route('advertisements.update',$advertisement->id)}}" method="POST">
                                        @csrf
                                        {{method_field('PATCH')}}
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-info btn-block ">
                                                تأیید
                                                <i class="fa fa-check-circle"></i>
                                            </button>
                                        </div>
                                    </form>
                                    <form action="{{route('advertisements.destroy',$advertisement->id)}}" method="POST">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-danger btn-block show_confirm" data-toggle="tooltip" title='Delete'>
                                                حذف
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>


                        @endforeach
                        </tbody>

                        <tfoot>
                        <tr>
                            <td colspan="5" class="text-center">{{$advertisements->links()}}</td>
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
            if(!confirm('آیا می خواهید آگهی مورد نظر را حذف کنید?')) {
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
