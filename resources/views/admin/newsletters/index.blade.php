@extends('layouts.admin')

@section('title')
    <div>
        Nieuwsberichten
    </div>
@endsection

@section('content')
<table class="table table-striped" id="datatable">
    <thead>
    <tr>
        <th width="5%">#</th>
        <th>{{ trans('columns.sender') }}</th>
        <th>{{ trans('columns.content') }}</th>
        <th>{{ trans('columns.date') }}</th>
    </tr>
    </thead>
</table>
@endsection
