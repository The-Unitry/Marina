@extends('layouts.admin')

@section('title')
    {{ trans('menu.dashboard') }}
@endsection

@section('content')
    <div class="jumbotron">
        <h1>Navicula</h1>
        <p style="font-weight: 300;">Makkelijk je haven beheren.</p>
    </div>
    <div class="row">
        <a href="/admin/user">
            <div class="col-md-3 col-sm-6">
                <div class="widget-panel bg-pink">
                    <i class="fa fa-globe"></i> 
                    <h2 class="text-white">{{ $transients }}</h2>
                    <div class="text-white">{{ trans_choice('columns.transients', $transients) }}</div>
                </div>
            </div>
        </a>

        <a href="/admin/user">
            <div class="col-md-3 col-sm-6">
                <div class="widget-panel bg-yellow">
                    <i class="fa fa-home"></i> 
                    <h2 class="text-white">{{ $berth_holders }}</h2>
                    <div class="text-white">{{ trans_choice('columns.berth_holders', $berth_holders) }}</div>
                </div>
            </div>
        </a>

        <a href="/admin/boat">
            <div class="col-md-3 col-sm-6">
                <div class="widget-panel bg-blue">
                    <i class="fa fa-ship"></i> 
                    <h2 class="text-white">{{ $boats }}</h2>
                    <div class="text-white">{{ trans_choice('columns.boats', $boats) }}</div>
                </div>
            </div>
        </a>

        <a href="/admin/user">
            <div class="col-md-3 col-sm-6">
                <div class="widget-panel bg-green">
                    <i class="fa fa-user"></i> 
                    <h2 class="text-white">{{ $users }}</h2>
                    <div class="text-white">{{ trans_choice('columns.users', $users) }}</div>
                </div>
            </div>
        </a>
    </div>
    <style type="text/css">
        .widget-panel {
            -webkit-box-shadow: 0px 1px 2px 0px rgba(0,0,0,0.1);
            -moz-box-shadow: 0px 1px 2px 0px rgba(0,0,0,0.1);
            box-shadow: 0px 1px 2px 0px rgba(0,0,0,0.1);
        }

        .widget-panel {
            padding: 40px 20px;
            border-radius: 4px;
            position: relative;
            margin-bottom: 20px;
        }

        .widget-panel h2 {
            font-weight: 600;
            font-size: 32px;
            margin: 0;
        }

        .widget-panel i {
            position: absolute;
            font-size: 60px;
            right: 0;
            bottom: 10px;
            color: #FFFFFF;
        }

        .bg-pink {
            background-color: #F16189;
        }

        .bg-yellow {
            background-color: #EDCB65;
        }

        .bg-blue {
            background-color: #47B7E1;
        }

        .bg-green {
            background-color: #59C487;
        }

        .text-white {
            color: #FFFFFF;
        }
    </style>
@endsection
