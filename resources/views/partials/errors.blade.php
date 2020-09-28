
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close pull-left" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i>توجه</h4>
            <strong>{{session('success')}}</strong><br>
        </div>
    @elseif(Session::has('danger'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close pull-left" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-bullhorn"></i>توجه</h4>
            <strong>{{session('danger')}}</strong><br>
        </div>
    @elseif(Session::has('warning'))
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close pull-left" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i>توجه</h4>
            <strong>{{session('warning')}}</strong><br>
        </div>
    @elseif(Session::has('errors'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close pull-left" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-bullhorn"></i>توجه</h4>
            @foreach ($errors->all() as $error)
                <li class="text-dark">{{session('error')}}</li>
            @endforeach
        </div>
    @endif
