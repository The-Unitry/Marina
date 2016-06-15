@extends('layouts.admin')

@section('title')
    Belastingoverzicht
@endsection

@section('content')
<script>
    function update()
    {
        var start = document.getElementById('start').value;
        var end = document.getElementById('end').value;

        $.ajax({
            url: '/admin/invoice/tax/' + start + '/' + end,
            context: document.body
        }).done(function(data) {
            document.getElementById('revenue').innerHTML = data['revenue'];
            document.getElementById('vat').innerHTML = data['vat'];
            document.getElementById('tourist_tax').innerHTML = data['tourist_tax'];
            document.getElementById('payments').innerHTML = data['payments'];
        });
    }
</script>
<p>
    Geef hieronder op van welke je periode je een BTW overzicht wilt zien.
</p>
<form action="/admin/invoice/export.csv" method="post">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-4">
            <div class="input-daterange input-group" id="datepicker">
                <input type="text" class="datepicker form-control" id="start" name="start" value="{{ date('Y-m-d') }}" onchange="update()" />
                <span class="input-group-addon">tot</span>
                <input type="text" class="datepicker form-control" id="end" name="end" value="{{ date('Y-m-d') }}" onchange="update()" />
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div>
            <div class="col-md-3 col-sm-6">
                <div class="widget-panel">
                    <h2 class="text-white">&euro; <span id="revenue"></span></h2>
                    <div class="text-white">Omzet</div>
                </div>
            </div>
        </div>

        <div>
            <div class="col-md-3 col-sm-6">
                <div class="widget-panel">
                    <h2 class="text-white">&euro; <span id="vat"></span></h2>
                    <div class="text-white">BTW</div>
                </div>
            </div>
        </div>

        <div>
            <div class="col-md-3 col-sm-6">
                <div class="widget-panel">
                    <h2 class="text-white">&euro; <span id="tourist_tax"></span></h2>
                    <div class="text-white">Toeristenbelasting</div>
                </div>
            </div>
        </div>

        <div>
            <div class="col-md-3 col-sm-6">
                <div class="widget-panel">
                    <h2 class="text-white" id="payments"></h2>
                    <div class="text-white">Aantal betalingen</div>
                </div>
            </div>
        </div>
    </div>
    <style type="text/css">

        .widget-panel {
            padding: 40px 20px;
            border-radius: 4px;
            position: relative;
            margin-bottom: 20px;
            background-color: #EEE;
            color: rgb(51, 51, 51);
            text-align: center;
        }

        .widget-panel .fa {
            color: #cccccc;
        }

        .widget-panel h2 {
            font-weight: 600;
            font-size: 32px;
            margin-top: 5px;
        }

        .widget-panel i {
            position: absolute;
            font-size: 60px;
            right: 0;
            bottom: 10px;
        }
    </style>
</form>
<br><br>
<a href="../invoice"><span class="fa fa-arrow-left"></span> Terug naar alle facturen</a>
@endsection