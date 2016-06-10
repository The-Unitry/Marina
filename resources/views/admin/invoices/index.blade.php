@extends('layouts.admin')

@section('title')
	{{ trans('menu.invoices') }}
@endsection

@section('content')
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
					{{ trans('columns.' . strtolower($invoice->status)) }}
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
@endsection