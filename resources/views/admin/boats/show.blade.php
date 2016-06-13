@extends('layouts.admin')

@section('title')
    @if ($method == 'POST')
        {{ trans('actions.create.boat') }}
    @elseif ($method == 'PATCH')
        {{ trans('actions.edit.boat') }}
    @endif
@endsection

@section('content')
    <div class="row">
        <form class="form-horizontal" action="{{ ($method == 'POST') ? '/admin/boat' : '/admin/boat/' . $boat->id }}" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-10">
                    {{ method_field($method) }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">{{ trans('columns.name') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" value="{{ $boat->name or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user_id" class="col-sm-2 control-label">{{ trans('columns.owner') }}</label>
                        <div class="col-sm-10">
                            <select name="user_id" id="user_id" class="form-control">
                                <option disabled selected>-- {{ trans('columns.owner') }} --</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ (isset($boat) && $boat->owner == $user) ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="brand" class="col-sm-2 control-label">{{ trans('columns.brand') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="brand" id="brand" value="{{ $boat->brand or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type" class="col-sm-2 control-label">{{ trans('columns.type') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="type" id="type" value="{{ $boat->type or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="color" class="col-sm-2 control-label">{{ trans('columns.color') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="color" id="color" value="{{ $boat->color or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="height" class="col-sm-2 control-label">{{ trans('columns.sizes.height') }}</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="height" id="height" value="{{ $boat->height or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="length" class="col-sm-2 control-label">{{ trans('columns.sizes.length') }}</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="length" id="length" value="{{ $boat->length or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="depth" class="col-sm-2 control-label">{{ trans('columns.sizes.depth') }}</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="depth" id="depth" value="{{ $boat->depth or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="width" class="col-sm-2 control-label">{{ trans('columns.sizes.width') }}</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="width" id="width" value="{{ $boat->width or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="width" class="col-sm-2 control-label">{{ trans('columns.boat_image') }}</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="image_path" id="image_path">
                        </div>
                    </div>
                    @if(isset($boat) && $boat->hasImage())
                    <div class="form-group">
                        <label for="width" class="col-sm-2 control-label">{{ trans('columns.current_image') }}</label>
                        <div class="col-sm-10">
                            <img src="/media/small/{{ $boat->image_path }}.png" alt="">
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-md-2">
                    <div class="list-group">
                        <button type="submit" class="list-group-item bg-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                        {{ trans('actions.save') }}</button>
                        <a href="../boat" class="list-group-item"><span class="fa fa-arrow-left"></span> {{ trans('actions.back') }}
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
