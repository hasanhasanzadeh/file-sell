@extends('layouts.app')

@section('title')
    {{$course->title}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row m-2 bg-light">
            <div class="col-12 my-2 text-muted">
                <a href="{{url('/')}}" class="text-muted text-decoration-none">
                <span class="p-2">
                صفحه اصلی
                </span>
                </a>
                <span class="ft-1rem">/</span>
                <a href="{{url('category/'.$course->category->id)}}" class="p-2 text-muted text-decoration-none">
               {{$course->category->name}}
                </a>
                <span class="ft-1rem">/</span>
                <a href="{{url('courses/'.$course->slug)}}" class="p-2 text-muted text-decoration-none">
               {{$course->title}}
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row p-2 m-2">
            <div class="col-12">
                <h3 class="p-2 my-3">
                    {{$course->title}}
                </h3>
                <div class="d-md-flex">
                    <div class="bg-second rounded-pill  p-1 mb-4 ft-13 mx-1"> نویسنده و مؤلف :{{$course->user->name}}</div>
                    <div class="bg-second rounded-pill p-1 mb-4 ft-13 mx-1"> تاریخ انتشار : {{verta()->instance($course->created_at)->format('%d %B %Y')}}</div>
                    <div class="bg-second rounded-pill  p-1 mb-4 ft-13 mx-1"> دسته بندی ها :{{$course->category->name}}</div>
                </div>
            </div>
            <div class="col-12 col-md-9">
                <div class="card card-none mt-1 mb-3">
                    <div class="card-body">
                        <div class="text-justify text-secondary ft-14">
                            {!!$course->body!!}
                        </div>
                        <br>
                        <img src="{{$course->photo->path}}" width="100%;" alt="">
                        <hr class="bg-light">
                        <div class="custom-controller-inline text-muted">
                    <span class="p-1" title="افزودن به مورد علاقه ها">
                    {{$course->likes->count()}}
                        @include('layouts.like',['subject'=>$course])
                    </span>
                    <span class="p-1">
                    {{$course->viewCount}}
                    <i class="fa fa-eye"></i>
                    </span>
                    <span class="p-1">
                    {{count($course->comments) }}
                    <i class="fa fa-comment"></i>
                    </span>

                    </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card card-none card-primary mb-4 mt-1 ft-13">
                    <div class="card-body">
                        <p class="text-justify text-light">
                            برای دسترسی به این دوره نیاز است بصورت نقدی این دوره را خریداری کنید یا با تهیه عضویت ویژه میتوانید به آن دسترسی پیدا کنید.
                        </p>
                        <hr class="bg-light">
                        <div class="table table-responsive text-light ">
                            <table class="w-100 table-borderless">
                                <tbody>
                                <tr class="text-left">
                                    <td class="text-right">تعداد خریداری شده</td>
                                    <td >16</td>
                                </tr>
                                <tr class="text-left">
                                    <td class="text-right">قیمت</td>
                                    <td class="bg-danger rounded p-2">39,000 تومان</td>
                                </tr>
                                <tr class="text-left">
                                    <td class="text-right">وضعیت دوره</td>
                                    <td >درحال برگزاری</td>
                                </tr>
                                <tr class="text-left">
                                    <td class="text-right">زمان کل دوره</td>
                                    <td >2:21:14</td>
                                </tr>
                                <tr class="text-left">
                                    <td class="text-right">تعداد قسمت ها</td>
                                    <td >3</td>
                                </tr>
                                <tr class="text-left">
                                    <td class="text-right">نوع دسترسی</td>
                                    <td >اعضای ویژه</td>
                                </tr>
                                </tbody>
                            </table>
                            <a href="#" class="btn btn-lg btn-light btn-block text-muted rounded">
                                خریدار این دوره
                            </a>
                        </div>
                    </div>
                    <div class="card-footer bg-warning p-2 m-0">
                        <i class="fa fa-star"></i>
                        <span class="h6 text-muted">
                        دسترسی رایگان برای <a href="#" class="text-dark">اعضای ویژه</a>
                    </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-propaganda my-3 h-100">
        <div class="container-fluid">
            <div class="row m-2">
                <div class="col-12">
                    <div class="row">
                        <div class="col-8">
                            <h5 class="p-2 m-2">
                                دوره های پیشنهادی
                            </h5>
                        </div>
                        <div class="col-4 text-left">
                            <a href="#" class="btn btn-primary mt-3">مشاهده همه</a>
                        </div>
                    </div>
                    <hr >
                    <div class="row">
                        @foreach($courses as $keys=>$course_c )
                            @if($keys<4)
                            <div class="col-md-3 col-12 mb-3">
                            <div class="card ">
                                <a href="{{$course_c->slug}}">
                                    <img src="{{$course_c->photo->path}}" class="card-img-top img-card-sf" alt="">
                                </a>
                                <div class="card-body">
                                    <a href="{{$course_c->slug}}" class="text-decoration-none text-dark">
                                        <h6>
                                            {{$course_c->title}}
                                        </h6>
                                    </a>
                                    <p class="text-muted text-justify">
                                        {!! Str::limit($course_c->description,110) !!}
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <div class="custom-controller-inline">
                                        <span class="p-1" title="افزودن به مورد علاقه ها">
                                            {{$course_c->likes->count()}}
                                            @include('layouts.like',['subject'=>$course_c ])
                                        </span>
                                        <span class="p-1">
                                            {{$course_c->viewCount}}
                                            <i class="far fa-eye"></i>
                                        </span>
                                        <span class="p-1">
                                            {{count($course_c->comments) }}
                                            <i class="far fa-comment"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.comments',['commentable_id'=>$course->id,'subject'=>$course])

@endsection

@section('script')
    <script>
        $('#sendCommentModal').on('show.bs.modal' , function (event) {
            let button = $(event.relatedTarget);
            let parentId = button.data('parent');
            let modal = $(this);
            modal.find("[name='parent_id']").val(parentId);
        });
    </script>
@endsection
