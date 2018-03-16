@extends('layouts.app')

@section('breadcrump')
    <li class="active">Home</li>
@endsection

@section('content')
@include('layouts.aside')
<div class="col-md-9">
    <div class="jumbotron">
        <p>Selamat datang  di <strong>SISTEM PAKAR PENYAKIT PADI</strong>, untuk memulai konsultasi silahkan klik tombol dibawah ini :</p> 
        <p><a href="{{ route('pasienForm') }}" class="btn btn-primary">Konsultasi</a></p>
    </div>
</div>
@endsection
