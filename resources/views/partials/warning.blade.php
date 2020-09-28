
    @if($errors->any())

        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close pull-left" data-dismiss="alert" aria-hidden="true">×</button>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>

    @endif

