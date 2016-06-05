@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="title-box">
        <h3>
            @if ($method == 'POST')
                Create scaffold
            @elseif ($method == 'PATCH')
                Update scaffold
            @endif
        </h3>
    </div>
    @if(Session::has('message'))
        <div class="alert alert-success" id="alert" role="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <span>{{ Session::get('message') }}</span>
        </div>
    @endif
    <div class="row">
        <form class="form-horizontal" action="{{ ($method == 'POST') ? '/admin/scaffold' : '/admin/scaffold/' . $scaffold->id }}" method="post">
            <div class="row">
                <div class="col-md-10">
                    {{ method_field($method) }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="code" class="col-sm-2 control-label">Code</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="code" id="code" value="{{ $scaffold->code or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="on_land" class="col-sm-2 control-label">On land</label>
                        <div class="col-sm-10">
                            <select name="on_land" id="on_land" class="form-control">
                                <option value="0" selected>No</option>
                                <option value="1" {{ (isset($scaffold) && $scaffold->on_land) ? 'selected' : ''  }}>Yes</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="list-group">
                        <button type="submit" class="list-group-item bg-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
                        <a href="../scaffold" class="list-group-item"><span class="fa fa-arrow-left"></span> Back</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection