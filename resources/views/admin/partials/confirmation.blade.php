@if(Session::has('message'))
    <div class="alert alert-success" id="alert" role="alert">
        <span>{{ Session::get('message') }}</span>
    </div>
@endif