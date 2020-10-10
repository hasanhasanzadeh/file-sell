@foreach($subCategories as $subcategory)
    @if(count($subcategory->children)>0)
        <li class="nav-item">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown{{$subcategory->id}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{$subcategory->name}}
            </a>
            <div class="dropdown-menu text-right" aria-labelledby="navbarDropdown{{$subcategory->id}}">
                @include('layouts.category_menu',['subCategories'=>$subcategory->children])
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{url('categories/'.$subcategory->id)}}">همه {{$subcategory->name}}</a>
            </div>
        </li>
    @else
        <a class="dropdown-item" href="{{url('/categories/'.$subcategory->id)}}">{{$subcategory->name}}</a>
    @endif


@endforeach

