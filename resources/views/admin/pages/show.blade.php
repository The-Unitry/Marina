@extends('layouts.admin')

@section('title')
    @if ($method == 'POST')
        {{ trans('navigation.create_page') }}
    @elseif ($method == 'PATCH')
        {{ trans('navigation.edit_page') }}
    @endif
@endsection

@section('content')
    <div class="row">
        <form class="form-horizontal" action="{{ ($method == 'POST') ? '/admin/page' : '/admin/page/' . $page->id }}" method="post">
            <div class="row">
                <div class="col-md-10">
                    {{ method_field($method) }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">{{ trans('columns.title') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" id="title" value="{{ $page->title or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="metatags" class="col-sm-2 control-label">{{ trans('columns.metatags') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="metatags" id="metatags" value="{{ $page->metatags or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">{{ trans('columns.description') }}</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="description" id="description">{{ $page->description or '' }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="body" class="col-sm-2 control-label">{{ trans('columns.text') }}</label>
                        <div class="col-sm-10">
                            <textarea id="editor" class="form-control" name="body">{{ $page->body or '' }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="list-group">
                        <button type="submit" class="list-group-item bg-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> 
                        {{ trans('columns.save') }}</button>
                        <a href="../page" class="list-group-item"><span class="fa fa-arrow-left"></span> 
                        {{ trans('columns.back') }}</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection