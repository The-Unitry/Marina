@extends('layouts.admin')

@section('title')
    {{ trans('menu.settings') }}
@endsection

@section('content')
    <div class="row">
        <form class="form-horizontal" action="{{ '/admin/setting' }}" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-10">
                    {{ method_field($method) }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="company_name" class="col-sm-2 control-label">{{ trans('columns.company_name') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="company_name" id="company_name" value="{{ setting('company_name') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="company_mail" class="col-sm-2 control-label">{{ trans('columns.email') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="company_mail" id="company_mail" value="{{ setting('company_mail') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="company_address" class="col-sm-2 control-label">{{ trans('columns.address') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="company_address" id="company_address" value="{{ setting('company_address') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="company_zipcode" class="col-sm-2 control-label">{{ trans('columns.zip_code') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="company_zipcode" id="company_zipcode" value="{{ setting('company_zipcode') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="company_city" class="col-sm-2 control-label">{{ trans('columns.city') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="company_city" id="company_city" value="{{ setting('company_city') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="company_phone" class="col-sm-2 control-label">{{ trans('columns.phone_number') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="company_phone" id="company_phone" value="{{ setting('company_phone') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tax" class="col-sm-2 control-label">{{ trans('columns.tax') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tax" id="tax" value="{{ setting('tax') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tourist_tax" class="col-sm-2 control-label">{{ trans('columns.tourist_tax') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tourist_tax" id="tourist_tax" value="{{ setting('tourist_tax') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bank_account" class="col-sm-2 control-label">{{ trans('columns.bank_account') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="bank_account" id="bank_account" value="{{ setting('bank_account') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="logo" class="col-sm-2 control-label">{{ trans('columns.logo') }}</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="logo" id="logo">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="list-group">
                        <button type="submit" class="list-group-item bg-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{ trans('actions.save') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection