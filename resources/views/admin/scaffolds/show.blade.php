@extends('layouts.admin')

@section('title')
    @if ($method == 'POST')
        {{ trans('navigation.create_scaffold') }}
    @elseif ($method == 'PATCH')
        {{ trans('navigation.edit_scaffold') }}
    @endif
@endsection

@section('content')
    <div class="row">
        <form class="form-horizontal" action="{{ ($method == 'POST') ? '/admin/scaffold' : '/admin/scaffold/' . $scaffold->id }}" method="post">
            <div class="row">
                <div class="col-md-10">
                    {{ method_field($method) }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="code" class="col-sm-2 control-label">{{ trans('column.code') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="code" id="code" value="{{ $scaffold->code or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="on_land" class="col-sm-2 control-label">{{ trans('column.on_land') }}</label>
                        <div class="col-sm-10">
                            <select name="on_land" id="on_land" class="form-control">
                                <option value="0" selected>{{ trans('regular.no') }}</option>
                                <option value="1" {{ (isset($scaffold) && $scaffold->on_land) ? 'selected' : ''  }}>{{ trans('regular.yes') }}</option>
                            </select>
                        </div>
                    </div>

                    @if(isset($scaffold))
                    <div class="form-group">
                        <label class="col-sm-2 control-label">{{ trans('column.boxes') }}</label>
                        <div class="col-sm-10">
                            <div class="list-group">
                                @foreach($scaffold->boxes as $box)
                                    <a href="/admin/box/{{ $box->id }}" class="list-group-item">
                                        {{ $box->getFullCode() }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-md-2">
                    <div class="list-group">
                        <button type="submit" class="list-group-item bg-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> 
                        {{ trans('regular.save') }}</button>
                        <a href="../scaffold" class="list-group-item"><span class="fa fa-arrow-left"></span> {{ trans('regular.back') }}</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection