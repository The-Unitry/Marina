@extends('layouts.admin')

@section('content')
<div class="container content">
    <h3>
        {{ trans('navigation.send_newsletter') }}
    </h3>
    <br>
    <div class="row">
        <!-- @if(Session::has('newsletter'))
            <div class="col-md-12">
                <p>{{ session('newsletter') }}</p>
            </div>
        @else -->
        <form action="/newsletter" class="form-horizontal col-md-12" role="form" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="body" class="col-sm-2 control-label">Nieuwsbrief inhoud</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="4" name="body" placeholder="{{ trans('newsletter.your_newsletter') }}"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary pull-right">{{ trans('newsletter.send_newsletter') }}</button>
        </form>
        <!-- @endif -->

    </div>
</div>
@endsection
