@extends('layouts.app')

@section('title')
    دستاوردهای موفقیت شخصی
@endsection

@section('content')
    <div class="profile">
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
                        <div class="nav-item menu-active">
                            <a href="{{url('/achievements')}}" class="nav-link ">
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
                            <a href="#" class="nav-link a-link">
                                <i class="fa fa-heart ft-22 p-2"></i>
                                <span>لیست علاقه مندی ها</span>
                            </a>
                        </div>
                        <div class="nav-item">
                            <a href="{{url('/advertisements')}}" class="nav-link a-link">
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
                                <span class="text-center h4">موفقیت های شخصی</span>
                                <div class="float-left">
                                    <a href="{{route('achievements.create')}}" class="btn btn-info">
                                        <i class="fa fa-plus"></i>
                                        ایجاد موفقیت
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="box-body">
                            @if($achievements->isEmpty())
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
                                        <td>عنوان موفقیت</td>
                                        <td>متن موفقیت</td>
                                        <td>تاریخ ایجاد</td>
                                        <td>وضعیت</td>
                                        <td>عملیات</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($achievements as $achievement)
                                    <tr>
                                        <td>{{$achievement->title}}</td>
                                        <td class="text-justify">{!! $achievement->body !!}</td>
                                        <td>{{ \Hekmatinasser\Verta\Verta::instance($achievement->created_at)->formatDifference() }}</td>
                                        <td>
                                            @if($achievement->status)
                                                <div class="badge badge-primary">منتشر شده</div>
                                            @else
                                                <div class="badge badge-secondary">منتشر نشده</div>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{route('achievements.destroy',$achievement->id)}}" method="POST">
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
                                                {{$achievements->links()}}
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
