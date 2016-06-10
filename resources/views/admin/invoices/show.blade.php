@extends('layouts.admin')

@section('title')
    @if ($method == 'POST')
        {{ trans('actions.create.invoice') }}
    @elseif ($method == 'PATCH')
        {{ trans('actions.edit.invoice') }}
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
                                <option value="Sent" {{ (isset($invoice) && $invoice->status == 'Sent') ? 'selected' : '' }}>
                                {{ trans('columns.sent') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user_id" class="col-sm-2 control-label">{{ trans('columns.customer') }}</label>
                        <div class="col-sm-10">
                        @if(isset($invoice) && $invoice->status == 'Pending')
                            @foreach ($users as $user)
                            <select name="user_id" id="user_id" class="form-control">
                                <option value="{{ $user->id }}" {{ (isset($invoice) && $invoice->user_id == $user->id) ? 'selected' : '' }}>
                                {{ $user->name }}</option>
                            </select>
                            @endforeach
                        @else
                            <input type="text" class="form-control" value="{{ $invoice->user->name }}" readonly>
                        @endif
                        </div>
                    </div>
                    @if(isset($invoice))
                    <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">Products</label>
                        <div class="col-sm-10">
                            <table class="table">
                                @if(sizeof($invoice->products))
                                <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Price</th>
                                        <th colspan="2">VAT</th>
                                    </tr>
                                </thead>
                                @endif
                                <tbody>
                                    @foreach($invoice->products as $product)
                                    <tr>
                                        <td class="col-sm-5">
                                            <input type="text"
                                                   class="form-control"
                                                   name="[products][{{ $product->id }}][description]"
                                                   value="{{ $product->description }}"
                                                   placeholder="Description" 
                                            >
                                        </td>
                                        <td class="col-sm-2">
                                            <input type="number"
                                                   class="form-control"
                                                   name="[products][{{ $product->id }}][amount]"
                                                   value="{{ $product->amount }}"
                                                   placeholder="Amount" 
                                            >
                                        </td>
                                        <td class="col-sm-2">
                                            <div class="input-group">
                                                <span class="input-group-addon">&euro;</span>
                                                <input type="text"
                                                       class="form-control"
                                                       name="[products][{{ $product->id }}][price]"
                                                       value="{{ $product->price }}"
                                                       placeholder="Price" 
                                                >
                                            </div>
                                        </td>
                                        <td class="col-sm-2">
                                            <div class="input-group">
                                                <input type="number"
                                                       class="form-control"
                                                       name="[products][{{ $product->id }}][vat]"
                                                       value="{{ $product->vat }}"
                                                       placeholder="VAT" 
                                                >
                                                <span class="input-group-addon">%</span>
                                            </div>
                                        </td>
                                        <td class="col-sm-1 text-center">
                                            <a  class="label label-danger" 
                                                href="../invoice/{{ $invoice->id }}/remove-product/{{ $product->id }}"
                                            >
                                                <i class="fa fa-minus"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5">
                                            <a class="btn btn-default" href="../invoice/{{ $invoice->id }}/add-product">
                                                <span class="fa fa-plus"></span> Add product
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-md-2">
                    <div class="list-group">
                        <button type="submit" class="list-group-item bg-primary">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i> {{ trans('actions.save') }}
                        </button>
                        @if(isset($invoice))
                        <a href="../invoice/{{ $invoice->id }}/view" class="list-group-item" target="_blank">
                            <span class="fa fa-print"></span> {{ trans('actions.print') }}
                        </a>
                        @endif
                        <a href="../invoice" class="list-group-item">
                            <span class="fa fa-arrow-left"></span> {{ trans('actions.back') }}
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection