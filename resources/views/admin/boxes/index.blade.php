@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="title-box">
        <a href="/admin/box/create" class="btn btn-primary pull-right">
            Create box
        </a>
        <h3>Boxes</h3>
    </div>
    <table class="table table-striped" id="datatable">
        <thead>
        <tr>
            <th width="5%">#</th>
            <th>Code</th>
        </tr>
        </thead>
        <tbody>
        @foreach($boxes as $i => $box)
            <tr data-href="/admin/box/{{ $box->id }}" class="clickable-row">
                <td>
                    {{ $i + 1 }}
                </td>
                <td>
                    {{ $box->scaffold->code . $box->id }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection