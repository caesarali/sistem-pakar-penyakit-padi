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
                <form method="POST" action="{{ route('storePasien') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama :</label>
                                <input type="text" name="nama" class="form-control" required="required" placeholder="Nama pasien / petani...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Lokasi :</label>
                                <textarea class="form-control" name="lokasi" required="required" placeholder="Lokasi pertanian..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <p><button type="submit" class="btn btn-primary pull-right">Mulai Konsultasi <i class="fa fa-fw fa-sign-in" aria-hidden="true"></i></button></p>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="clearfix" style="margin-bottom: 20px;"></div>
            </div>
        </div>
    </div>
</div>
@endsection
