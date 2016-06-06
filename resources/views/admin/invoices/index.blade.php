@extends('layouts.admin')

@section('title')
	Invoices
@endsection

@section('content')
	<table class="table table-striped" id="datatable">
		<thead>
		<tr>
			<th width="5%">#</th>
			<th>Code</th>
		</tr>
		</thead>
		<tbody>
		@foreach($invoices as $i => $invoice)
			<tr data-href="/admin/invoice/{{ $invoices->id }}" class="clickable-row">
				<td>
					{{ $i + 1 }}
				</td>
				<td>
					{{ $invoice }}
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
@endsection