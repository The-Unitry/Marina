@extends('layouts.admin')

@section('title')
    @if ($method == 'POST')
        {{ trans('actions.create.post') }}
    @elseif ($method == 'PATCH')
        {{ trans('actions.edit.post') }}
    @endif
@endsection

@section('content')
    <div class="row">
        <form class="form-horizontal" action="{{ ($method == 'POST') ? '/admin/post' : '/admin/post/' . $post->id }}" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-10">
                    {{ method_field($method) }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">{{ trans('columns.title') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="metatags" class="col-sm-2 control-label">{{ trans('columns.metatags') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="metatags" name="metatags" value="{{ $post->metatags or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">{{ trans('columns.description') }}</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="description" name="description">{{ $post->description or '' }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="body" class="col-sm-2 control-label">{{ trans('columns.body') }}</label>
                        <div class="col-sm-10">
                            <textarea id="editor" class="form-control" id="body" name="body">{{ $post->body or '' }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="header_path" class="col-sm-2 control-label">{{ trans('columns.header') }}</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="header_path" id="header_path">
                        </div>
                    </div>
                    @if(isset($post) && $post->hasHeader())
                    <div class="form-group">
                        <label for="header_path" class="col-sm-2 control-label">{{ trans('columns.current_header') }}</label>
                        <div class="col-sm-10">
                            <img src="/media/small/{{ $post->header_path }}.png" alt="">
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-md-2">
                    <div class="list-group">
                        <button type="submit" class="list-group-item bg-primary">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i> {{ trans('actions.save') }}
                        </button>
                        <a href="../post" class="list-group-item"><span class="fa fa-arrow-left"></span> {{ trans('actions.back') }}</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection