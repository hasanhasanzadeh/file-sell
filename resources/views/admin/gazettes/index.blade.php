@extends('admin.layouts.master')

@section('title')
    مجلات
@endsection

@section('header')
    <section class="content-header">
        <h1>
            پیشخوان
            <small>مجلات</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('panel')}}"><i class="fa fa-tachometer-alt"></i>پیشخوان</a></li>
            <li class="active">مجلات</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center">مجلات</h4>
            <div class="text-left">
                <a href="{{route('gazettes.create')}}" class="btn btn-app">
                    <i class="fa fa-plus"></i>
                    جدید
                </a>
            </div>
        </div>
        <div class="box-body">
            @if($gazettes->isEmpty())
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
                        <td>نام مجله</td>
                        <td>تعداد بازدید</td>
                        <td>تعداد نظرات</td>
                        <td>عکس </td>
                        <td>قیمت</td>
                        <td>نوع مجله</td>
                        <td>تاریخ ایجاد</td>
                        <td>عملیات</td>
                    </tr>
                    </thead>
                    <tbody>
                   @foreach($gazettes as $gazette)
                       <tr>
                           <td><a href="{{route('gazettes.show',$gazette->id)}}" class="list-link">{{$gazette->title}}</a></td>
                           <td>{{$gazette->viewCount}}</td>
                           <td>{{$gazette->commentCount}}</td>
                           <td><img src="{{$gazette->photo->path}}" class="img-bordered" height="130" width="130" alt=""></td>
                           <td>{{$gazette->presentPrice()}} تومان </td>
                           <td>
                               @if($gazette->type=='vip')
                                   <div class="label label-primary">اعضای ویژه</div>
                                   @elseif($gazette->type=='cash')
                                    <div class="label label-info">نقدی</div>
                               @else
                                   <div class="label label-success">رایگان</div>
                               @endif
                           </td>
                           <td>{{\Hekmatinasser\Verta\Verta::instance($gazette->created_at)->formatDifference()}}</td>
                           <td>
                               <a href="{{route('gazettes.edit',$gazette->id)}}" class="btn btn-warning btn-block">
                                   ویرایش
                                   <i class="fa fa-edit"></i>
                               </a>
                               <br>
                               <form action="{{route('gazettes.destroy',$gazette->id)}}" method="POST">
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
                        <td colspan="8" class="text-center">
                            {{$gazettes->links()}}
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
            if(!confirm('آیا می خواهید مجله آموزشی مورد نظر را حذف کنید?')) {
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
