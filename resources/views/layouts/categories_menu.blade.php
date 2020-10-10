@foreach($sub_categories as $sub_category)
    @if(count($sub_category->children)>0)
        <li class="nav-item text-right">
            <a class="nav-link dropdown-toggle " href="#" id="navbar{{$sub_category->id}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{$sub_category->name}}
            </a>
            <div class="dropdown-menu text-right" aria-labelledby="navbar{{$sub_category->id}}">
                @include('layouts.category_menu',['subCategories'=>$sub_category->children])
                <div class="dropdown-divider"></div>
                <a class="nav-link dropdown-item text-dark text-right" href="{{url('categories/'.$sub_category->id)}}">همه {{$sub_category->name}}</a>
            </div>
        </li>
    @else
            <a class="nav-link dropdown-item text-dark text-right" href="{{url('/categories/'.$sub_category->id)}}">{{$sub_category->name}}</a>
    @endif


@endforeach

