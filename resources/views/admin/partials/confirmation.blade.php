@if(Session::has('message'))
    <div class="alert alert-success" id="alert" role="alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <span>{{ Session::get('message') }}</span>
    </div>
@endif