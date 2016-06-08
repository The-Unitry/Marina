@extends('layouts.app')

@section('content')
    <div class="container content">
        <h3>
            {{ trans('actions.create.boat') }}
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
                                       value="{{ $boat->name or '' }}">
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <label for="brand">{{ trans('columns.brand') }}</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="brand" name="brand"
                                       value="{{ $boat->brand or '' }}">
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <label for="model">{{ trans('columns.model') }}</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="model" name="model"
                                       value="{{ $boat->model or '' }}">
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <label for="color">{{ trans('columns.color') }}</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="color" name="color"
                                       value="{{ $boat->color or '' }}">
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <label for="type">{{ trans('columns.type') }}</label>
                            </td>
                            <td>
                                <select name="type" id="type" class="form-control">
                                    <option value="Motorboot" {{ (isset($boat) && $boat->type == 'Motorboot' ? 'selected' : '') }}>{{ $boat->type }}</option>
                                    <option value="Zeilboot" {{ (isset($boat) && $boat->type == 'Zeilboot' ? 'selected' : '') }}>{{ $boat->type }}</option>
                                    <option value="Anders" {{ (isset($boat) && $boat->type == 'Anders' ? 'selected' : '') }}>{{ $boat->type }}</option>
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
                                <input type="number" class="form-control" id="height" name="height"
                                       value="{{ $boat->height or '' }}">
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <label for="length">{{ trans('columns.sizes.length') }}</label>
                            </td>
                            <td>
                                <input type="number" class="form-control" id="length" name="length"
                                       value="{{ $boat->length or '' }}">
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <label for="depth">{{ trans('columns.sizes.depth') }}</label>
                            </td>
                            <td>
                                <input type="number" class="form-control" id="depth" name="depth"
                                       value="{{ $boat->depth or '' }}">
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <label for="width">{{ trans('columns.sizes.width') }}</label>
                            </td>
                            <td>
                                <input type="number" class="form-control" id="width" name="width"
                                       value="{{ $boat->width or '' }}">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <a href="/mijn-boten" class="btn btn-default"><span class="fa fa-arrow-left"></span> {{ trans('actions.back') }}</a>
            <button type="submit" class="btn btn-primary pull-right">Opslaan</button>
            @if(isset($boat))
                <a href="/mijn-boten/{{ $boat->id }}/delete" class="btn btn-link pull-right"> {{ trans('actions.delete.boat') }}</a>
            @endif
        </form>
    </div>
@endsection
