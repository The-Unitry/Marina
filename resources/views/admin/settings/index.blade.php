@extends('layouts.admin')

@section('title')
    Settings
@endsection

@section('content')
    <div class="row">
        <form class="form-horizontal" action="{{ '/admin/setting' }}" method="post">
            <div class="row">
                <div class="col-md-10">
                    {{ method_field($method) }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="company_name" class="col-sm-2 control-label">Company name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="company_name" id="company_name" value="{{ setting('company_name') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="company_mail" class="col-sm-2 control-label">Company mail</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="company_mail" id="company_mail" value="{{ setting('company_mail') }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="list-group">
                        <button type="submit" class="list-group-item bg-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection