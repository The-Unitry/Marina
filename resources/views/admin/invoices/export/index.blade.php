@extends('layouts.admin')

@section('title')
    Factuuroverzicht exporteren
@endsection

@section('content')
<p>
    Geef hieronder op van welke je periode je een factuuroverzicht wilt exporteren.
</p>
<form action="/admin/invoice/export.csv" method="post">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-4">
            <div class="input-daterange input-group" id="datepicker">
                <input type="text" class="datepicker form-control" id="start" name="start" value="{{ date('Y-m-d') }}" />
                <span class="input-group-addon">tot</span>
                <input type="text" class="datepicker form-control" id="end" name="end" />
            </div>
        </div>
    </div>
    <br>
    <a class="btn btn-primary" onclick="location.href = '/admin/invoice/export/' + document.getElementById('start').value + '/' + document.getElementById('end').value;">Download</a>
</form>
<br><br>
<a href="../invoice"><span class="fa fa-arrow-left"></span> Terug naar alle facturen</a>
@endsection