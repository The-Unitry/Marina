@extends('layouts.app')

@section('title')
    Evenementen
@endsection

@section('content')
    <div class="container content">
        <h3>
            Evenementen
        </h3>
        <br>
        <div>
            <iframe class="frame frame-control" data-frameload="true" src="https://calendar.google.com/calendar/embed?title=%20&amp;showTitle=0&amp;showDate=0&amp;showPrint=0&amp;showCalendars=0&amp;showTz=0&amp;mode=MONTH&amp;height=600&amp;wkst=1&amp;hl=nl&amp;bgcolor=%23ffffff&amp;src=hnn0gvesgsna3buh1e29a8kgmo%40group.calendar.google.com&amp;color=%238C500B&amp;ctz=Europe%2FAmsterdam" width="100%" height="600" frameborder="0" scrolling="no"></iframe>
        </div>
    </div>
@endsection
