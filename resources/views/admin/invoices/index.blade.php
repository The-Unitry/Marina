@extends('layouts.admin')

@section('title')
    {{ trans('menu.invoices') }}
@endsection

@section('content')
    <a href="invoice/export" class="btn btn-default"><span class="fa fa-download"></span> Exporteren</a>
    <br><br>
    <table class="table table-striped" id="datatable">
        <thead>
        <tr>
            <th width="5%">#</th>
            <th>{{ trans('columns.customer') }}</th>
            <th>{{ trans('columns.price') }}</th>
            <th>{{ trans('columns.status') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($invoices as $i => $invoice)
            <tr data-href="/admin/invoice/{{ $invoice->id }}" class="clickable-row">
                <td>
                    {{ $invoice->id }}
                </td>
                <td>
                    {{ $invoice->user->name }}
                </td>
                <td>
                    &euro; {{ $invoice->totalPrice() }}
                </td>
                <td>
                    <span class="{{ ($invoice->status == 'credited') ? 'text text-danger' : '' }}">
                    {{ trans('columns.' . $invoice->status) }}</span>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection