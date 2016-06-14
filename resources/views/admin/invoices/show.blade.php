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
                            @if(isset($invoice) && ($invoice->status == 'pending' || $invoice->status == 'sent'))
                            <select name="status" id="status" class="form-control">
                                <option value="pending" {{ (isset($invoice) && $invoice->status == 'pending') ? 'selected' : '' }}>
                                {{ trans('columns.pending') }}</option>
                                <option value="sent" {{ (isset($invoice) && $invoice->status == 'sent') ? 'selected' : '' }}>
                                {{ trans('columns.sent') }}</option>
                                <option value="paid">
                                {{ trans('columns.paid') }}</option>
                            </select>
                            @elseif(!isset($invoice))
                            <select name="status" id="status" class="form-control">
                                <option value="pending" selected>
                                {{ trans('columns.pending') }}</option>
                            </select>
                            @else
                            <input type="text" class="form-control" value="{{ trans('columns.' . $invoice->status) }}" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user_id" class="col-sm-2 control-label">{{ trans('columns.customer') }}</label>
                        <div class="col-sm-10">
                        @if(!isset($invoice) || isset($invoice) && $invoice->status == 'Pending')
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
                                            @if($invoice->status == 'pending')
                                            <input type="text"
                                                   class="form-control"
                                                   name="[products][{{ $product->id }}][description]"
                                                   value="{{ $product->description }}"
                                                   placeholder="Description" 
                                            >
                                            @else
                                            {{ $product->description }}
                                            @endif
                                        </td>
                                        <td class="col-sm-2">
                                            @if($invoice->status == 'pending')
                                            <input type="number"
                                                   class="form-control"
                                                   name="[products][{{ $product->id }}][amount]"
                                                   value="{{ $product->amount }}"
                                                   placeholder="Amount" 
                                            >
                                            @else
                                            {{ $product->amount }}
                                            @endif
                                        </td>
                                        <td class="col-sm-2">
                                            <div class="input-group">
                                                @if($invoice->status == 'pending')
                                                <span class="input-group-addon">&euro;</span>
                                                <input type="text"
                                                       class="form-control"
                                                       name="[products][{{ $product->id }}][price]"
                                                       value="{{ $product->price }}"
                                                       placeholder="Price" 
                                                >
                                                @else
                                                &euro; {{ $product->price }}
                                                @endif
                                            </div>
                                        </td>
                                        <td class="col-sm-2">
                                            <div class="input-group">
                                                @if($invoice->status == 'pending')
                                                <input type="number"
                                                       class="form-control"
                                                       name="[products][{{ $product->id }}][vat]"
                                                       value="{{ $product->vat }}"
                                                       placeholder="VAT" 
                                                >
                                                <span class="input-group-addon">%</span>
                                                @else
                                                {{ $product->vat }} %
                                                @endif
                                            </div>
                                        </td>
                                        <td class="col-sm-1 text-center">
                                            @if($invoice->status == 'pending')
                                            <a  class="label label-danger" 
                                                href="../invoice/{{ $invoice->id }}/remove-product/{{ $product->id }}"
                                            >
                                                <i class="fa fa-minus"></i>
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    @if($invoice->status == 'pending')
                                    <tr>
                                        <td colspan="5">
                                            <a class="btn btn-default" href="../invoice/{{ $invoice->id }}/add-product">
                                                <span class="fa fa-plus"></span> Add product
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-md-2">
                    <div class="list-group">
                        @if(isset($invoice) && ($invoice->status == 'pending' || $invoice->status == 'sent') || !isset($invoice))
                        <button type="submit" class="list-group-item bg-primary">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i> {{ trans('actions.save') }}
                        </button>
                        @endif
                        @if(isset($invoice))
                        <a href="../invoice/{{ $invoice->id }}/view" class="list-group-item" target="_blank">
                            <span class="fa fa-print"></span> {{ trans('actions.print') }}
                        </a>
                        @endif
                        @if(isset($invoice) && ($invoice->status == 'sent' || $invoice->status == 'paid'))
                        <a href="../invoice/{{ $invoice->id }}/credit" class="list-group-item">
                            <span class="fa fa-minus"></span> {{ trans('actions.credit') }}
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