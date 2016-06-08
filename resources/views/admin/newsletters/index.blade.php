@extends('layouts.admin')

@section('title')
    {{ trans('navigation.newsletters') }}
@endsection

@section('content')
<table class="table table-striped" id="datatable">
    <thead>
    <tr>
        <th width="5%">#</th>
        <th>{{ trans('columns.sender') }}</th>
        <th>{{ trans('columns.subject') }}</th>
        <th>{{ trans('columns.content') }}</th>
        <th>{{ trans('columns.send_date') }}</th>
    </tr>
    </thead>
</table>
@endsection
