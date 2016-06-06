@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <p style="margin: 0;">Welkom bij:</p>
            <h3 style="margin: 0;">{{ setting('company_name') }}</h3>
            <h1>Wij zijn in aanbouw.</h1>
        </div>
    </div>
</div>
@endsection
