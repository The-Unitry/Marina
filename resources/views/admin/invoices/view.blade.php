<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Factuur (#{{ $invoice->number() }})</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body id="invoice">
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-left pull-right">
                <h4>{{ setting('company_name') }}</h4>
                <p>
                    {{ setting('company_address') }}<br>
                    {{ setting('company_zipcode') }} {{ setting('company_city') }}<br>
                    {{ setting('company_phone') }}
                </p>
            </div>
            <div class="col-md-8">
                <h1>
                    Factuur (#{{ $invoice->number() }})
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 pull-left">
                <p>
                    {{ $invoice->user->name }}<br>
                    {{ $invoice->user->address }}<br>
                    {{ $invoice->user->zip }} {{ $invoice->user->city }}<br>
                    {{ $invoice->user->phone }}<br>
                    {{ $invoice->user->email }}
                </p>
            </div>
            <div class="col-md-4 pull-right">
                <table style="width: 60%;">
                    <tr>
                        <td>Factuurnummer:</td>
                        <td>{{ $invoice->number() }}</td>
                    </tr>
                    <tr>
                        <td>Datum:</td>
                        <td>{{ date('d-m-Y', strtotime($invoice->created_at)) }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <p>
            Bedankt voor uw reservering en graag tot ziens.
        </p>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th class="col-sm-1" style="width: 4%;">#</th>
                    <th class="col-sm-1">{{ trans('columns.amount') }}</th>
                    <th class="col-sm-3">{{ trans('columns.description') }}</th>
                    <th class="col-sm-3">{{ trans('columns.period') }}</th>
                    <th class="col-sm-1">{{ trans('columns.price') }}</th>
                    <th class="col-sm-2">{{ trans('columns.vat') }}</th>
                    <th class="col-sm-2">{{ trans('columns.total_price') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoice->products as $i => $product)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $product->amount }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ (strtotime($product->start) != null) ? $product->period() : '' }}</td>
                    <td>&euro; {{ $product->formattedPrice() }}</td>
                    <td>{{ $product->vat }} %</td>
                    <td>&euro; {{ $product->formattedTotalPrice() }}</td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>&euro; {{ $invoice->totalPrice() }}</td>
                </tr>
            </tbody>
        </table>
        <hr>
        <p>
        Graag ontvangen we uw betaling binnen {{ $invoice->due_days }} dagen op rekeningnummer <b>{{ setting('bank_account') }}</b> t.a.v. <b>{{ setting('company_name') }}</b>.<br><br>

            Met vriendelijke groet, <br>
            {{ setting('company_name') }}
        </p>
    </div>
</body>
</html>
