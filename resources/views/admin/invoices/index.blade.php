@extends('layouts.admin')

@section('title')
	Invoices
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
					{{ $i + 1 }}
				</td>
				<td>
					{{ $invoice->reservation->requester->name }}
				</td>
				<td>
					&euro; {{ $invoice->totalPrice() }}
				</td>
				<td>
					{{ $invoice->status }}
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
@endsection