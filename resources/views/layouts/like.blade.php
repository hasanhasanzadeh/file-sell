<form action="{{route('likes.store')}}" class="d-inline" method="POST">
    @csrf
    <input type="hidden" name="likeable_id" value="{{$subject->id}}">
    <input type="hidden" name="likeable_type" value="{{get_class($subject)}}">
    <button type="submit" class="unstyle">
        <i class="far fa-heart"></i>
    </button>
</form>
