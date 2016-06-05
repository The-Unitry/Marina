@extends('layouts.admin')

@section('content')
    <div class="container">
        <h3>
            @if ($method == 'POST')
                Create box
            @elseif ($method == 'PATCH')
                Update box
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
            <form class="form-horizontal" action="{{ ($method == 'POST') ? '/admin/box' : '/admin/box/' . $box->id }}" method="post">
                <div class="row">
                    <div class="col-md-10">
                        {{ method_field($method) }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="id" class="col-sm-2 control-label">Code</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="id" id="id" value="{{ $box->id or '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="depth" class="col-sm-2 control-label">Depth (cm)</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="depth" id="depth" value="{{ $box->depth or '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="length" class="col-sm-2 control-label">Length (cm)</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="length" id="length" value="{{ $box->length or '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="width" class="col-sm-2 control-label">Width (cm)</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="width" id="width" value="{{ $box->width or '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="scaffold_id" class="col-sm-2 control-label">Scaffold</label>
                            <div class="col-sm-10">
                                <select name="scaffold_id" id="scaffold_id" class="form-control">
                                    @foreach ($scaffolds as $scaffold)
                                        <option value="{{ $scaffold->id }}" {{ (isset($box) && $box->scaffold_id == $scaffold->id) ? 'selected' : '' }}>
                                            {{ $scaffold->code }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="list-group">
                            <button type="submit" class="list-group-item bg-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
                            <a href="../box" class="list-group-item"><span class="fa fa-arrow-left"></span> Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection