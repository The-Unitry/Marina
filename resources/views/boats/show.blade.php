@extends('layouts.app')

@section('title')
    {{ $boat->name or 'Nieuwe boot' }}
@endsection

@section('content')
    <div class="container content">
        <h3>
            @if ($method == 'POST')
                {{ trans('actions.create.boat') }}
            @elseif ($method == 'PATCH')
                {{ trans('actions.edit.boat') }}
            @endif
        </h3>
        <br>
        <form action="{{ (!isset($boat)) ? '/mijn-boten' : '/mijn-boten/'. $boat->id }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field($method) }}
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="panel-title">{{ trans('columns.boat_info') }}</p>
                </div>
                <div class="panel-body">
                    <table class="table borderless">
                        <tbody>
                        <tr>
                            <td width="15%">
                                <label for="name">{{ trans('columns.name') }}</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="name" name="name"
                                        {{ ($method == 'POST') ? '' : 'disabled' }}
                                        value="{{ $boat->name or '' }}" required>
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <label for="brand">{{ trans('columns.brand') }}</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="brand" name="brand"
                                        {{ ($method == 'POST') ? '' : 'disabled' }}
                                        value="{{ $boat->brand or '' }}" required>
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <label for="model">{{ trans('columns.model') }}</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="model" name="model"
                                        {{ ($method == 'POST') ? '' : 'disabled' }}
                                        value="{{ $boat->model or '' }}" required>
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <label for="color">{{ trans('columns.color') }}</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="color" name="color"
                                        {{ ($method == 'POST') ? '' : 'disabled' }}
                                        value="{{ $boat->color or '' }}" required>
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <label for="type">{{ trans('columns.type') }}</label>
                            </td>
                            <td>
                                <select name="type" id="type" class="form-control" {{ ($method == 'POST') ? '' : 'disabled' }} required>
                                    <option value="Motorboat" {{ (isset($boat) && $boat->type == 'Motorboat' ? 'selected' : '') }}>
                                    {{ trans('columns.motorboat') }}</option>
                                    <option value="Sailboat" {{ (isset($boat) && $boat->type == 'Sailboat' ? 'selected' : '') }}>
                                    {{ trans('columns.sailboat') }}</option>
                                    <option value="Different" {{ (isset($boat) && $boat->type == 'Different' ? 'selected' : '') }}>
                                    {{ trans('columns.different') }}</option>
                                </select>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="panel-title">{{ trans('columns.boat_size') }}</p>
                </div>
                <div class="panel-body">
                    <table class="table borderless">
                        <tbody>
                        <tr>
                            <td width="15%">
                                <label for="height">{{ trans('columns.sizes.height') }}</label>
                            </td>
                            <td>
                                <input type="number" min="0" class="form-control" id="height" name="height"
                                        {{ ($method == 'POST') ? '' : 'disabled' }}
                                        value="{{ $boat->height or '' }}" required>
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <label for="length">{{ trans('columns.sizes.length') }}</label>
                            </td>
                            <td>
                                <input type="number" min="0" class="form-control" id="length" name="length"
                                        {{ ($method == 'POST') ? '' : 'disabled' }}
                                        value="{{ $boat->length or '' }}" required>
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <label for="depth">{{ trans('columns.sizes.depth') }}</label>
                            </td>
                            <td>
                                <input type="number" min="0" class="form-control" id="depth" name="depth"
                                        {{ ($method == 'POST') ? '' : 'disabled' }}
                                        value="{{ $boat->depth or '' }}" required>
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <label for="width">{{ trans('columns.sizes.width') }}</label>
                            </td>
                            <td>
                                <input type="number" min="0" class="form-control" id="width" name="width"
                                        {{ ($method == 'POST') ? '' : 'disabled' }}
                                        value="{{ $boat->width or '' }}" required>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="panel-title">{{ trans('columns.image') }}</p>
                </div>
                <div class="panel-body">
                    <table class="table borderless">
                        <tbody>
                        <tr>
                            <td width="15%">
                                <label for="image_path">{{ trans('columns.boat_image') }}</label>
                            </td>
                            <td>
                                <input type="file" class="form-control" name="image_path" id="image_path" accept="image/*">
                            </td>
                        </tr>
                        @if(isset($boat) && $boat->hasImage())
                        <tr>
                            <td width="15%">
                                <label for="image_path">{{ trans('columns.current_image') }}</label>
                            </td>
                            <td>
                                <img src="/media/small/{{ $boat->image_path }}.png" alt="">
                            </td>
                        </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <a href="/mijn-boten" class="btn btn-default"><span class="fa fa-arrow-left"></span> {{ trans('actions.back') }}</a>
            <button type="submit" class="btn btn-primary pull-right">Opslaan</button>
            @if(isset($boat))
                <a type="button" data-toggle="modal" data-target="#myModal" class="btn btn-link pull-right"><i class="fa fa-trash" style="font-size: 15pt;"></i></a>
            @endif
        </form>
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
                        U staat op het punt uw boot te verwijderen! Wilt u doorgaan?
                    </h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Sluiten</button>
                    @if(isset($boat))
                        <a href="/mijn-boten/{{ $boat->id }}/delete" class="btn btn-danger">Verwijder</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
