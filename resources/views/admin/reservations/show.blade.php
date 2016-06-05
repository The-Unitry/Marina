@extends('layouts.admin')

@section('content')
    <div class="container">
        <h3>
            @if ($method == 'POST')
                Create reservation
            @elseif ($method == 'PATCH')
                Update reservation
            @endif
        </h3>
        <hr>
        @if(Session::has('message'))
            <div class="alert alert-success" id="alert" role="alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <span>{{ Session::get('message') }}</span>
            </div>
        @endif
        <div class="row">
            <form class="form-horizontal" action="{{ ($method == 'POST') ? '/admin/reservation' : '/admin/reservation/' . $reservation->id }}" method="post">
                <div class="row">
                    <div class="col-md-10">
                        {{ method_field($method) }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="start" class="col-sm-2 control-label">Start date</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="start" id="start" value="{{ $reservation->start or '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="end" class="col-sm-2 control-label">End date</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="end" id="end" value="{{ $reservation->end or '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="boat_id" class="col-sm-2 control-label">Boat</label>
                            <div class="col-sm-10">
                                <select name="boat_id" id="boat_id" class="form-control">
                                    @foreach ($boats as $boat)
                                        <option value="{{ $boat->id }}">{{ $boat->name }} ({{ $boat->owner->name }})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="box_id" class="col-sm-2 control-label">Box</label>
                            <div class="col-sm-10">
                                <select name="box_id" id="box_id" class="form-control">
                                    @foreach ($boxes as $box)
                                        <option value="{{ $box->id }}">{{ $box->getFullCode() }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="amount_of_persons" class="col-sm-2 control-label">Amount of persons</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="amount_of_persons" id="amount_of_persons" value="{{ $reservation->amount_of_persons or '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="approved" class="col-sm-2 control-label">Approved</label>
                            <div class="col-sm-10">
                                <select name="approved" id="approved" class="form-control">
                                    <option value="0">No</option>
                                    <option value="1" {{ (isset($reservation) && ($reservation->approved)) ? 'selected' : '' }}>Yes</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="list-group">
                            <button type="submit" class="list-group-item bg-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
                            <a href="../reservation" class="list-group-item"><span class="fa fa-arrow-left"></span> Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection