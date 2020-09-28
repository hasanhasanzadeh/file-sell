@foreach($categories as $subCategory)
    <option value="{{$subCategory->id}}" @if($subCategory->id==$category_id) selected @endif> {{str_repeat('--',$level)}} <span> </span>{{$subCategory->name}}</option>
    @if(count($subCategory->children)>0)
        @include('partials.category_list',['categories'=>$subCategory->children,'category_id'=>$category_id,'level'=>$level+1])
    @endif
@endforeach
