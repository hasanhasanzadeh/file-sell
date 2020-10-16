@extends('admin.layouts.master')

@section('title')
    تخفیفات
@endsection

@section('header')
    <section class="content-header">
        <h1>
            پیشخوان
            <small>تخفیفات</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('panel')}}"><i class="fa fa-tachometer-alt"></i>پیشخوان</a></li>
            <li class="active">تخفیفات</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center">تخفیفات</h4>
            <div class="text-left">
                <a href="{{route('coupons.create')}}" class="btn btn-app">
                    <i class="fa fa-plus"></i>
                    ایجاد
                </a>
            </div>
        </div>
        <div class="box-body">
            @if($coupons->isEmpty())
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
                            <td>عکس </td>
                            <td>عنوان </td>
                            <td>وضعیت</td>
                            <td>کد تخفیف</td>
                            <td>تاریخ انقضاء</td>
                            <td>تاریخ ایجاد</td>
                            <td>عملیات </td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($coupons as $coupon)

                            <tr>
                                <td>
                                    <img src="{{$coupon->photo->path}}" class="img-bordered" alt="" height="130" width="150">
                                </td>
                                <td><a href="{{route('coupons.show',$coupon->id)}}"> {{$coupon->title}} </a></td>
                                <td>
                                    @if($coupon->status==1)
                                        <div class="label label-primary">فعال</div>
                                    @else
                                        <div class="label label-danger">غیر فعال</div>
                                    @endif
                                </td>
                                <td>{{$coupon->code}}</td>
                                <td>

                                    @if($coupon->expired > \Carbon\Carbon::now() )
                                        <span class="label label-primary">
                                            {{\Hekmatinasser\Verta\Verta::instance($coupon->expired)->formatDifference()}}
                                        </span>
                                    @else
                                        <span class="label label-danger">
                                             {{\Hekmatinasser\Verta\Verta::instance($coupon->expired)->formatDifference()}}
                                        </span>
                                    @endif
                                </td>
                                <td>{{\Hekmatinasser\Verta\Verta::instance($coupon->created_at)->formatDifference()}}</td>
                                <td>
                                    <a href="{{route('coupons.edit',$coupon->id)}}" class="btn btn-warning btn-block my-1">
                                        <i class="fa fa-edit"></i>
                                        ویرایش
                                    </a>
                                    <br>
                                    <form action="{{route('coupons.destroy',$coupon->id)}}" method="POST">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <div class="form-group">
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
                            <td colspan="7" class="text-center">{{$coupons->links()}}</td>
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
            if(!confirm('آیا می خواهید پیشنهاد یا انتقاد مورد نظر را حذف کنید?')) {
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
