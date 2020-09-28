@extends('admin.layouts.master')

@section('title')
    دسته بندی ها
@endsection

@section('header')
    <section class="content-header">
        <h1>
            پیشخوان
            <small>دسته بندی</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('panel')}}"><i class="fa fa-tachometer-alt"></i>پیشخوان</a></li>
            <li class="active">دسته بندی</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center">لیست دسته بندی ها</h4>
            <div class="text-left">
                <a href="{{route('categories.create')}}" class="btn btn-app">
                    <i class="fa fa-plus"></i>
                    جدید
                </a>
            </div>
        </div>
        <div class="box-body">
            @if($categories->isEmpty())
                <div class="text-center my-2">
                    <div class="h1 text-muted">
                        <i class="far fa-frown-open h1"></i>
                    </div>
                    <h2 class="text-muted">موردی برای نمایش وجود ندارد</h2>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="table-dark">
                        <tr>
                            <td>شناسه دسته بندی</td>
                            <td>عنوان دسته بندی</td>
                            <td>عملیات ویرایش</td>
                            <td>عملیات حذف</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)

                            <tr>
                                <td><a href="{{route('categories.show',$category->id)}}">{{$category->id}}</a></td>
                                <td>{{$category->name}}</td>
                                <td>
                                    <a href="{{route('categories.edit',$category->id)}}" class="btn btn-warning">
                                        ویرایش
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{route('categories.destroy',$category->id)}}" method="POST">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <div class="form-group">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'>
                                                <i class="fa fa-trash"></i>
                                                حذف
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @if(count($category->children) > 0)
                                  @include('partials.category_child',['categories'=>$category->children,'level'=>1])
                            @endif

                        @endforeach
                        </tbody>

                        <tfoot>
                        <tr>
                            <td colspan="4" class="text-center">{{$categories->links()}}</td>
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
            if(!confirm('آیا می خواهید دسته بندی مورد نظر را حذف کنید?')) {
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
