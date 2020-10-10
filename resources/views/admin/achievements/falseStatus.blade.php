@extends('admin.layouts.master')

@section('title')
    موفقیت های تأیید شده
@endsection

@section('header')
    <section class="content-header">
        <h1>
            پیشخوان
            <small>موفقیت های تأیید نشده</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('panel')}}"><i class="fa fa-tachometer-alt"></i>پیشخوان</a></li>
            <li class="active">موفقیت های تأیید نشده</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center">موفقیت های تایید نشده</h4>
            <div class="text-left">
                <a href="{{route('achievements.trueStatus')}}" class="btn btn-app">
                    <i class="fa fa-user-graduate"></i>
                    موفقیت های تأیید شده
                </a>
            </div>
        </div>
        <div class="box-body">
            @if($achievements->isEmpty())
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
                            <td>عنوان موفقیت</td>
                            <td>متن موفقیت</td>
                            <td>تاریخ ایجاد</td>
                            <td>عملیات</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($achievements as $achievement)

                            <tr>
                                <td>
                                    @if($achievement->user->photo_id)
                                    <img src="{{$achievement->user->photo->path}}" class="rounded-circle img-circle" alt="" height="70" width="70">
                                    @else
                                        <img src="{{asset('images/profile-icon.png')}}" class="rounded-circle img-circle" alt="" height="70" width="70">
                                    @endif
                                </td>
                                <td>{{$achievement->title}}</td>
                                <td>{!! $achievement->body!!}</td>
                                <td>{{\Hekmatinasser\Verta\Verta::instance($achievement->created_at)->formatDifference()}}</td>
                                <td>
                                    <form action="{{route('achievements.update',$achievement->id)}}" method="POST">
                                        @csrf
                                        {{method_field('PATCH')}}
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-info btn-block ">
                                                تأیید
                                                <i class="fa fa-check-circle"></i>
                                            </button>
                                        </div>
                                    </form>
                                    <form action="{{route('achievements.destroy',$achievement->id)}}" method="POST">
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
                            <td colspan="5" class="text-center">{{$achievements->links()}}</td>
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
            if(!confirm('آیا می خواهید موفقیت مورد نظر را حذف کنید?')) {
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
