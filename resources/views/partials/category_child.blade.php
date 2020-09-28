@foreach($categories as $subCategory)
    <tr>
        <td>
            <a href="{{route('categories.show',$subCategory->id)}}">{{$subCategory->id}}</a>
        </td>
        <td>{{str_repeat('--',$level)}} <span> </span>{{$subCategory->name}}</td>
        <td>
            <a href="{{route('categories.edit',$subCategory->id)}}" class="btn btn-warning">
                ویرایش
                <i class="fa fa-edit"></i>
            </a>
        </td>
        <td>
            <form action="{{route('categories.destroy',$subCategory->id)}}" method="POST">
                @csrf
                {{method_field('DELETE')}}
                <div class="form-group">
                    <button class="btn btn-danger" name="delete" onclick="confirmSubmit()" type="submit">
                        حذف
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            </form>
        </td>
    </tr>
    @if(count($subCategory->children)>0)
        @include('partials.category_child',['categories'=>$subCategory->children,'level'=>$level+1])
    @endif
@endforeach
