@extends('layouts.admin')

@section('title')
	{{ trans('navigation.invoices') }}
@endsection

@section('content')
	<table class="table table-striped" id="datatable">
		<thead>
		<tr>
			<th width="5%">#</th>
			<th>Customer</th>
			<th>Price</th>
			<th>Status</th>
		</tr>
		</thead>
		<tbody>
		@foreach($invoices as $i => $invoice)
			<tr data-href="/admin/invoice/{{ $invoice->id }}" class="clickable-row">
				<td>
					{{ $invoice->id }}
				</td>
				<td>
					{{ $invoice->reservation->requester->name }}
				</td>
				<td>
					{{ $invoice->reservation->box->totalPrice($invoice->reservation->totalNights()) }}
				</td>
				<td>
					{{ $invoice->status }}
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
@endsection