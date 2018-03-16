@extends('layouts.app')

@section('breadcrump')
<li><a href="{{ url('/') }}">Home</a></li>
<li><a href="{{ route('pasienForm') }}">Konsultasi</a></li>
<li class="active">Hasil Diagnosa</li>
@endsection

@section('content')
@include('layouts.aside')
<div class="col-md-9">
    <div class="panel panel-default">
    	<div class="panel-heading">
    		<strong>Hasil Diagnosa</strong>
    	</div>
    	<div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <label><strong>Data Diagnosa :</strong></label>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">Nama</div>
                            <div class="col-md-9">: {{ $diagnosa->pasien->nama }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">Lokasi Pertanian</div>
                            <div class="col-md-9">: {{ $diagnosa->pasien->lokasi }}</div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <label><strong>Gejala yang nampak pada tanaman padi :</strong></label>
                    </div>
                </div>
                <div class="col-md-12">
                    <ol>
                    @foreach ($diagnosa->pasien->gejala as $gejala)
                        <li>{{ $gejala->name }}</li>
                    @endforeach
                    </ol>
                    <hr>    
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group col-md-12">
                        <label><strong>Hasil Diagnosa :</strong></label>
                    </div>
                    <div class="col-md-12">
                        <p><strong>Tanaman Padi anda kemungkinan besar terkena penyakit {{ $diagnosa->penyakit->nama }}.</strong></p>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Persentase :</label>
                            </div>
                            <div class="col-md-9">
                                <p>{{ $diagnosa->persentase }}%</p>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Definisi :</label>
                            </div>
                            <div class="col-md-9">
                                <p>{{ $diagnosa->penyakit->definis or 'Belum ada penjelasan lengkap mengenai penyakit ini.' }}</p>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label>Penyebab :</label>
                            </div>
                            <div class="col-md-9">
                                <p>{{ $diagnosa->penyakit->penyebab }}</p>    
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a href="javascript:;" data-toggle="collapse" data-target="#collapseOne">Kemungkinan Lainnya <i class="fa fa-fw fa-angle-down"></i></a>  
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" aria-expanded="true">
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                            @foreach ($diagnosa->pasien->diagnosa as $diagnosa)
                                                <div class="row">
                                                    <p><strong>{{ $diagnosa->penyakit->nama }}.</strong></p>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label>Persentase :</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <p>{{ $diagnosa->persentase }}%</p>    
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label>Definisi :</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <p>{{ $diagnosa->penyakit->definis or 'Belum ada penjelasan lengkap mengenai penyakit ini.' }}</p>    
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label>Penyebab :</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <p>{{ $diagnosa->penyakit->penyebab }}</p>    
                                                        </div>
                                                    </div>
                                                    <br>
                                                </div>
                                            @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    <!-- <button type="submit" class="btn btn-primary pull-right">Selesai <i class="fa fa-fw fa-sign-out"></i></button> -->
                                    <a href="{{ url('/') }}" class="btn btn-primary pull-right">Selesai <i class="fa fa-fw fa-sign-out"></i></a>
                                </p>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
    	</div>
    </div>
</div>
@endsection
