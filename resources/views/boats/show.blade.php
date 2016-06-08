@extends('layouts.app')

@section('content')
    <div class="container content">
        <h3>
            {{ trans('navigation.add_boat') }}
        </h3>
        <br>
        <form action="{{ (!isset($boat)) ? '/mijn-boten' : '/mijn-boten/'. $boat->id }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field($method) }}
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="panel-title">{{ trans('boatinfo.data') }}</p>
                </div>
                <div class="panel-body">
                    <table class="table borderless">
                        <tbody>
                        <tr>
                            <td width="15%">
                                <label for="name">{{ trans('boatinfo.name') }}</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ $boat->name or '' }}">
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <label for="brand">{{ trans('boatinfo.brand') }}</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="brand" name="brand"
                                       value="{{ $boat->brand or '' }}">
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <label for="model">{{ trans('boatinfo.model') }}</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="model" name="model"
                                       value="{{ $boat->model or '' }}">
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <label for="color">{{ trans('boatinfo.color') }}</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="color" name="color"
                                       value="{{ $boat->color or '' }}">
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <label for="type">{{ trans('boatinfo.type') }}</label>
                            </td>
                            <td>
                                <select name="type" id="type" class="form-control">
                                    <option value="Motorboot" {{ (isset($boat) && $boat->type == 'Motorboot' ? 'selected' : '') }}>{{ trans('boatinfo.motorboat') }}</option>
                                    <option value="Zeilboot" {{ (isset($boat) && $boat->type == 'Zeilboot' ? 'selected' : '') }}>{{ trans('boatinfo.sailboat') }}</option>
                                    <option value="Anders" {{ (isset($boat) && $boat->type == 'Anders' ? 'selected' : '') }}>{{ trans('boatinfo.otherboat') }}</option>
                                </select>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="panel-title">{{ trans('boatinfo.dimensions') }}</p>
                </div>
                <div class="panel-body">
                    <table class="table borderless">
                        <tbody>
                        <tr>
                            <td width="15%">
                                <label for="height">{{ trans('boatinfo.dimensions_height') }}</label>
                            </td>
                            <td>
                                <input type="number" class="form-control" id="height" name="height"
                                       value="{{ $boat->height or '' }}">
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <label for="length">{{ trans('boatinfo.dimensions_length') }}</label>
                            </td>
                            <td>
                                <input type="number" class="form-control" id="length" name="length"
                                       value="{{ $boat->length or '' }}">
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <label for="depth">{{ trans('boatinfo.dimensions_depth') }}</label>
                            </td>
                            <td>
                                <input type="number" class="form-control" id="depth" name="depth"
                                       value="{{ $boat->depth or '' }}">
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <label for="width">{{ trans('boatinfo.data') }}</label>
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
            <a href="/mijn-boten" class="btn btn-default"><span class="fa fa-arrow-left"></span>{{ trans('boatinfo.back_to_view') }}</a>
            <button type="submit" class="btn btn-primary pull-right">Opslaan</button>
            @if(isset($boat))
                <a href="/mijn-boten/{{ $boat->id }}/delete" class="btn btn-link pull-right">{{ trans('boatinfo.delete_boat') }}</a>
            @endif
        </form>
    </div>
@endsection
