@extends('admin.layouts.master')

@section('title')
    تمام قسمت های دوره های آپلود شده
@endsection

@section('header')
    <section class="content-header">
        <h1>
            پیشخوان
            <small>دوره های آپلود شده</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('panel')}}"><i class="fa fa-tachometer-alt"></i>پیشخوان</a></li>
            <li class="active">دوره های آپلود شده</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center">دوره های آپلود شده</h4>
            <div class="text-left">
                <a href="{{route('episodes.create')}}" class="btn btn-app">
                    <i class="fa fa-plus"></i>
                    جدید
                </a>
            </div>
        </div>
        <div class="box-body">
            @if($courses->isEmpty())
                <div class="text-center my-2">
                    <div class="h1 text-muted">
                        <i class="far fa-frown-open h1"></i>
                    </div>
                    <h2 class="text-muted">موردی برای نمایش وجود ندارد</h2>
                </div>
                @else
                <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                    <tr>
                        <td>عنوان دوره</td>
                        <td>عنوان قسمت دوره</td>
                        <td>تعداد بازدید</td>
                        <td>تعداد نظرات</td>
                        <td>عکس </td>
                        <td>نوع دوره</td>
                        <td>تاریخ ایجاد</td>
                        <td>عملیات</td>
                    </tr>
                    </thead>
                    <tbody>
                   @foreach($courses as $course)
                       @foreach($course->episodes as $episode)
                       <tr>
                           <td>{{$course->title}}</td>
                           <td><a href="{{route('episodes.show',$episode->id)}}" class="list-link">{{$episode->title}}</a></td>
                           <td>{{$episode->viewCount}}</td>
                           <td>{{$episode->commentCount}}</td>
                           <td><img src="{{$course->photo->path}}" class="img-bordered" height="130" width="130" alt=""></td>
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
                   @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="8" class="text-center">
                            {{$courses->links()}}
                        </td>
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
