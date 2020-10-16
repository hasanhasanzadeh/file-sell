@extends('layouts.app')

@section('title')
   آگهی های تبلیغاتی
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
                <div class="col-12 col-md-4 col-sm-6">
                    <nav class="navigate m-2 bg-white rounded ft-16">
                        <div class="navbar-brand">
                            @if($user->photo_id)
                                <img src="{{$user->photo->path}}" alt="" height="60" width="60" class="img-circle rounded-circle">
                            @else
                                <img src="{{asset('images/profile-icon.png')}}" alt="" height="50" width="50" class="img-circle rounded-circle">
                            @endif
                            <span>{{$user->name}}</span>
                        </div>
                        <hr>
                        <div class="nav-item">
                            <a href="{{url('/profile')}}" class="nav-link a-link">
                                <i class="fa fa-id-card ft-22 p-2"></i>
                                <span>پروفایل من</span>
                            </a>
                        </div>
                        <div class="nav-item ">
                            <a href="{{url('/achievements')}}" class="nav-link a-link">
                                <i class="fa fa-user-graduate ft-22 p-2"></i>
                                <span>موفقیت های شخصی</span>
                            </a>
                        </div>
                        <div class="nav-item">
                            <a href="#" class="nav-link a-link">
                                <i class="fa fa-graduation-cap ft-22 p-2"></i>
                                <span>دوره های خریداری شده</span>
                            </a>
                        </div>
                        <div class="nav-item ">
                            <a href="#" class="nav-link a-link">
                                <i class="fa fa-money-check-alt ft-22 p-2"></i>
                                <span>بخش مالی</span>
                            </a>
                        </div>
                        <div class="nav-item">
                            <a href="{{url('/likes')}}" class="nav-link a-link">
                                <i class="fa fa-heart ft-22 p-2"></i>
                                <span>لیست علاقه مندی ها</span>
                            </a>
                        </div>
                        <div class="nav-item menu-active">
                            <a href="{{url('/advertisements')}}" class="nav-link ">
                                <i class="fas fa-bullhorn ft-22 p-2"></i>
                                <span>آگهی ها</span>
                            </a>
                        </div>
                    </nav>
                </div>
                <div class="col-12 col-md-8 col-sm-6">
                    <div class="box bg-white rounded p-2 m-2">
                        <div class="box-header">
                            <div class="box-title py-3 my-2 text-center">
                                <span class="text-center h4">آگهی های تبلیغاتی</span>
                                <div class="float-left">
                                    <a href="{{route('advertisement.create')}}" class="btn btn-info">
                                        <i class="fa fa-plus"></i>
                                        ایجاد آگهی
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="box-body">
                            @if($advertisements->isEmpty())
                                <div class="text-center my-4 py-4">
                                    <div class="h1 text-muted">
                                        <i class="far fa-frown-open h1"></i>
                                    </div>
                                    <h2 class="text-muted">موردی برای نمایش وجود ندارد</h2>
                                </div>
                            @else
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <td>عنوان آگهی</td>
                                        <td>متن آگهی</td>
                                        <td>تصویر آگهی</td>
                                        <td>تاریخ ایجاد</td>
                                        <td>وضعیت</td>
                                        <td>عملیات</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($advertisements as $advertisement)
                                    <tr>
                                        <td>{{$advertisement->title}}</td>
                                        <td class="text-justify">{{ $advertisement->body }}</td>
                                        <td>
                                            <img src="{{$advertisement->photo->path}}" class="" height="90" width="140"  alt="{{$advertisement->title}}">
                                        </td>
                                        <td>{{ \Hekmatinasser\Verta\Verta::instance($advertisement->created_at)->formatDifference() }}</td>
                                        <td>
                                            @if($advertisement->status)
                                                <div class="badge badge-primary">منتشر شده</div>
                                            @else
                                                <div class="badge badge-secondary">منتشر نشده</div>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('advertisement.edit',$advertisement->id)}}" class="btn btn-warning my-2">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{route('advertisement.destroy',$advertisement->id)}}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'>
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="5">
                                                {{$advertisements->links()}}
                                        </td>
                                    </tr>
                                    </tfoot>
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
