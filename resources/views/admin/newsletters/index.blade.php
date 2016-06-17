@extends('layouts.admin')

@section('title')
    Nieuwsbrief
@endsection

@section('content')
<form action="/admin/newsletter/send" class="form-horizontal col-md-12" role="form" method="POST">
    <div class="container content"> 
        <div class="row">
        <div class="col-md-11">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="subject" class="col-sm-2 control-label">{{ trans('columns.subject') }}</label>
                <div class="col-sm-10">
                    <input class="form-control" rows="4" name="subject" placeholder="{{ trans('columns.subject') }}"></input>
                </div>
            </div>
            <div class="form-group">
                <label for="body" class="col-sm-2 control-label">{{ trans('columns.message') }}</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="body"></textarea>
                </div>
            </div>
            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary pull-right">
                {{ trans('actions.send.newsletter') }}
            </button>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title text-danger" id="myModalLabel"><strong>Let op!</strong></h3>
                </div>
                <div class="modal-body">
                    <h4>
                        U staat op het punt een nieuwsbrief te sturen naar alle gebruikers, wilt u doorgaan?
                    </h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Toch niet</button>
                    <button type="button" class="btn btn-primary" onclick="this.disabled = true">Bevestigen</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
