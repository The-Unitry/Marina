@extends('layouts.admin')

@section('title')
    {{ trans('navigation.scaffolds') }}
@endsection

@section('content')
    <table class="table table-striped" id="datatable">
        <thead>
        <tr>
            <th width="5%">#</th>
            <th>Code</th>
            <th>Boxes</th>
        </tr>
        </thead>
        <tbody>
        @foreach($scaffolds as $i => $scaffold)
            <tr data-href="/admin/scaffold/{{ $scaffold->id }}" class="clickable-row">
                <td>
                    {{ $i + 1 }}
                </td>
                <td>
                    {{ $scaffold->code }}
                </td>
                <td>
                    {{ count($scaffold->boxes) }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection