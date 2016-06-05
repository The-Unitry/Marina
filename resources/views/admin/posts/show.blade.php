@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="title-box">
        <h3>
            @if ($method == 'POST')
                Create post
            @elseif ($method == 'PATCH')
                Update post
            @endif
        </h3>
    </div>
    <div class="row">
        <form class="form-horizontal" action="{{ ($method == 'POST') ? '/admin/post' : '/admin/post/' . $post->id }}" method="post">
            <div class="row">
                <div class="col-md-10">
                    {{ method_field($method) }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="description" name="description" value="{{ $post->description or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="metatags" class="col-sm-2 control-label">Metatags</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="metatags" name="metatags" value="{{ $post->metatags or '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="body" class="col-sm-2 control-label">Text</label>
                        <div class="col-sm-10">
                            <textarea id="messageArea" class="form-control" id="body" name="body">{{ $post->body or '' }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="list-group">
                        <button type="submit" class="list-group-item bg-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
                        <a href="../post" class="list-group-item"><span class="fa fa-arrow-left"></span> Back</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection