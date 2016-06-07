@extends('layouts.app')

@section('content')
    <div class="container content">
        <h3>
            Boot toevoegen
        </h3>
        <br>
        <form action="{{ (!isset($boat)) ? '/mijn-boten' : '/mijn-boten/'. $boat->id }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field($method) }}
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="panel-title">Boot gegevens</p>
                </div>
                <div class="panel-body">
                    <table class="table borderless">
                        <tbody>
                        <tr>
                            <td width="15%">
                                <label for="name">Naam</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ $boat->name or '' }}">
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <label for="brand">Merk</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="brand" name="brand"
                                       value="{{ $boat->brand or '' }}">
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <label for="model">Model</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="model" name="model"
                                       value="{{ $boat->model or '' }}">
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <label for="color">Kleur</label>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="color" name="color"
                                       value="{{ $boat->color or '' }}">
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <label for="type">Type</label>
                            </td>
                            <td>
                                <select name="type" id="type" class="form-control">
                                    <option value="Motorboot" {{ (isset($boat) && $boat->type == 'Motorboot' ? 'selected' : '') }}>Motorboot</option>
                                    <option value="Zeilboot" {{ (isset($boat) && $boat->type == 'Zeilboot' ? 'selected' : '') }}>Zeilboot</option>
                                    <option value="Anders" {{ (isset($boat) && $boat->type == 'Anders' ? 'selected' : '') }}>Anders</option>
                                </select>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="panel-title">Afmetingen</p>
                </div>
                <div class="panel-body">
                    <table class="table borderless">
                        <tbody>
                        <tr>
                            <td width="15%">
                                <label for="height">Hoogte (cm)</label>
                            </td>
                            <td>
                                <input type="number" class="form-control" id="height" name="height"
                                       value="{{ $boat->height or '' }}">
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <label for="length">Lengte (cm)</label>
                            </td>
                            <td>
                                <input type="number" class="form-control" id="length" name="length"
                                       value="{{ $boat->length or '' }}">
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <label for="depth">Diepte (cm)</label>
                            </td>
                            <td>
                                <input type="number" class="form-control" id="depth" name="depth"
                                       value="{{ $boat->depth or '' }}">
                            </td>
                        </tr>
                        <tr>
                            <td width="15%">
                                <label for="width">Breedte (cm)</label>
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
            <a href="/mijn-boten" class="btn btn-default"><span class="fa fa-arrow-left"></span> Terug naar overzicht</a>
            <button type="submit" class="btn btn-primary pull-right">Opslaan</button>
        </form>
    </div>
@endsection
