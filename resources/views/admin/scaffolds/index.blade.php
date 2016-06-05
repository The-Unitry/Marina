@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="title-box">
            <a href="/admin/scaffold/create" class="btn btn-primary pull-right">
                Create scaffold
            </a>
            <h3>Scaffolds</h3>
        </div>
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
    </div>
@endsection