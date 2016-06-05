@extends('layouts.admin')

@section('content')
    <div class="container">
        <h3>
            Settings
        </h3>
        <hr>
        @if(Session::has('message'))
            <div class="alert alert-success" id="alert" role="alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <span>{{ Session::get('message') }}</span>
            </div>
        @endif
        <div class="row">
            <form class="form-horizontal" action="{{ '/admin/setting' }}" method="post">
                <div class="row">
                    <div class="col-md-10">
                        {{ method_field($method) }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="company_name" class="col-sm-2 control-label">Company name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="company_name" id="company_name" value="{{ Setting::getValueByKey('company_name') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="list-group">
                            <button type="submit" class="list-group-item bg-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
                            <a href="../setting" class="list-group-item"><span class="fa fa-arrow-left"></span> Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection