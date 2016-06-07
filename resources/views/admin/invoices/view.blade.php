<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ trans('navigation.invoice') }} (#{{ $invoice->id }})</title>
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
                    {{ trans('navigation.invoice') }} (#{{ $invoice->id }})
                </h1>
            </div>
        </div>
        <p>
            {{ trans('invoice.thank_you_reservation') }}
        </p>
        <table class="table">
            <thead>
                <tr>
                    <th>{{ trans('invoice.box') }}</th>
                    <th>{{ trans('invoice.start_date') }}</th>
                    <th>{{ trans('invoice.end_date') }}</th>
                    <th>{{ trans('invoice.amount_of_nights') }}</th>
                    <th>{{ trans('columns.price_per_night') }}t</th>
                    <th>{{ trans('invoice.total_price') }}</th>
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
        {{ trans('invoice.receive_payment_within_days', ['days' => '20', 'iban' => 'XXX']) }}
            {{ setting('company_name') }}.<br><br>

            {{ trans('invoice.sign_off') }} <br>
            {{ setting('company_name') }}
        </p>
    </div>
</body>
</html>