@extends('layouts.admin')

@section('title')
    @if ($method == 'POST')
        {{ trans('navigation.create_invoice') }}
    @elseif ($method == 'PATCH')
        {{ trans('navigation.edit_invoice') }}
    @endif
@endsection

@section('content')
    <div class="row">
        <form class="form-horizontal" action="{{ ($method == 'POST') ? '/admin/invoice' : '/admin/invoice/' . $invoice->id }}" method="post">
            <div class="row">
                <div class="col-md-10">
                    {{ method_field($method) }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">{{ trans('columns.status') }}</label>
                        <div class="col-sm-10">
                            <select name="status" id="status" class="form-control">
                                <option value="Pending" {{ (isset($invoice) && $invoice->status == 'Pending') ? 'selected' : '' }}>
                                {{ trans('columns.pending') }}</option>
                                <option value="Paid" {{ (isset($invoice) && $invoice->status == 'Paid') ? 'selected' : '' }}>
                                {{ trans('columns.paid') }}</option>
                                <option value="Cancelled" {{ (isset($invoice) && $invoice->status == 'Cancelled') ? 'selected' : '' }}>
                                {{ trans('columns.cancelled') }}</option>
                            </select>
                        </div>
                    </div>
                    @if(isset($invoice) && sizeof($invoice->products))
                    <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">Products</label>
                        <div class="col-sm-10">
                            @foreach($invoice->products as $product)
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text"
                                           class="form-control"
                                           name="[products][{{ $product->id }}][description]"
                                           value="{{ $product->description }}"
                                           placeholder="Description" 
                                    >
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-md-2">
                    <div class="list-group">
                        <button type="submit" class="list-group-item bg-primary">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i> {{ trans('columns.save') }}
                        </button>
                        @if(isset($invoice))
                        <a href="../invoice/{{ $invoice->id }}/view" class="list-group-item" target="_blank">
                            <span class="fa fa-print"></span> {{ trans('columns.print') }}
                        </a>
                        @endif
                        <a href="../invoice" class="list-group-item">
                            <span class="fa fa-arrow-left"></span> {{ trans('columns.back') }}
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection