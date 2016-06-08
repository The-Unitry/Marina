<div class="title-box">
    @if(sizeof(Request::segments()) == 2 && $module != "setting")
        <a href="{{ $module }}/create" class="btn btn-primary pull-right">
            <span class="fa fa-plus"></span> {{ trans('userinfo.create') }} {{ $module }}
        </a>
    @endif
    <h3>@yield('title')</h3>
</div>