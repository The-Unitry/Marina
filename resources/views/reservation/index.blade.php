@extends('layouts.app')

@section('content')
    <div class="container content">
        <h3>
            Reserveren
        </h3>
        <p class="text">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci deleniti doloribus eligendi temporibus, tenetur voluptatum. Adipisci aperiam at autem blanditiis enim facere facilis harum id, minima obcaecati perferendis quod ut.
        </p>
        <hr>
        <div class="row">
            <div class="steps col-md-8">
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
                <br>
                <a href="" class="btn btn-primary pull-right">
                    {{ trans('actions.next') }}
                </a>
            </div>
            <div class="col-md-4">
                <h4>Uw zekerheden</h4>
                <ul class="list-unstyled">
                    <li><span class="fa fa-check"></span> Lorem ipsum dolor</li>
                    <li><span class="fa fa-check"></span> Consectetur adipisicing elit</li>
                    <li><span class="fa fa-check"></span> Aperiam eligendi et eum</li>
                    <li><span class="fa fa-check"></span> Omnis repellendus voluptatem</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
