@extends('layouts.app')

@section('title')
    {{ trans('menu.reservations') }}
@endsection

@section('content')
    <div class="container content">
        <h3>
            {{ trans('menu.reservations') }}
        </h3>
        <div class="row">
            <p class="text col-md-8">
                Boek met ons handige filter een box die geschikt is voor jouw boot en beschikbaar is tussen de door jou opgegeven datums.
            </p>
        </div>
        <hr>
        <div class="row">
            <div class="steps col-md-8">
              @if(count(Auth::user()->boats))
                <form action="/reserveren" method="post">
                    {{ csrf_field() }}
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
                            <input type="text" class="input-sm form-control" name="start" value="{{ date('d-m-Y') }}" />
                            <span class="input-group-addon">tot</span>
                            <input type="text" class="input-sm form-control" name="end" />
                        </div>
                    </div>
                    <hr>
                    <div>
                        <h4>
                            3. Kies het aantal personen <small>(incl. uzelf)</small>
                        </h4>
                        <input type="number" value="1§" name="amount_of_persons" class="form-control" min="0" max="100">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary pull-right">
                        {{ trans('actions.next') }}
                    </a>
                </form>
                @else
                  <h4>U heeft nog geen boat toegevoegd!</h4>
                  <h4>Klik <a href="/mijn-boten">hier</a> om een boot toe te voegen.</h4>
                @endif
            </div>
            <div class="col-md-4 visible-lg visible-md">
                <h4>Uw zekerheden</h4>
                <ul class="list-unstyled">
                    <li><span class="fa fa-check"></span> Makkelijk box boeken</li>
                    <li><span class="fa fa-check"></span> Handig overzicht van je reserveringen</li>
                    <li><span class="fa fa-check"></span> Online je boeking annuleren</li>
                    <li><span class="fa fa-check"></span> Snel en simpel contact met de jachthaven</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
