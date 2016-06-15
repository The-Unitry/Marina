Factuurnr.;Status;Prijs;Belasting;Aangemaakt;Gebruiker;Betalingstermijn
@foreach($invoices as $invoice)
	{{ $invoice->id }};{{ trans('columns.' . $invoice->status) }};{{ $invoice->price }};{{ $invoice->tax }};{{ $invoice->created_at }};{{ $invoice->user->email }};{{ $invoice->due_days }}
@endforeach