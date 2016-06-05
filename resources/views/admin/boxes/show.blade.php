@extends('layouts.admin')

@section('content')
    <div class="container">
        <h3>
            @if ($method == 'POST')
                Create box
            @elseif ($method == 'PATCH')
                Update box
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
            <form class="form-horizontal" action="{{ ($method == 'POST') ? '/admin/user' : '/admin/user/' . $user->id }}" method="post">
                <div class="row">
                    <div class="col-md-10">
                        {{ method_field($method) }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="name" value="{{ $user->name or '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">E-mail</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="email" id="email" value="{{ $user->email or '' }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="list-group">
                            <button type="submit" class="list-group-item bg-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
                            <a href="../user" class="list-group-item"><span class="fa fa-arrow-left"></span> Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection