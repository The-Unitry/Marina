@extends('layouts.app')

@section('content')
    <div class="container content">
        <h3>
            {{ trans('navigation.contact') }}
        </h3>
        <br>
        <div class="row">
            @if(Session::has('message'))
                <div class="col-md-8">
                    <p>{{ session('message') }}</p>
                </div>
            @else
            <form action="/contact" class="form-horizontal col-md-8" role="form" method="POST">
                {{ csrf_field() }}
                <h4>{{ trans('contact.send_message') }}</h4>
                <br>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">{{ trans('regular.name') }}</label>
                    <div class="col-sm-10">
                        <input type="text"
                               class="form-control"
                               id="name"
                               name="name"
                               placeholder="Uw voor en achternaam"
                               value="{{ (Auth::check()) ? Auth::user()->name : '' }}"
                        >
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">{{ trans('regular.email') }}</label>
                    <div class="col-sm-10">
                        <input type="email"
                               class="form-control"
                               id="email"
                               name="email"
                               placeholder="Uw e-mailadres"
                               value="{{ (Auth::check()) ? Auth::user()->email : '' }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="body" class="col-sm-2 control-label">{{ trans('contact.message') }}</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="4" name="body" placeholder="{{ trans('contact.your_message') }}"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right">{{ trans('contact.send_message') }}</button>
            </form>
            @endif
            <div class="col-md-4">
                <h4>{{ setting('company_name') }}</h4>
                <p>
                    {{ setting('company_address') }}<br>
                    {{ setting('company_zipcode') }} {{ setting('company_city') }}<br>
                    <a href="tel:{{ setting('company_phone') }}">{{ setting('company_phone') }}</a><br>
                    <a href="mailto:{{ setting('company_mail') }}">{{ setting('company_mail') }}</a>
                </p>
                <br>
                <h4>{{ trans('contact.google_maps') }}</h4>
                <div style="width:100%;max-width:100%;overflow:hidden;height:300px;color:red;"><div id="embed-map-display" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q={{ setting('company_name') }}&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div><a class="embed-map-html" href="https://www.hostingreviews.website/network-solutions-review" id="enable-maps-data">{{ trans('contact.learn_more') }}</a><style>#embed-map-display .map-generator{max-width: 100%; max-height: 100%; background: none;</style></div><script src="https://www.hostingreviews.website/google-maps-authorization.js?id=d3f12bcb-2fee-f6c9-a894-f2b961c47d34&c=embed-map-html&u=1465336348" defer="defer" async="async"></script>
            </div>
        </div>
    </div>
@endsection
