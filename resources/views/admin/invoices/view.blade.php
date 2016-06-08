<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Factuur (#{{ $invoice->id }})</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body id="invoice">
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-right pull-right">
                <h4>{{ setting('company_name') }}</h4>
                <p>
                    {{ setting('company_address') }}<br>
                    {{ setting('company_zipcode') }} {{ setting('company_city') }}<br>
                    {{ setting('company_phone') }}
                </p>
            </div>
            <div class="col-md-8">
                <h1>
                    Factuur (#{{ $invoice->id }})
                </h1>
            </div>
        </div>
        <p>
            Bedankt voor uw reservering!
        </p>
        <table class="table">
            <thead>
                <tr>
                    <th>{{ trans('columns.box') }}</th>
                    <th>{{ trans('columns.start_date') }}</th>
                    <th>{{ trans('columns.end_date') }}</th>
                    <th>{{ trans('columns.amount_of_nights') }}</th>
                    <th>{{ trans('columns.price_per_night') }}</th>
                    <th>{{ trans('columns.total_price') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $invoice->reservation->box->getFullCode() }}</td>
                    <td>{{ $invoice->reservation->start }}</td>
                    <td>{{ $invoice->reservation->end }}</td>
                    <td>{{ $invoice->reservation->totalNights() }}</td>
                    <td>{{ $invoice->reservation->box->pricePerNight() }}</td>
                    <td>{{ $invoice->reservation->box->totalPrice($invoice->reservation->totalNights()) }}</td>
                </tr>
            </tbody>
        </table>
        <hr>
        <p>
        Graag ontvangen we uw betaling binnen 10 werkdagen op rekeningnummer XXX t.a.v. {{ setting('company_name') }}.<br><br>

            Met vriendelijke groet, <br>
            {{ setting('company_name') }}
        </p>
    </div>
</body>
</html>