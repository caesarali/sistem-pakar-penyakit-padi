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
            <strong>Gejala</strong>
        </div>
        <div class="panel-body">
            <form method="POST" action="{{ route('diagnosa') }}">
                {{ csrf_field() }}
                <input type="hidden" name="pasien_id" value="{{ $pasien_id }}">
                <div class="form-group">
                    <label>Gejala-gejala yang nampak pada tanaman padi anda :</label>
                    <div class="col-md-12">
                        @foreach ($gejala as $gejala)
                            <div class="checkbox">
                                <label><input class="check" type="checkbox" name="gejala[]" value="{{ $gejala->id }}">{{ $gejala->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary pull-right">Cek Hasil Diagnonsa <i class="fa fa-fw fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
