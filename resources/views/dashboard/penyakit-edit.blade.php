<div class="row">
	<div class="col-md-12">
		<form method="post" action="{{ route('penyakit.update', $penyakit->id) }}">
			{{ csrf_field() }}
			{{ method_field('PATCH') }}
			<div class="col-md-6">
    			<div class="form-group">
    				<label>Nama Penyakit :</label>
					<input type="text" name="nama" class="form-control" required="required" placeholder="Nama dari penyakit..." value="{{ $penyakit->nama }}">
    			</div>
    			<div class="form-group">
    				<label>Penyebab :</label>
					<input type="text" name="penyebab" class="form-control" required="required" placeholder="Penyakit disebabkan oleh..." value="{{ $penyakit->penyebab }}">
    			</div>
    			<div class="form-group">
    				<label>Definisi Penyakit :</label>
					<textarea name="definisi" class="form-control" rows="5" required="required" placeholder="Jelaskan mengenai penyakit ini...">{{ $penyakit->definisi }}</textarea>
    			</div>
			</div>
			<div class="col-md-6">						
    			<div class="form-group">
    				<label>Gejala-gejala yang terjadi :</label>
    				<div class="col-md-12">
    					@foreach ($gejalas as $gejala)
    						<div class="checkbox">
						      	<label><input class="check" type="checkbox" name="gejala[]" value="{{ $gejala->id }}">{{ $gejala->name }}</label>
						    </div>
    					@endforeach
						<script>
	    					@foreach ($penyakit->gejala as $gejala)
    							$('.check[value={{ $gejala->id }}]').attr('checked', true);
	    					@endforeach()
						</script>
    				</div>
    			</div>
    		</div>
		</form>
	</div>
</div>