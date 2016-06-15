@extends('layouts.admin')

@section('title')
    {{ trans('menu.documents') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-10">
            Om een bestand te delen met leden van de haven klik op het bestand en kopieer de link bovenaan de pagina. of klik voeg
            <a href="https://drive.google.com/folderview?id=0B62kPmaCjokDVFBSdVVRZDczYlk&usp=sharing" target="_blank">deze</a> link toe
        </div>
        <div class="col-md-10">
            <iframe class="frame frame-control" data-frameload="true" src="https://drive.google.com/embeddedfolderview?id=0B62kPmaCjokDVFBSdVVRZDczYlk#list" style="width:100%; height:500px; border:0;"></iframe>
        </div>
    </div>
@endsection
