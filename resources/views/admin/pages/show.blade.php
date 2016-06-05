@extends('layouts.admin')

@section('content')
<div class="container">
    <h3>
        @if ($method == 'POST')
            Create page
        @elseif ($method == 'PATCH')
            Update page
        @endif
    </h3>
    <hr>
    @if(Session::has('message'))
        <div class="alert alert-success" id="alert" role="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <span>{{ Session::get('message') }}</span>
        </div>
    @endif
    <div class="row">
        <form class="form-horizontal" action="{{ ($method == 'POST') ? '/admin/page' : '/admin/page/' . $page->id }}" method="post">
            <div class="row">
                <div class="col-md-10">
                    {{ method_field($method) }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" id="title" value="{{ $page->title or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="description" id="description" value="{{ $page->description or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="metatags" class="col-sm-2 control-label">Metatags</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="metatags" id="description" value="{{ $page->metatags or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="body" class="col-sm-2 control-label">Text</label>
                        <div class="col-sm-10">
                            <textarea id="messageArea" class="form-control" id="body" name="body">{{ $page->body or '' }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="list-group">
                        <button type="submit" class="list-group-item bg-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
                        <a href="../page" class="list-group-item"><span class="fa fa-arrow-left"></span> Back</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection