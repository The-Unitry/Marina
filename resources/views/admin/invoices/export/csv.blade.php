Factuurnr.;Status;Prijs (excl.);Belasting;Aangemaakt;Gebruiker;Betalingstermijn
@foreach($invoices as $invoice)
	{{ $invoice->id }};{{ trans('columns.' . $invoice->status) }};{{ $invoice->subtotalPrice() }};{{ $invoice->totalVat() }};{{ $invoice->created_at }};{{ $invoice->user->email }};{{ $invoice->due_days }}
@endforeach