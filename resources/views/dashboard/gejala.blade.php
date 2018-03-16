@extends('layouts.app')

@section('style')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/datatables/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('breadcrump')
<li><a href="{{ url('/') }}">Home</a></li>
<li class="active">Gejala Penyakit</li>
@endsection

@section('content')
	@include('layouts.aside')
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong>Data Gejala</strong>
			</div>
			<div class="panel-body">
				@if (session('status'))
					<div class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  	<strong>Success!</strong> {{ session('status') }}
					</div>
				@endif
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Gejala</th>
							@if (Auth::user())
								<th>Opsi</th>
							@endif
						</tr>
					</thead>
					<tbody>
						@foreach ($gejala as $gejala)
							<tr>
								<td><input type="checkbox" name="gejala[]" value="{{ $gejala->id }}"></td>
								<td>
									<span class="{{ $gejala->id }}">{{ $gejala->name }}</span>
									<form class="{{ $gejala->id }}" style="display: none" method="post" action="{{ route('gejala.update', $gejala->id) }}">
										{{ csrf_field() }}
										{{ method_field('patch') }}
										<div class="input-group col-md-12">
				        					<input type="text" name="gejala" class="form-control" value="{{ $gejala->name }}">
					        				<span class="input-group-btn">
								                <button class="btn btn-primary" type="submit"><i class="fa fa-pencil"></i></button>
								            </span>
				        				</div>
									</form>
								</td>
								@if (Auth::user())
									<td align="right">
										<button class="btn btn-primary btn-sm" onclick="$('.{{ $gejala->id }}').toggle();"><i class="fa fa-edit"></i></button>
										<button type="button" class="btn btn-danger btn-sm" onclick="$('form[name={{ $gejala->id }}]').submit();"><i class="fa fa-trash"></i></button>
										<form name="{{ $gejala->id }}" method="post" action="{{ route('gejala.destroy', $gejala->id) }}">
											{{ csrf_field() }}
											{{ method_field('delete') }}
										</form>
									</td>
								@endif
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- Modal Area -->
	@if (Auth::user())
		<div id="addGejala" class="modal fade" role="dialog">
			 <div class="modal-dialog">
			    <div class="modal-content">
				    <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h4 class="modal-title" align="center">Tambah Gejala Baru</h4>
				    </div>
				    <div class="modal-body">
				        <div class="row">
				        	<div class="col-md-10 col-md-offset-1">
				        		<form method="post" action="{{ route('gejala.store') }}">
				        			{{ csrf_field() }}
				        			<div class="form-group">
				        				<label>Deskripsikan gejala penyakit dengan kalimat yang singkat...</label>
				        				<div class="input-group">
				        					<input type="text" name="gejala" class="form-control">
					        				<span class="input-group-btn">
								                <button class="btn btn-primary" type="submit"><i class="fa fa-plus"></i></button>
								            </span>
				        				</div>
				        			</div>
				        		</form>
				        	</div>
				        </div>
				    </div>
				    <div class="modal-footer">
				    </div>
			    </div>
			 </div>
		</div>
	@endif
@endsection

@section('script')
	<script src="{{ asset('assets/datatables/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets/datatables/js/dataTables.bootstrap.min.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function() {
		    $('.table').DataTable();
		});

		@if (Auth::user())
			$(document).ready(function() {
			    $('.dataTables_filter input').after('<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addGejala" style="margin-left: 20px"><i class="fa fa-fw fa-plus"></i> Gejala </button>');
			});
		@endif

	</script>
@endsection
