@extends('layouts.app')

@section('breadcrump')
<li><a href="{{ url('/') }}">Home</a></li>
<li class="active">Konsultasi</li>
@endsection

@section('content')
@include('layouts.aside')
<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>Form Data Pasien</strong>
        </div>
        <div class="panel-body">
            <div class="col-md-10 col-md-offset-1">
            
            </div>
        </div>
    </div>
</div>
@endsection
