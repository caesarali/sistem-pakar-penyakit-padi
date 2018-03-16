<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-body" align="center">
            <img src="{{ asset('assets/img/01.jpg') }}" class="img-rounded img-responsive">
        </div>
    </div>

	@if (Auth::user())
	    <ul class="list-group">
		  	<li class="list-group-item"><a href="{{ route('gejala.index') }}">Gejala</a></li>
		  	<li class="list-group-item"><a href="{{ route('penyakit.index') }}">Penyakit</a></li>
		</ul>
    @endif
</div>