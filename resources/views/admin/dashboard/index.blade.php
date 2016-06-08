@extends('layouts.admin')

@section('title')
    {{ trans('navigation.dashboard') }}
@endsection

@section('content')
    <div class="jumbotron">
        <h1>Navicula</h1>
        <p style="font-weight: 300;">{{ trans('navigation.slogan') }}</p>
    </div>
@endsection
