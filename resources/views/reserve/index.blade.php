@extends('layouts.app')

@section('content')
    <div class="container content">
        <h3>
            Reserveren
        </h3>
        <p class="text">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium adipisci aliquid aperiam beatae consequuntur eligendi expedita fugit, ipsa laudantium modi nemo officia officiis perspiciatis quaerat quas quo tempore ullam voluptas.
        </p>
        <hr>
        <div>
            <h4>
                1. Kies uw boot
            </h4>
            <select name="boat_id" id="boat_id" class="form-control" autofocus>
                @foreach($boats as $boat)
                    <option value="{{ $boat->id }}">{{ $boat->name }}</option>
                @endforeach
            </select>
        </div>
        <hr>
        <div>
            <h4>
                2. Kies de periode
            </h4>
            <div class="input-daterange input-group" id="datepicker">
                <input type="text" class="input-sm form-control" name="start" />
                <span class="input-group-addon">tot</span>
                <input type="text" class="input-sm form-control" name="end" />
            </div>
        </div>
        <hr>
        <div>
            <h4>
                3. Kies de hoeveelheid personen <small>(incl. uzelf)</small>
            </h4>
            <input type="number" value="0" class="form-control">
        </div>
        <hr>
        <a href="" class="btn btn-primary pull-right">
            Volgende
        </a>
    </div>
@endsection
