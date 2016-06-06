@extends('layouts.admin')

@section('title')
    @if ($method == 'POST')
        Create invoice
    @elseif ($method == 'PATCH')
        Edit invoice
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
                        <label for="status" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-10">
                            <select name="status" id="status" class="form-control">
                                <option value="Pending" {{ (isset($invoice) && $invoice->status == 'Pending') ? 'selected' : '' }}>Pending</option>
                                <option value="Paid" {{ (isset($invoice) && $invoice->status == 'Paid') ? 'selected' : '' }}>Paid</option>
                                <option value="Cancelled" {{ (isset($invoice) && $invoice->status == 'Cancelled') ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="list-group">
                        <button type="submit" class="list-group-item bg-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
                        <a href="../invoice" class="list-group-item"><span class="fa fa-arrow-left"></span> Back</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection